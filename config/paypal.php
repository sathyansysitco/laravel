<?php
return [
    'client_id' => env('PAYPAL_CLIENT_ID'),
    'secret' => env('PAYPAL_SECRET'),
    'base_url' => env('PAYPAL_BASE_URL', 'https://api-m.sandbox.paypal.com'),
];
