<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'firebase' => [
        'api_key' => 'AIzaSyA-kUH8-Zbfa-BZYVdCflhCY8ryenwNAGM',
        'auth_domain' => 'sosacessivel.firebaseapp.com',
        'database_url' => 'https://sosacessivel.firebaseio.com',
        'secret' => 'sUwPQ3ficU2NNWqUSg3EB3Hm2V3nGqUiKvkrTCVU',
        'storage_bucket' => 'sosacessivel.appspot.com',
    ],

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

];
