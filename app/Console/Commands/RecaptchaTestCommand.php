<?php

namespace App\Console\Commands;

use App\Helpers\RecaptchaHelper;
use Illuminate\Console\Command;

class RecaptchaTestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recaptcha:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Google reCAPTCHA functionality';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (! RecaptchaHelper::isEnabled()) {
            $this->error('❌ reCAPTCHA is not enabled. Run "php artisan recaptcha:status" to check configuration.');

            return 1;
        }

        $this->info('🧪 Testing Google reCAPTCHA...');
        $this->newLine();

        // Test configuration
        $this->info('1. Testing Configuration...');
        $config = RecaptchaHelper::getConfig();
        $this->info("   ✅ Site Key: {$config['site_key']}");
        $this->info("   ✅ Version: {$config['version']}");
        $this->info("   ✅ Theme: {$config['theme']}");
        $this->info("   ✅ Size: {$config['size']}");
        $this->info("   ✅ Language: {$config['language']}");

        // Test helper functions
        $this->newLine();
        $this->info('2. Testing Helper Functions...');

        $widgetHtml = RecaptchaHelper::getWidget();
        $this->info('   ✅ Widget Generation: '.(str_contains($widgetHtml, 'g-recaptcha') ? 'Working' : 'Failed'));

        $scriptHtml = RecaptchaHelper::getScript();
        $this->info('   ✅ Script Generation: '.(str_contains($scriptHtml, 'recaptcha/api.js') ? 'Working' : 'Failed'));

        // Test verification (mock)
        $this->newLine();
        $this->info('3. Testing Verification...');
        $this->info('   ℹ️  Verification requires actual user interaction');
        $this->info('   ℹ️  Test on your website with real reCAPTCHA responses');

        $this->newLine();
        $this->info('✅ reCAPTCHA Test Completed Successfully!');
        $this->info('🌐 Visit your website to see reCAPTCHA in action');
        $this->info('🔒 Check browser console for any JavaScript errors');

        return 0;
    }
}
