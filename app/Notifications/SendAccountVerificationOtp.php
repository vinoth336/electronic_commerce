<?php

namespace App\Notifications;

use App\Library\CustomSms;
use App\Mail\SendRegistrationEmailVerification;
use Craftsys\Notifications\Messages\Msg91SMS;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendAccountVerificationOtp extends Notification
{
    use Queueable;

    public $content;
    public $phoneNumber;

    public function __construct($user)
    {
        $this->content = [
            "template_id" => config('custom_sms.otp_template_id'),
            "short_url" => "0",
            "recipients" => [[
                "mobiles" => $user->phone_no,
                "user_name" => $user->name,
                "otp" => $user->otpSent()
            ]]
        ];
        $this->phoneNumber = $user->phone_no;


    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMsg91($notifiable)
    {

        return (new Msg91SMS)
            ->flow(config('custom_sms.otp_template_id'))
            ->variable('user_name', $this->name)
            ->variable('verification_code', generate_otp())
            ->to([$this->phoneNumber]);
    }

    public function toMail($notifiable)
    {
        return (new SendRegistrationEmailVerification($notifiable))
            ->to($notifiable->email);
    }
}
