<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Http\Controllers\Controller;
use App\Models\Admin\Market\Copan;
use App\Models\Admin\Market\Order;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PaymentController extends Controller
{
    public function payment(): View|Application
    {
        return view('customer.sales-process.payment');
    }

    public function copanDiscount(Request $request)
    {
        $request->validate([
            'copan' => 'required'
        ]);
        $user = Auth::id();

        $copan = Copan::query()->where([['code', $request->copan], ['status', 1], ['start_date', '<', now()], ['end_date', '>', now()]])->first();
        if ($copan->user_id != null) {
            $copan = Copan::query()->where([['code', $request->copan], ['status', 1], ['start_date', '<', now()], ['end_date', '>', now()],['user_id',$user]])->first();
            if ($copan == null){
                return back();
            }
        }
        $order = Order::query()->where([['user_id',$user],['order_status',0],['copan_id',null]])->first();
        if($order)
        {
            if($copan->amount_type == 0)
            {
                $copanDiscountAmount = $order->order_final_amount * ($copan->amount / 100);
                if($copanDiscountAmount > $copan->discount_ceiling)
                {
                    $copanDiscountAmount = $copan->discount_ceiling;
                }
            }
            else{
                $copanDiscountAmount = $copan->amount;
            }

            $order->order_final_amount = $order->order_final_amount - $copanDiscountAmount;

            $finalDiscount = $order->order_total_products_discount_amount + $copanDiscountAmount;

            $order->update(
                ['copan_id' => $copan->id, 'order_copan_discount_amount' => $copanDiscountAmount, 'order_total_products_discount_amount' => $finalDiscount]
            );
        }
    }
}
