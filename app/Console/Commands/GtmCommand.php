<?php

namespace App\Console\Commands;

use App\Helpers\GtmHelper;
use Illuminate\Console\Command;

class GtmCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gtm:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check Google Tag Manager status and configuration';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🔍 Google Tag Manager Status Check');
        $this->newLine();

        $config = GtmHelper::getConfig();

        $this->table(
            ['Setting', 'Value', 'Status'],
            [
                ['GTM ID', $config['id'] ?: 'Not Set', $config['id'] ? '✅' : '❌'],
                ['Enabled', $config['enabled'] ? 'Yes' : 'No', $config['enabled'] ? '✅' : '❌'],
                ['Debug Mode', $config['enabled'] ? 'Yes' : 'No', $config['debug'] ? '🔧' : '⚙️'],
                ['Environment', $config['environment'], '🌍'],
            ]
        );

        $this->newLine();

        if ($config['enabled']) {
            $this->info('✅ GTM is enabled and ready to use!');
            $this->info("📊 Container ID: {$config['id']}");
        } else {
            $this->warn('⚠️  GTM is disabled. Check your configuration.');
        }

        $this->newLine();
        $this->info('💡 Use "php artisan gtm:test" to test GTM functionality');
    }
}
