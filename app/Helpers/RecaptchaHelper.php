<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class RecaptchaHelper
{
    /**
     * Check if reCAPTCHA is enabled
     */
    public static function isEnabled(): bool
    {
        return config('recaptcha.enabled', false) && config('recaptcha.site_key') && config('recaptcha.secret_key');
    }

    /**
     * Get reCAPTCHA site key
     */
    public static function getSiteKey(): ?string
    {
        return config('recaptcha.site_key');
    }

    /**
     * Get reCAPTCHA version
     */
    public static function getVersion(): string
    {
        return config('recaptcha.version', 'v2');
    }

    /**
     * Get reCAPTCHA theme
     */
    public static function getTheme(): string
    {
        return config('recaptcha.theme', 'light');
    }

    /**
     * Get reCAPTCHA size
     */
    public static function getSize(): string
    {
        return config('recaptcha.size', 'normal');
    }

    /**
     * Get reCAPTCHA language
     */
    public static function getLanguage(): string
    {
        return config('recaptcha.language', 'fa');
    }

    /**
     * Verify reCAPTCHA response
     */
    public static function verify(string $response, ?string $remoteIp = null): bool
    {
        if (! self::isEnabled()) {
            return true; // Skip verification if disabled
        }

        if (empty($response)) {
            return false;
        }

        try {
            $result = Http::timeout(config('recaptcha.timeout', 10))
                ->asForm()
                ->post('https://www.google.com/recaptcha/api/siteverify', [
                    'secret' => config('recaptcha.secret_key'),
                    'response' => $response,
                    'remoteip' => $remoteIp ?: request()->ip(),
                ]);

            if ($result->successful()) {
                $data = $result->json();

                if (self::getVersion() === 'v3') {
                    return $data['success'] && ($data['score'] ?? 0) >= config('recaptcha.min_score', 0.5);
                }

                return $data['success'] ?? false;
            }

            return false;
        } catch (\Exception $e) {
            Log::error('reCAPTCHA verification failed: '.$e->getMessage());

            return false;
        }
    }

    /**
     * Get reCAPTCHA HTML widget
     */
    public static function getWidget(): string
    {
        if (! self::isEnabled()) {
            return '';
        }

        $siteKey = self::getSiteKey();
        $version = self::getVersion();
        $theme = self::getTheme();
        $size = self::getSize();
        $language = self::getLanguage();

        if ($version === 'v3') {
            return self::getV3Widget($siteKey, $language);
        }

        return self::getV2Widget($siteKey, $theme, $size, $language);
    }

    /**
     * Get reCAPTCHA v2 widget HTML
     */
    private static function getV2Widget(string $siteKey, string $theme, string $size, string $language): string
    {
        $languageAttr = $language !== 'en' ? " data-language=\"{$language}\"" : '';
        $themeAttr = $theme !== 'light' ? " data-theme=\"{$theme}\"" : '';
        $sizeAttr = $size !== 'normal' ? " data-size=\"{$size}\"" : '';

        return "<div class=\"g-recaptcha\" data-sitekey=\"{$siteKey}\"{$themeAttr}{$sizeAttr}{$languageAttr}></div>";
    }

    /**
     * Get reCAPTCHA v3 widget HTML
     */
    private static function getV3Widget(string $siteKey, string $language): string
    {
        $languageAttr = $language !== 'en' ? " data-language=\"{$language}\"" : '';

        return "<div class=\"g-recaptcha\" data-sitekey=\"{$siteKey}\" data-size=\"invisible\"{$languageAttr}></div>";
    }

    /**
     * Get reCAPTCHA JavaScript include
     */
    public static function getScript(): string
    {
        if (! self::isEnabled()) {
            return '';
        }

        $version = self::getVersion();
        $language = self::getLanguage();
        $languageParam = $language !== 'en' ? "&hl={$language}" : '';

        if ($version === 'v3') {
            return '<script src="https://www.google.com/recaptcha/api.js?render='.self::getSiteKey()."{$languageParam}\"></script>";
        }

        return "<script src=\"https://www.google.com/recaptcha/api.js{$languageParam}\" async defer></script>";
    }

    /**
     * Get reCAPTCHA configuration as array
     */
    public static function getConfig(): array
    {
        return [
            'enabled' => self::isEnabled(),
            'site_key' => self::getSiteKey(),
            'version' => self::getVersion(),
            'theme' => self::getTheme(),
            'size' => self::getSize(),
            'language' => self::getLanguage(),
            'min_score' => config('recaptcha.min_score', 0.5),
        ];
    }
}
