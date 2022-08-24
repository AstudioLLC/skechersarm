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

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'google' => [
        'client_id' => '485043140317-jv0l2d37n6umbfldrh8520jrkbt6neeo.apps.googleusercontent.com',
        'client_secret' => 'g77cEtRNHvbaG8XRCefgywKn',
        'redirect' => 'https://machtech.am/scoutory/auth/google/callback',
    ],

    'facebook' => [
        'client_id' => '555064599564931',
        'client_secret' => 'add83c6a00574745296ccc8acdc12046',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],

    'twitter' => [
        'client_id' => 'xxxxxxxxxxxx',
        'client_secret' => 'xxxxxxxxxxxx',
        'redirect' => 'http://localhost:8000/auth/twitter/callback',
    ],

];
