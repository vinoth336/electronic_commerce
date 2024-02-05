<?php

namespace App\DataTransferObject;

class CustomSmsDto
{
    public function __construct()
    {

    }

    public function makeRequest()
    {
        return $this->toArray();
    }

    public function toArray()
    {
        return [
            'sms' => [
                'message' => $this->message,
                'to' => $this->phoneNumber
            ]
        ];
    }
}
