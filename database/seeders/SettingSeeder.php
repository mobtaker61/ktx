<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            [
                'key' => 'site_name',
                'value' => 'KTX.Tech',
                'type' => 'text',
                'description' => 'Website name'
            ],
            [
                'key' => 'site_description',
                'value' => 'Leading industrial compressor solutions provider in Saudi Arabia',
                'type' => 'textarea',
                'description' => 'Website description'
            ],
            [
                'key' => 'site_email',
                'value' => 'info@ktx.tech',
                'type' => 'email',
                'description' => 'Main contact email'
            ],
            [
                'key' => 'site_phone',
                'value' => '+966 11 123 4567',
                'type' => 'text',
                'description' => 'Main contact phone'
            ],
            [
                'key' => 'site_address',
                'value' => 'Riyadh, Saudi Arabia',
                'type' => 'textarea',
                'description' => 'Company address'
            ],
            [
                'key' => 'facebook_url',
                'value' => 'https://facebook.com/ktxtech',
                'type' => 'url',
                'description' => 'Facebook page URL'
            ],
            [
                'key' => 'twitter_url',
                'value' => 'https://twitter.com/ktxtech',
                'type' => 'url',
                'description' => 'Twitter profile URL'
            ],
            [
                'key' => 'linkedin_url',
                'value' => 'https://linkedin.com/company/ktxtech',
                'type' => 'url',
                'description' => 'LinkedIn company page URL'
            ],
            [
                'key' => 'meta_title',
                'value' => 'KTX.Tech - Industrial Compressors & Solutions',
                'type' => 'text',
                'description' => 'SEO meta title'
            ],
            [
                'key' => 'meta_description',
                'value' => 'Leading provider of industrial compressor solutions in Saudi Arabia. High-quality compressors, maintenance, and support services.',
                'type' => 'textarea',
                'description' => 'SEO meta description'
            ],
            [
                'key' => 'meta_keywords',
                'value' => 'industrial compressors, air compressors, Saudi Arabia, KTX, maintenance, support',
                'type' => 'text',
                'description' => 'SEO meta keywords'
            ],
            [
                'key' => 'business_hours',
                'value' => 'Sunday - Thursday: 8:00 AM - 6:00 PM',
                'type' => 'text',
                'description' => 'Business operating hours'
            ],
            [
                'key' => 'emergency_phone',
                'value' => '+966 50 123 4567',
                'type' => 'text',
                'description' => 'Emergency contact phone'
            ],
            [
                'key' => 'support_email',
                'value' => 'support@ktx.tech',
                'type' => 'email',
                'description' => 'Technical support email'
            ]
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
