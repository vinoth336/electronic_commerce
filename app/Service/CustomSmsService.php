<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;

class CustomSmsService
{

    public function send($data)
    {
        return Http::withHeaders([
                'accept' => 'application/json',
                'authkey' => config('custom_sms.api_key'),
                'content-type' => 'application/json'
            ])->withBody(json_encode($data), 'application/json')->post(config('custom_sms.api_url'));

    }
}
