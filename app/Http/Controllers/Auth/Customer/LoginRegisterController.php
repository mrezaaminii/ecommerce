<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Customer\LoginRegisterRequest;
use App\Http\Services\Message\Email\EmailService;
use App\Http\Services\Message\MessageService;
use App\Http\Services\Message\SMS\SmsService;
use App\Models\Otp;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;

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
        elseif (preg_match('/^(\+98|98|0)9\d{9}$/',$inputs['id'])){
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

        if ($type === 0){
            $smsService = new SmsService();
            $smsService->setFrom(Config::get('sms.otp_from'));
            $smsService->setTo(['0'.$user->mobile]);
            $smsService->setText("مجموعه آمازون \n کد تایید : $otpCode");
            $smsService->setIsFlash(true);

            $messageService = new MessageService($smsService);
        }
        elseif($type === 1){
            $emailService = new EmailService();
            $details = [
                'title' => 'ایمیل فعال سازی',
                'body' => "کد فعال سازی شما : $otpCode"
            ];
            $emailService->setDetails($details);
            $emailService->setFrom('noreply@example.com', 'example');
            $emailService->setSubject('کد احراز هویت');
            $emailService->setTo($inputs['id']);

            $messagesService = new MessageService($emailService);

        }
        $messagesService->send();

        return redirect()->route('auth.customer.login-confirm-form',$token);
    }

    public function loginConfirmForm($token){
        $otp = Otp::where('token',$token)->first();
        if (empty($otp)){
            return redirect()->route('auth.customer.login-register-form')->withErrors(['id' => 'آدرس وارد شده نامعتبر میباشد']);
        }
        return view('customer.auth.login-confirm',compact('token','otp'));
    }

    public function loginConfirm($token,LoginRegisterRequest $request){
        $inputs = $request->all();
        $otp = Otp::where('token',$token)->where('used',0)->where('created_at','>=',Carbon::now()->subMinute(5)->toDateTimeString())->first();
        if (empty($otp)){
            return redirect()->route('auth.customer.login-register-form')->withErrors(['id' => 'آدرس وارد شده نامعتبر میباشد']);
        }
        if ($otp->otp_code !== $inputs['otp']){
            return redirect()->route('auth.customer.login-confirm-form',$token)->withErrors(['otp' => 'کد وارد شده صحیح نمیباشد']);
        }
        $otp->update([
            'used' => 1,
        ]);
        $user = $otp->user()->first();
        if ($otp->type == 0 && empty($user->mobile_verified_at)){
            $user->update([
                'mobile_verified_at' => Carbon::now()
            ]);
        }
        elseif ($otp->type == 1 && empty($user->email_verified_at)){
            $user->update([
                'email_verified_at' => Carbon::now(),
            ]);
        }
        Auth::login($user);
        return redirect()->route('customer.home');
    }
    public function loginResendOtp($token){
        $otp = Otp::where('token',$token)->where('created_at','<=',Carbon::now()->subMinutes(5)->toDateTimeString())->first();
        if (empty($otp)){
            return redirect()->route('auth.customer.login-register-form',$token)->withErrors(['id' => 'آدرس وارد شده نامعتبر میباشد']);
        }
        $user = $otp->user()->first();
        $otpCode = rand(111111,999999);
        $newToken = Str::random(60);
        $otpInput = [
            'token' => $newToken,
            'user_id' => $user->id,
            'otp_code' => $otpCode,
            'login_id' => $otp->login_id,
            'type' => $otp->type,
        ];

        Otp::create($otpInput);

        if ($otp->type === 0){
            $smsService = new SmsService();
            $smsService->setFrom(Config::get('sms.otp_from'));
            $smsService->setTo(['0'.$user->mobile]);
            $smsService->setText("مجموعه آمازون \n کد تایید : $otpCode");
            $smsService->setIsFlash(true);

            $messageService = new MessageService($smsService);
        }
        elseif($otp->type === 1){
            $emailService = new EmailService();
            $details = [
                'title' => 'ایمیل فعال سازی',
                'body' => "کد فعال سازی شما : $otpCode"
            ];
            $emailService->setDetails($details);
            $emailService->setFrom('noreply@example.com', 'example');
            $emailService->setSubject('کد احراز هویت');
            $emailService->setTo($otp->login_id);

            $messagesService = new MessageService($emailService);

        }
        $messagesService->send();

        return redirect()->route('auth.customer.login-confirm-form',$newToken);
    }

}
