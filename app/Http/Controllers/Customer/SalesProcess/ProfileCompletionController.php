<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Helpers\helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\SalesProcess\ProfileCompletionRequest;
use App\Models\Market\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileCompletionController extends Controller
{
    public function profileCompletion()
    {
        $user = Auth::user();
        $cartItems = CartItem::query()->where('user_id', $user->id)->get();
        return view('customer.sales-process.profile-completion', compact('cartItems', 'user'));
    }

    public function update(ProfileCompletionRequest $request)
    {
        $user = Auth::user();
        $national_code = helper::convertPersianToEnglish($request->national_code);
        $inputs = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'national_code' => $request->national_code,
        ];

        if (isset($request->mobile) && empty($user->mobile)) {
            $mobile = helper::convertPersianToEnglish($request->mobile);
            if (preg_match('/^(\+98|98|0)9\d{9}$/', $mobile)) {
                $type = 0;
                $mobile = ltrim($mobile, '0');
                $mobile = str_replace('+98', '', $mobile);
                $mobile = str_starts_with($mobile, '98') ? substr($mobile, 2) : $mobile;
                $inputs['mobile'] = $mobile;
            } else {
                $errorText = 'فرمت شماره موبایل معتبر نمیباشد';
                return back()->withErrors(['error' => $errorText]);
            }
        }
        if (isset($request->email) && empty($user->email)) {
            $email = helper::convertPersianToEnglish($request->email);
            $inputs['email'] = $email;
        }

        array_filter($inputs);
        if (!empty($inputs)) {
            $user->update($inputs);
        }

        return redirect()->route('customer.sales-process.address-and-delivery');
    }
}
