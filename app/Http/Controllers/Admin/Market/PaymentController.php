<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Admin\Market\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(){
        $payments = Payment::all();
        return view('admin.market.payment.index',compact('payments'));
    }
    public function offline(){
        $payments = Payment::where('paymentable_type','App\Models\Admin\Market\OfflinePayment')->get();
        return view('admin.market.payment.index',compact('payments'));
    }
    public function online(){
        $payments = Payment::where('paymentable_type','App\Models\Admin\Market\OnlinePayment')->get();
        return view('admin.market.payment.index',compact('payments'));
    }
    public function cash(){
        $payments = Payment::where('paymentable_type','App\Models\Admin\Market\CashPayment')->get();
        return view('admin.market.payment.index',compact('payments'));
    }
    public function canceled(Payment $payment){
        $payment->status = 2;
        $result = $payment->save();
        if ($result == false){
            return redirect()->back()->with('swal-error','خطا');
        }
        return redirect()->back()->with('swal-success','پرداخت کنسل شد');
    }

    public function returned(Payment $payment){
        $payment->status = 3;
        $result = $payment->save();
        if ($result == false){
            return redirect()->back()->with('swal-error','خطا');
        }
        return redirect()->back()->with('swal-success','پرداخت بازگردانده شد');
    }

    public function show(Payment $payment){
        return view('admin.market.payment.show',compact('payment'));
    }
}
