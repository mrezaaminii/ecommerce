<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Http\Controllers\Controller;
use App\Models\Admin\Market\CashPayment;
use App\Models\Admin\Market\Copan;
use App\Models\Admin\Market\OfflinePayment;
use App\Models\Admin\Market\OnlinePayment;
use App\Models\Admin\Market\Order;
use App\Models\Admin\Market\Payment;
use App\Models\Market\CartItem;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PaymentController extends Controller
{
    public function payment(): View|Application
    {
        $user = Auth::user();
        $cartItems = CartItem::where('user_id', $user->id)->get();
        $order = Order::where([['user_id', $user->id], ['order_status', 0]])->first();

        return view('customer.sales-process.payment', compact('cartItems', 'user', 'order'));
    }

    public function copanDiscount(Request $request)
    {
        $request->validate([
            'copan' => 'required'
        ]);
        $user = Auth::id();

        $copan = Copan::query()->where([['code', $request->copan], ['status', 1], ['start_date', '<', now()], ['end_date', '>', now()]])->first();
        if ($copan != null) {
            if ($copan->user_id != null) {
                $copan = Copan::query()->where([['code', $request->copan], ['status', 1], ['start_date', '<', now()], ['end_date', '>', now()], ['user_id', $user]])->first();
                if ($copan == null) {
                    return back()->withErrors(['copan' => ['کد تخفیف اشتباه وارد شده است‌']]);
                }
            }
            $order = Order::query()->where([['user_id', $user], ['order_status', 0], ['copan_id', null]])->first();
            if ($order) {
                if ($copan->amount_type == 0) {
                    $copanDiscountAmount = $order->order_final_amount * ($copan->amount / 100);
                    if ($copanDiscountAmount > $copan->discount_ceiling) {
                        $copanDiscountAmount = $copan->discount_ceiling;
                    }
                } else {
                    $copanDiscountAmount = $copan->amount;
                }

                $order->order_final_amount = $order->order_final_amount - $copanDiscountAmount;

                $finalDiscount = $order->order_total_products_discount_amount + $copanDiscountAmount;

                $order->update(
                    ['copan_id' => $copan->id, 'order_copan_discount_amount' => $copanDiscountAmount, 'order_total_products_discount_amount' => $finalDiscount]
                );
                return redirect()->back()->with(['copan' => 'کد تخفیف با موفقیت اعمال شد']);
            } else {
                return back()->withErrors(['copan' => ['کد تخفیف قبلا وارد شده است‌']]);
            }

        } else {
            return back()->withErrors(['copan' => ['کد تخفیف اشتباه وارد شده است‌']]);
        }
    }

    public function paymentSubmit(Request $request)
    {
        $request->validate([
            'payment_type' => 'required',
        ]);
        $order = Order::query()->where('user_id', auth()->id())->where('order_status', 0)->first();
        $cartItems = CartItem::query()->where('user_id', auth()->id())->get();

        $matchResult = match ($request->payment_type) {
            '1' => [
                'targetModel' => OnlinePayment::class,
                'type' => 0
            ],
            '2' => [
                'targetModel' => OfflinePayment::class,
                'type' => 1
            ],
            '3' => [
                'targetModel' => CashPayment::class,
                'type' => 2
            ],
            default => fn() => redirect()->back()->withErrors(['error' => 'خطا'])
        };

        $paymented = $matchResult['targetModel']::create([
            'amount' => $order->order_final_amount,
            'user_id' => auth()->id(),
            'pay_date' => now(),
            'status' => 1,
        ]);

        $payment = Payment::create(
            [
                'amount' => $order->order_final_amount,
                'user_id' => auth()->id(),
                'pay_date' => now(),
                'type' => $matchResult['type'],
                'paymentable_id' => $paymented->id,
                'paymentable_type' => $matchResult['targetModel'],
                'status' => 1
            ]
        );
        $order->update([
            'order_status' => 3
        ]);

        $cartItems->each(function ($cartItem){
            $cartItem->delete();
        });
        return redirect()->route('customer.home')->with('success', 'سفارش شما با موفقیت ثبت شد');


    }
}
