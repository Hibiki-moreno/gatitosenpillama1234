<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    //estas son de las api
    'openweathermap' => [
        'key' => env('OPENWEATHERMAP_API_KEY'),
        'url' => 'https://api.openweathermap.org/data/2.5/weather'
    ],
    
    'exchangerate' => [
        'key' => env('EXCHANGERATE_API_KEY'),
        'url' => 'https://v6.exchangerate-api.com/v6'
    ],
    
    'newsapi' => [
        'key' => env('NEWS_API_KEY'),
        'url' => 'https://newsapi.org/v2/top-headlines'
    ],
    
    'ipapi' => [
        'url' => 'http://ip-api.com/json'
    ],
    
    'openmeteo' => [
        'url' => 'https://api.open-meteo.com/v1/forecast'
    ],
    
    'frankfurter' => [
        'url' => 'https://api.frankfurter.app/latest'
    ],

    'google' => [
    'client_id' => env('GOOGLE_CLIENT_ID'),
    'client_secret' => env('GOOGLE_CLIENT_SECRET'),
    'redirect' => env('GOOGLE_REDIRECT_URI'),
    ],
    'locationiq' => [
        'key' => env('LOCATIONIQ_TOKEN'),
    ],

];