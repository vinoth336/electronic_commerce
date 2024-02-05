<?php

return [
    'api_url' => env('CUSTOM_SMS_API_URL', 'https://control.msg91.com/api/v5/flow/'),
    'api_key' => env('CUSTOM_SMS_API_KEY', '405613ALCznVo9M651a43e7P1'),
    'debug' => false,
    'sender' => env('CUSTOM_SMS_SENDER_NAME', 'KITDEV'),
    'route' => '4',
    'country' => '91',
    'otp_template_id' => '650b28f4d6fc05347a3d88d3'
];
