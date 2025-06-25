<?php

namespace App\Services;

use GuzzleHttp\Client;

class PayPalService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('paypal.base_url'),
        ]);
    }

    public function getAccessToken()
    {
        $response = $this->client->post('/v1/oauth2/token', [
            'auth' => [config('paypal.client_id'), config('paypal.secret')],
            'form_params' => ['grant_type' => 'client_credentials'],
        ]);

        return json_decode($response->getBody()->getContents())->access_token;
    }

    public function createOrder($amount)
    {
        $accessToken = $this->getAccessToken();

        $response = $this->client->post('/v2/checkout/orders', [
            'headers' => [
                'Authorization' => "Bearer {$accessToken}",
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'intent' => 'CAPTURE',
                'purchase_units' => [[
                    'amount' => [
                        'currency_code' => 'USD',
                        'value' => $amount,
                    ],
                ]],
            ],
        ]);

        return json_decode($response->getBody()->getContents());
    }

    public function captureOrder($orderId)
    {
        $accessToken = $this->getAccessToken();

        $response = $this->client->post("/v2/checkout/orders/{$orderId}/capture", [
            'headers' => [
                'Authorization' => "Bearer {$accessToken}",
                'Content-Type' => 'application/json',
            ]
        ]);

        return json_decode($response->getBody()->getContents());
    }
}
