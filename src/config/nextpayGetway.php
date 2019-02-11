<?php

return [

    //-------------------------------
    // Timezone for insert dates in database
    // If you want Gateway not set timezone, just leave it empty
    //--------------------------------
    'timezone' => 'Asia/Tehran',

    //--------------------------------
    // NextPay gateway
    //--------------------------------
    'nextpay' => [
        'apikey'  => 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx',
        'callback_uri' => 'http://localhost:8099/nextpay/callback/'
    ],
    //-------------------------------
    // Tables names
    //--------------------------------
    'table'=> 'nextpay_gateway_transactions',
];