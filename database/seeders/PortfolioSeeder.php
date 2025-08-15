<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Portfolio;
use Illuminate\Support\Str;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $portfolios = [
            // Industrial Projects
            [
                'title' => 'Industrial Compressor Installation - Petrochemical Plant',
                'slug' => 'industrial-compressor-petrochemical-plant',
                'description' => 'Complete installation and commissioning of industrial compressors for a major petrochemical facility. This project involved the installation of 5 high-capacity compressors with advanced control systems.',
                'client' => 'National Petrochemical Corporation',
                'location' => 'Bandar Imam, Iran',
                'completion_date' => '2024-01-15',
                'category_id' => 1, // Industrial
                'image' => 'portfolios/industrial-1.jpg',
                'status' => 'active',
                'featured' => true,
                'order' => 1
            ],
            [
                'title' => 'Manufacturing Facility Compressor System',
                'slug' => 'manufacturing-facility-compressor-system',
                'description' => 'Design and installation of a comprehensive compressed air system for a large manufacturing facility. The system includes multiple compressors with energy recovery systems.',
                'client' => 'Iran Khodro Industrial Group',
                'location' => 'Tehran, Iran',
                'completion_date' => '2023-11-20',
                'category_id' => 2, // Manufacturing
                'image' => 'portfolios/manufacturing-1.jpg',
                'status' => 'active',
                'featured' => true,
                'order' => 2
            ],
            [
                'title' => 'Oil & Gas Pipeline Compressor Station',
                'slug' => 'oil-gas-pipeline-compressor-station',
                'description' => 'Construction and commissioning of a compressor station for natural gas pipeline operations. This critical infrastructure ensures reliable gas transportation across the network.',
                'client' => 'National Iranian Gas Company',
                'location' => 'Assaluyeh, Iran',
                'completion_date' => '2023-09-10',
                'category_id' => 3, // Oil & Gas
                'image' => 'portfolios/oil-gas-1.jpg',
                'status' => 'active',
                'featured' => false,
                'order' => 3
            ],
            [
                'title' => 'Petrochemical Complex Maintenance',
                'slug' => 'petrochemical-complex-maintenance',
                'description' => 'Comprehensive maintenance and overhaul of compressor systems in a major petrochemical complex. The project included preventive maintenance, repairs, and system optimization.',
                'client' => 'Pars Petrochemical Company',
                'location' => 'Assaluyeh, Iran',
                'completion_date' => '2023-08-25',
                'category_id' => 4, // Petrochemical
                'image' => 'portfolios/petrochemical-1.jpg',
                'status' => 'active',
                'featured' => false,
                'order' => 4
            ],
            [
                'title' => 'Compressor System Upgrade - Steel Plant',
                'slug' => 'compressor-system-upgrade-steel-plant',
                'description' => 'Major upgrade of compressed air systems in a steel manufacturing plant. The project involved replacing outdated compressors with modern, energy-efficient units.',
                'client' => 'Mobarakeh Steel Company',
                'location' => 'Isfahan, Iran',
                'completion_date' => '2023-07-15',
                'category_id' => 5, // Compressor
                'image' => 'portfolios/compressor-1.jpg',
                'status' => 'active',
                'featured' => true,
                'order' => 5
            ],
            [
                'title' => 'Engineering Design - Power Plant',
                'slug' => 'engineering-design-power-plant',
                'description' => 'Complete engineering design for compressor systems in a new power generation facility. The project included system design, equipment selection, and technical specifications.',
                'client' => 'Iran Power Generation Company',
                'location' => 'Shiraz, Iran',
                'completion_date' => '2023-06-30',
                'category_id' => 6, // Engineering
                'image' => 'portfolios/engineering-1.jpg',
                'status' => 'active',
                'featured' => false,
                'order' => 6
            ],
            [
                'title' => 'Construction - Refinery Compressor Installation',
                'slug' => 'construction-refinery-compressor-installation',
                'description' => 'Construction and installation of compressor systems for a new oil refinery. The project involved civil works, mechanical installation, and electrical systems.',
                'client' => 'Abadan Refinery Company',
                'location' => 'Abadan, Iran',
                'completion_date' => '2023-05-20',
                'category_id' => 7, // Construction
                'image' => 'portfolios/construction-1.jpg',
                'status' => 'active',
                'featured' => false,
                'order' => 7
            ],
            [
                'title' => 'Maintenance Services - Chemical Plant',
                'slug' => 'maintenance-services-chemical-plant',
                'description' => 'Ongoing maintenance services for compressor systems in a chemical manufacturing plant. Services include regular inspections, preventive maintenance, and emergency repairs.',
                'client' => 'Shahid Tondgouyan Petrochemical Company',
                'location' => 'Bandar Imam, Iran',
                'completion_date' => '2023-04-15',
                'category_id' => 8, // Maintenance
                'image' => 'portfolios/maintenance-1.jpg',
                'status' => 'active',
                'featured' => false,
                'order' => 8
            ],
            [
                'title' => 'Installation - Cement Plant Compressor System',
                'slug' => 'installation-cement-plant-compressor-system',
                'description' => 'Installation of a new compressed air system for a cement manufacturing plant. The system includes multiple compressors with advanced filtration and drying systems.',
                'client' => 'Fars Cement Company',
                'location' => 'Fars, Iran',
                'completion_date' => '2023-03-10',
                'category_id' => 9, // Installation
                'image' => 'portfolios/installation-1.jpg',
                'status' => 'active',
                'featured' => false,
                'order' => 9
            ],
            [
                'title' => 'Service Contract - Textile Industry',
                'slug' => 'service-contract-textile-industry',
                'description' => 'Comprehensive service contract for compressor systems in the textile industry. The contract includes maintenance, repairs, spare parts, and technical support.',
                'client' => 'Yazd Textile Industries',
                'location' => 'Yazd, Iran',
                'completion_date' => '2023-02-28',
                'category_id' => 10, // Service
                'image' => 'portfolios/service-1.jpg',
                'status' => 'active',
                'featured' => false,
                'order' => 10
            ],
            [
                'title' => 'Consulting - Energy Efficiency Project',
                'slug' => 'consulting-energy-efficiency-project',
                'description' => 'Energy efficiency consulting for industrial compressor systems. The project included energy audits, system optimization recommendations, and implementation guidance.',
                'client' => 'Iran Energy Efficiency Organization',
                'location' => 'Tehran, Iran',
                'completion_date' => '2023-01-15',
                'category_id' => 11, // Consulting
                'image' => 'portfolios/consulting-1.jpg',
                'status' => 'active',
                'featured' => false,
                'order' => 11
            ],
            [
                'title' => 'Training Program - Compressor Operations',
                'slug' => 'training-program-compressor-operations',
                'description' => 'Comprehensive training program for compressor operators and maintenance personnel. The program covered safety, operation, maintenance, and troubleshooting.',
                'client' => 'National Iranian Oil Company',
                'location' => 'Tehran, Iran',
                'completion_date' => '2022-12-20',
                'category_id' => 12, // Training
                'image' => 'portfolios/training-1.jpg',
                'status' => 'active',
                'featured' => false,
                'order' => 12
            ]
        ];

        foreach ($portfolios as $portfolio) {
            Portfolio::create($portfolio);
        }
    }
}
