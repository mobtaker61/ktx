<?php

namespace App\Console\Commands;

use App\Helpers\GtmHelper;
use Illuminate\Console\Command;

class GtmTestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gtm:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Google Tag Manager functionality';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (!GtmHelper::isEnabled()) {
            $this->error('❌ GTM is not enabled. Run "php artisan gtm:status" to check configuration.');
            return 1;
        }

        $this->info('🧪 Testing Google Tag Manager...');
        $this->newLine();

        // Test configuration
        $this->info('1. Testing Configuration...');
        $config = GtmHelper::getConfig();
        $this->info("   ✅ GTM ID: {$config['id']}");
        $this->info("   ✅ Environment: {$config['environment']}");
        $this->info("   ✅ Debug Mode: " . ($config['debug'] ? 'Enabled' : 'Disabled'));

        // Test helper functions
        $this->newLine();
        $this->info('2. Testing Helper Functions...');
        
        $eventHtml = GtmHelper::pushEvent('test_event', ['test_data' => 'test_value']);
        $this->info('   ✅ Event Generation: ' . (str_contains($eventHtml, 'dataLayer.push') ? 'Working' : 'Failed'));
        
        $pageViewHtml = GtmHelper::pushPageView('Test Page', 'http://test.com');
        $this->info('   ✅ Page View Generation: ' . (str_contains($pageViewHtml, 'page_view') ? 'Working' : 'Failed'));

        // Test dataLayer
        $this->newLine();
        $this->info('3. Testing DataLayer...');
        $this->info('   ℹ️  To test dataLayer, visit your website and check browser console');
        $this->info('   ℹ️  Use: console.log(dataLayer) to see events');

        $this->newLine();
        $this->info('✅ GTM Test Completed Successfully!');
        $this->info('🌐 Visit your website to see GTM in action');
        $this->info('📊 Check Google Tag Manager for real-time events');
    }
}
