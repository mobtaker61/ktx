<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Google Analytics 4 Configuration
    |--------------------------------------------------------------------------
    |
    | This file contains the configuration for Google Analytics 4.
    | You can change the GA4 ID here and it will be updated across the site.
    |
    */

    'id' => env('GTM_ID', 'G-V1W96KPJ57'),

    /*
    |--------------------------------------------------------------------------
    | Enable/Disable GA4
    |--------------------------------------------------------------------------
    |
    | Set this to false to disable GA4 completely.
    |
    */

    'enabled' => env('GTM_ENABLED', true),

    /*
    |--------------------------------------------------------------------------
    | Environment
    |--------------------------------------------------------------------------
    |
    | Set the environment for GA4 (development, staging, production).
    | This can be used to conditionally enable/disable GA4.
    |
    */

    'environment' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Debug Mode
    |--------------------------------------------------------------------------
    |
    | Enable debug mode for development environments.
    |
    */

    'debug' => env('GTM_DEBUG', false),
];
