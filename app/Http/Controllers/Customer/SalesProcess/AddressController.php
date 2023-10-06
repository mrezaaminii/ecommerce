<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function addressAndDelivery(){
        $user = Auth::user();
        if (empty($user->full_name) || empty($user->mobile) || empty($user->national_code)){
            return redirect()->route('customer.sales-process.profile-completion');
        }
    }

    public function addAddress(){

    }
}
