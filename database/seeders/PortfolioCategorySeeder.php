<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PortfolioCategory;
use Illuminate\Support\Str;

class PortfolioCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Nuclear Power',
                'slug' => 'nuclear-power-industry',
                'description' => 'Nuclear power industry projects including manufacturing, processing, and heavy machinery installations.',
                'icon' => 'industry',
                'color' => '#0d6efd',
                'order' => 1,
                'status' => 'active'
            ],
            [
                'name' => 'Oil & Gas, Petrochemical',
                'slug' => 'oil-gas-petrochemical-industry',
                'description' => 'Oil and gas industry projects including refineries and pipeline systems.',
                'icon' => 'oil-can',
                'color' => '#6f42c1',
                'order' => 2,
                'status' => 'active'
            ],
            [
                'name' => 'Food & Pharmaceutical',
                'slug' => 'food-pharmaceutical-industry',
                'description' => 'Food and pharmaceutical industry projects including manufacturing, processing, and heavy machinery installations.',
                'icon' => 'flask',
                'color' => '#fd7e14',
                'order' => 3,
                'status' => 'active'
            ],
            [
                'name' => 'Power Generation',
                'slug' => 'power-generation-industry',
                'description' => 'Power generation industry projects including manufacturing, processing, and heavy machinery installations.',
                'icon' => 'compress-arrows-alt',
                'color' => '#20c997',
                'order' => 4,
                'status' => 'active'
            ],
            [
                'name' => 'Aerospace Science',
                'slug' => 'aerospace-science-industry',
                'description' => 'Aerospace science industry projects including manufacturing, processing, and heavy machinery installations.',
                'icon' => 'wrench',
                'color' => '#dc3545',
                'order' => 5,
                'status' => 'active'
            ],
            [
                'name' => 'Construction',
                'slug' => 'construction-industry',
                'description' => 'Construction industry projects including manufacturing, processing, and heavy machinery installations.',
                'icon' => 'hard-hat',
                'color' => '#ffc107',
                'order' => 6,
                'status' => 'active'
            ],
            [
                'name' => 'Industrial',
                'slug' => 'industrial-industry',
                'description' => 'Industrial industry projects including manufacturing, processing, and heavy machinery installations.',
                'icon' => 'tools',
                'color' => '#6c757d',
                'order' => 7,
                'status' => 'active'
            ],
            [
                'name' => 'Service',
                'slug' => 'service',
                'description' => 'Service contracts and ongoing support projects.',
                'icon' => 'headset',
                'color' => '#17a2b8',
                'order' => 8,
                'status' => 'active'
            ]
        ];

        foreach ($categories as $category) {
            PortfolioCategory::create($category);
        }
    }
}
