<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Market\CartItem;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function addressAndDelivery(){
        $user = Auth::user();
        $provinces = Province::all();
        $cartItems = CartItem::where('user_id',$user->id)->get();
        if (empty(CartItem::query()->where('user_id',$user->id)->count())){
            return redirect()->route('customer.sales-process.cart');
        }
        return view('customer.sales-process.address-and-delivery',compact('cartItems','user','provinces'));
    }

    public function addAddress(){

    }

    public function getCities(Province $province)
    {
        $cities = $province->cities()->get();
        if ($cities != null){
            return response()->json(['status' => true,'cities' => $cities]);
        }
        else{
            return response()->json(['status' => false,'cities' => null]);
        }
    }
}
