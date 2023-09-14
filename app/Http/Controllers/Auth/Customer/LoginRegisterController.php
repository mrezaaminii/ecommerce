<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Customer\LoginRegisterRequest;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LoginRegisterController extends Controller
{
    public function loginRegisterForm(){
        return view('customer.auth.login-register');
    }

    public function loginRegister(LoginRegisterRequest $request){
        $inputs = $request->all();
        if (filter_var($inputs['id'],FILTER_VALIDATE_EMAIL)){
            $type = 1;
            $user = User::where('email',$inputs['id'])->first();
            if (empty($user)){
                $newUser['email'] = $inputs['id'];
            }
        }
        elseif (preg_match('/^(\+98|98|0)9\d{9}$',$inputs['id'])){
            $type = 0;
            $inputs['id'] = ltrim($inputs['id'],0);
            $inputs['id'] = substr($inputs['id'],0,2) === '98' ? substr($inputs['id'],2) : $inputs['id'];
            $inputs['id'] = str_replace('+98','',$inputs['id']);

            $user = User::where('mobile',$inputs['id'])->first();
            if (empty($user)){
                $newUser['mobile'] = $inputs['id'];
            }
        }
        else{
            $errorText = 'شناسه شما نه ایمیل است نه شماره موبایل';
            return redirect()->route('auth.customer.login-register-form')->withErrors(['id' => $errorText]);
        }
        if (empty($user)){
            $newUser['password'] = '98355154';
            $newUser['activation'] = 1;
            $user = User::create($newUser);
        }

        $otpCode = rand(111111,999999);
        $token = Str::random(60);
        $otpInput = [
            'token' => $token,
            'user_id' => $user->id,
            'otp_code' => $otpCode,
            'login_id' => $inputs['id'],
            'type' => $type,
        ];

        Otp::create($otpInput);
    }


}
