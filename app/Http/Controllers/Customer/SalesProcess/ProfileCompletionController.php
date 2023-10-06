<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\SalesProcess\ProfileCompletionRequest;
use App\Models\Market\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileCompletionController extends Controller
{
    public function profileCompletion(){
        $user = Auth::user();
        $cartItems = CartItem::query()->where('user_id',$user->id)->get();
        return view('customer.sales-process.profile-completion',compact('cartItems','user'));
    }

    public function update(ProfileCompletionRequest $request){
        $inputs = $request->all();
        $user = Auth::user();
        $user->update($inputs);
        return redirect()->route('customer.sales-process.address-and-delivery');
    }
}
