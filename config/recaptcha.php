<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Google reCAPTCHA Configuration
    |--------------------------------------------------------------------------
    |
    | This file contains the configuration for Google reCAPTCHA.
    | You can change the keys here and they will be updated across the site.
    |
    */

    'site_key' => env('RECAPTCHA_SITE_KEY', '6LcRhKwrAAAAALCwHCEeq8V8qS1klNuvzHwcJ3I9'),

    'secret_key' => env('RECAPTCHA_SECRET_KEY', '6LcRhKwrAAAAAG5NZADUHxTANE-XAomGgT3qnWU2'),

    /*
    |--------------------------------------------------------------------------
    | Enable/Disable reCAPTCHA
    |--------------------------------------------------------------------------
    |
    | Set this to false to disable reCAPTCHA completely.
    |
    */

    'enabled' => env('RECAPTCHA_ENABLED', true),

    /*
    |--------------------------------------------------------------------------
    | reCAPTCHA Version
    |--------------------------------------------------------------------------
    |
    | Choose between 'v2' and 'v3'. Default is 'v2'.
    |
    */

    'version' => env('RECAPTCHA_VERSION', 'v2'),

    /*
    |--------------------------------------------------------------------------
    | reCAPTCHA Theme
    |--------------------------------------------------------------------------
    |
    | For v2: 'light' or 'dark'
    | For v3: not applicable
    |
    */

    'theme' => env('RECAPTCHA_THEME', 'light'),

    /*
    |--------------------------------------------------------------------------
    | reCAPTCHA Size
    |--------------------------------------------------------------------------
    |
    | For v2: 'normal', 'compact', 'invisible'
    | For v3: not applicable
    |
    */

    'size' => env('RECAPTCHA_SIZE', 'normal'),

    /*
    |--------------------------------------------------------------------------
    | reCAPTCHA Language
    |--------------------------------------------------------------------------
    |
    | Language code for reCAPTCHA (e.g., 'fa', 'en', 'ar')
    |
    */

    'language' => env('RECAPTCHA_LANGUAGE', 'fa'),

    /*
    |--------------------------------------------------------------------------
    | Minimum Score for v3
    |--------------------------------------------------------------------------
    |
    | Minimum score required for v3 reCAPTCHA (0.0 to 1.0)
    |
    */

    'min_score' => env('RECAPTCHA_MIN_SCORE', 0.5),

    /*
    |--------------------------------------------------------------------------
    | Timeout
    |--------------------------------------------------------------------------
    |
    | Timeout for reCAPTCHA verification in seconds
    |
    */

    'timeout' => env('RECAPTCHA_TIMEOUT', 10),
];
