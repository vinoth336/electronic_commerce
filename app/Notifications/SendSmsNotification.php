<?php

namespace App\Notifications;

use App\Library\CustomSms;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendSmsNotification extends Notification
{
    use Queueable;

    public $content;
    public $phoneNumber;

    public function __construct($content, $phoneNumber='')
    {
        $this->content = $content;
        if ($phoneNumber) {
           $this->phoneNumber = $phoneNumber;
        }
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [CustomSms::class];
    }

    public function toSms($notifiable)
    {

        return (new CustomSms)
            ->content($this->content)
            ->to($this->phoneNumber);
    }
}
