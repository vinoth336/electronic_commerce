<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;

class PharmaNewOrderSendNotificationToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user;

    public $userOrder;

    public function __construct($user, $userOrder)
    {
        $this->user = $user;
        $this->userOrder = $userOrder;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $emailNotification = Cache::get('email_notification');

        return $this->to($emailNotification['order_create'])
        ->subject('Pharma - New Order')
        ->view('mail.admin_pharma_order')
        ->with('user', $this->user)
        ->with('userOrder', $this->userOrder);
    }
}
