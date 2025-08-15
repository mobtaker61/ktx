<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@ktx.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        $this->command->info('Admin user created successfully!');
        $this->command->info('Email: admin@ktx.com');
        $this->command->info('Password: password');
    }
}
