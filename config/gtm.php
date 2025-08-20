<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Google Tag Manager Configuration
    |--------------------------------------------------------------------------
    |
    | This file contains the configuration for Google Tag Manager.
    | You can change the GTM ID here and it will be updated across the site.
    |
    */

    'id' => env('GTM_ID', 'GTM-K2MXKC7T'),

    /*
    |--------------------------------------------------------------------------
    | Enable/Disable GTM
    |--------------------------------------------------------------------------
    |
    | Set this to false to disable GTM completely.
    |
    */

    'enabled' => env('GTM_ENABLED', true),

    /*
    |--------------------------------------------------------------------------
    | Environment
    |--------------------------------------------------------------------------
    |
    | Set the environment for GTM (development, staging, production).
    | This can be used to conditionally enable/disable GTM.
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
