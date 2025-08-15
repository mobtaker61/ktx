<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Industrial Compressors',
                'slug' => 'industrial-compressors',
                'description' => 'High-performance industrial compressors for heavy-duty applications.',
                'status' => 'active',
                'order' => 1
            ],
            [
                'name' => 'Oil-Free Compressors',
                'slug' => 'oil-free-compressors',
                'description' => 'Oil-free compressors for clean air applications.',
                'status' => 'active',
                'order' => 2
            ],
            [
                'name' => 'Screw Compressors',
                'slug' => 'screw-compressors',
                'description' => 'Reliable screw compressors with high efficiency.',
                'status' => 'active',
                'order' => 3
            ],
            [
                'name' => 'Reciprocating Compressors',
                'slug' => 'reciprocating-compressors',
                'description' => 'Traditional reciprocating compressors for various applications.',
                'status' => 'active',
                'order' => 4
            ],
            [
                'name' => 'Centrifugal Compressors',
                'slug' => 'centrifugal-compressors',
                'description' => 'High-speed centrifugal compressors for large applications.',
                'status' => 'active',
                'order' => 5
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
