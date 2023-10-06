<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Http\Controllers\Controller;
use App\Models\Market\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function addressAndDelivery(){
        $user = Auth::user();
        if (empty(CartItem::query()->where('user_id',$user->id)->count())){
            return redirect()->route('customer.sales-process.cart');
        }
        return view('customer.sales-process.address-and-delivery');
    }

    public function addAddress(){

    }
}
