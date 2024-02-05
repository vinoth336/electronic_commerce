<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class AccountIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $user = User::where('phone_no', auth()->id())->first();
        $emailVerified = true;
        $phoneNumberVerified = true;
        foreach(config('app.account_verification_required_in') as $requiredChannel) {
            if($requiredChannel == 'mail') {
                if ($user->email_verified_at) {
                    $emailVerified = true;
                } else {
                    $emailVerified = false;
                }
            }
            if($requiredChannel == 'phone_no') {
                if ($user->is_phone_number_verified) {
                    $phoneNumberVerified = true;
                } else {
                    $phoneNumberVerified = false;
                }
            }
        }

        if($emailVerified && $phoneNumberVerified) {
            return $next($request);
        } else {

            return redirect()->route('public.show_otp_verify');
        }
    }
}
