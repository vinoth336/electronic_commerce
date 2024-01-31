<?php

namespace App\Http\Controllers;

use App\CustomerChangePasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerForgotPasswordRequest;
use App\Http\Requests\UserLoginRequest;
use App\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserLoginController extends Controller
{

    public function showLoginForm()
    {
        return view('public.auth.login');
    }

    public function login(UserLoginRequest $request)
    {


        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone_no';
        if (Auth::guard('web')->attempt([$fieldType => $request->username, 'password' => $request->password], $request->filled('remember'))) {
            //Authentication passed...

           if(!auth()->user()->isActiveUser()) {
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                return $this->loginFailed('Your Account was Deactive, Please Contact Admin To Activate Your Account');
           }

            $redirectTo = route('home');
            if($request->has('redirectTo')) {
                if($request->get('redirectTo') == 'checkout') {
                    $redirectTo = route('public.cart.checkout');
                }
            }
            return redirect()
                 ->intended($redirectTo);
        }

        //Authentication failed...
        return $this->loginFailed();
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return redirect()
            ->route('home');
    }

    private function loginFailed($msg = 'Login failed, please try again!'){
        return redirect()
            ->back()
            ->withInput()
            ->with('login_failed', $msg);
    }

    public function forgotPassword(CustomerForgotPasswordRequest $request)
    {
        DB::beginTransaction();

        try {
            $user = User::where('phone_no', $request->get('forgot_password_phone_no'))->first();
            $changePasswordRequest = new CustomerChangePasswordRequest();
            $changePasswordRequest->user_id = $user->id;
            $changePasswordRequest->status = 'pending';
            $changePasswordRequest->request_type = 'change_password';
            $changePasswordRequest->save();

            DB::commit();

            return redirect()
            ->route('home')
            ->withInput()
            ->with('login_success','Your Request Submitted Successfully');

        } catch(Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());

            die('error' . $e->getMessage());
            return redirect()
            ->route('home')
            ->with(['login_failed' => "Can't Process Request"], SERVER_ERROR);
        }


    }

    private function validator(Request $request)
    {
        //validation rules.
        $rules = [
            'username'    => 'required|username|exists:members,username',
            'password' => 'required|string|min:4|max:255',
        ];

        //validate the request.
        $request->validate($rules);
    }

	
    public function showOtpVerify(Request $request)
    {
        return view('public.user.phone_number_verify', ['user' => auth()->user()]);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'verify_otp' => 'required|string|min:6|max:6'
        ]);

        try {
            $user = auth()->user();

            if ($user->verifyOtp($request->verify_otp)) {

                return redirect()->route('public.dashboard');
            } else {

                return redirect()->route('public.show_otp_verify')->withErrors(['verify_otp' => 'Please Enter Valid OTP.']);
            }

        } catch (Exception $exception) {

        }
    }

    public function sendOtp(Request $request)
    {
        $user = auth()->user();
        $user->sendOtp();

        return response(['status' => SUCCESS, 'message' => 'OTP sent to your registered mobile number. Kindly check it.']);

    }
}
