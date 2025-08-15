<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            ServiceSeeder::class,
            TeamSeeder::class,
            PortfolioCategorySeeder::class,
            PortfolioSeeder::class,
            SettingSeeder::class,
            CountrySeeder::class,
            CareerOpportunitySeeder::class,
            CertificateSeeder::class,
        ]);
    }
}
