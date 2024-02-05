<?php

namespace App\Library;

use App\Service\CustomSmsService;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;
use function PHPUnit\Framework\isNull;

class CustomSms
{
    public $phoneNumber;
    public $lines;
    public $dryrun = 'no';

    /**
     * SmsMessage constructor.
     * @param array $lines
     */
    public function __construct($lines = [])
    {
        $this->lines = $lines;
        $this->phoneNumber = '';
        $this->from = '';
    }

    public function content($line = ''): self
    {
        $this->lines[] = $line;

        return $this;
    }

    public function to($phoneNumber=''): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function send($notifiable, Notification $notification)
    {
        if (!method_exists($notification, 'toSms')) {
           throw new \Exception("toSms is not implemented");
        }
        $data = $notification->toSms($notifiable);
        if (is_null($data->phoneNumber)) {
            $data->to($notifiable->routeNotificationForCustomSms($notifiable));
        }
        $response = (new CustomSmsService())->send($data->makeRequest());

        info( [
            'user_mobile_number' => $this->phoneNumber,
            'response' => $response->json(),
        ]);
        return $response;
    }

    public function dryrun($dry = 'yes'): self
    {
        $this->dryrun = $dry;

        return $this;
    }

    public function makeRequest()
    {
        return $this->lines[0];
    }

}
