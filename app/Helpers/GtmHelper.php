<?php

namespace App\Helpers;

class GtmHelper
{
    /**
     * Check if GTM is enabled
     */
    public static function isEnabled(): bool
    {
        return config('gtm.enabled', false) && config('gtm.id');
    }

    /**
     * Get GTM ID
     */
    public static function getId(): ?string
    {
        return config('gtm.id');
    }

    /**
     * Check if debug mode is enabled
     */
    public static function isDebug(): bool
    {
        return config('gtm.debug', false);
    }

    /**
     * Get current environment
     */
    public static function getEnvironment(): string
    {
        return config('gtm.environment', 'production');
    }

    /**
     * Push event to gtag
     */
    public static function pushEvent(string $event, array $data = []): string
    {
        if (! self::isEnabled()) {
            return '';
        }

        $eventData = array_merge(['event' => $event], $data);
        $jsonData = json_encode($eventData);

        return "<script>if (typeof gtag !== 'undefined') { gtag('event', '{$event}', {$jsonData}); }</script>";
    }

    /**
     * Push page view to gtag
     */
    public static function pushPageView(?string $pageTitle = null, ?string $pageUrl = null): string
    {
        $data = [
            'page_title' => $pageTitle ?: request()->route()?->getName() ?: 'Unknown Page',
            'page_url' => $pageUrl ?: request()->fullUrl(),
            'page_type' => request()->route()?->getName() ?: 'page',
        ];

        return self::pushEvent('page_view', $data);
    }

    /**
     * Push custom event to gtag
     */
    public static function pushCustomEvent(string $eventName, array $eventData = []): string
    {
        return self::pushEvent($eventName, $eventData);
    }

    /**
     * Get GTM configuration as array
     */
    public static function getConfig(): array
    {
        return [
            'enabled' => self::isEnabled(),
            'id' => self::getId(),
            'debug' => self::isDebug(),
            'environment' => self::getEnvironment(),
        ];
    }
}
