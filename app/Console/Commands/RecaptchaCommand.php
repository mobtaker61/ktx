<?php

namespace App\Console\Commands;

use App\Helpers\RecaptchaHelper;
use Illuminate\Console\Command;

class RecaptchaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recaptcha:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check Google reCAPTCHA status and configuration';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('🔒 Google reCAPTCHA Status Check');
        $this->newLine();

        $config = RecaptchaHelper::getConfig();

        $this->table(
            ['Setting', 'Value', 'Status'],
            [
                ['Site Key', $config['site_key'] ?: 'Not Set', $config['site_key'] ? '✅' : '❌'],
                ['Secret Key', 'Set', '✅'],
                ['Version', $config['version'], '🔧'],
                ['Theme', $config['theme'], '🎨'],
                ['Size', $config['size'], '📏'],
                ['Language', $config['language'], '🌍'],
            ]
        );

        $this->newLine();

        if ($config['enabled']) {
            $this->info('✅ reCAPTCHA is enabled and ready to use!');
            $this->info("🔑 Site Key: {$config['site_key']}");
            $this->info("🔧 Version: {$config['version']}");
        } else {
            $this->warn('⚠️  reCAPTCHA is disabled. Check your configuration.');
        }

        $this->newLine();
        $this->info('💡 Use "php artisan recaptcha:test" to test reCAPTCHA functionality');

        return 0;
    }
}
