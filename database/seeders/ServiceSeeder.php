<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Industrial Compressor Installation',
                'slug' => 'industrial-compressor-installation',
                'description' => 'Professional installation services for industrial compressors with expert technicians and quality assurance.',
                'icon' => 'fa-cogs',
                'status' => 'active',
                'order' => 1
            ],
            [
                'title' => 'Maintenance & Repair',
                'slug' => 'maintenance-repair',
                'description' => 'Comprehensive maintenance and repair services to ensure optimal performance and longevity of your compressors.',
                'icon' => 'fa-tools',
                'status' => 'active',
                'order' => 2
            ],
            [
                'title' => 'Energy Efficiency Consulting',
                'slug' => 'energy-efficiency-consulting',
                'description' => 'Expert consulting services to optimize your compressor systems for maximum energy efficiency and cost savings.',
                'icon' => 'fa-leaf',
                'status' => 'active',
                'order' => 3
            ],
            [
                'title' => '24/7 Emergency Support',
                'slug' => 'emergency-support',
                'description' => 'Round-the-clock emergency support and rapid response services for critical compressor issues.',
                'icon' => 'fa-phone',
                'status' => 'active',
                'order' => 4
            ],
            [
                'title' => 'Training & Certification',
                'slug' => 'training-certification',
                'description' => 'Comprehensive training programs for your staff on compressor operation, maintenance, and safety protocols.',
                'icon' => 'fa-graduation-cap',
                'status' => 'active',
                'order' => 5
            ]
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
