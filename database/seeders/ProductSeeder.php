<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all();

        $products = [
            [
                'name' => 'Industrial Air Compressor KTX-1000',
                'slug' => 'industrial-air-compressor-ktx-1000',
                'description' => 'High-performance industrial air compressor with advanced technology for heavy-duty applications.',
                'short_description' => 'Advanced industrial air compressor for heavy-duty applications.',
                'specifications' => [
                    'Power' => '1000 HP',
                    'Pressure' => '350 PSI',
                    'Flow Rate' => '5000 CFM',
                    'Weight' => '5000 kg'
                ],
                'features' => [
                    'Energy efficient',
                    'Low maintenance',
                    'Advanced control system',
                    'Remote monitoring'
                ],
                'category_id' => $categories->first()->id,
                'image' => 'img/products/ktx-1000.jpg',
                'gallery' => [
                    'img/products/ktx-1000-1.jpg',
                    'img/products/ktx-1000-2.jpg',
                    'img/products/ktx-1000-3.jpg'
                ],
                'video_url' => 'https://www.youtube.com/watch?v=sample1',
                'status' => 'active',
                'featured' => true,
                'order' => 1
            ],
            [
                'name' => 'Oil-Free Compressor KTX-500',
                'slug' => 'oil-free-compressor-ktx-500',
                'description' => 'Oil-free compressor designed for clean air applications in pharmaceutical and food industries.',
                'short_description' => 'Oil-free compressor for clean air applications.',
                'specifications' => [
                    'Power' => '500 HP',
                    'Pressure' => '200 PSI',
                    'Flow Rate' => '2500 CFM',
                    'Weight' => '3000 kg'
                ],
                'features' => [
                    '100% oil-free',
                    'Class 0 certified',
                    'Silent operation',
                    'Easy maintenance'
                ],
                'category_id' => $categories->first()->id,
                'image' => 'img/products/ktx-500.jpg',
                'gallery' => [
                    'img/products/ktx-500-1.jpg',
                    'img/products/ktx-500-2.jpg'
                ],
                'video_url' => 'https://www.youtube.com/watch?v=sample2',
                'status' => 'active',
                'featured' => true,
                'order' => 2
            ],
            [
                'name' => 'Screw Compressor KTX-750',
                'slug' => 'screw-compressor-ktx-750',
                'description' => 'Reliable screw compressor with high efficiency and low energy consumption.',
                'short_description' => 'Reliable screw compressor with high efficiency.',
                'specifications' => [
                    'Power' => '750 HP',
                    'Pressure' => '150 PSI',
                    'Flow Rate' => '3500 CFM',
                    'Weight' => '4000 kg'
                ],
                'features' => [
                    'High efficiency',
                    'Low energy consumption',
                    'Durable construction',
                    'Smart controls'
                ],
                'category_id' => $categories->first()->id,
                'image' => 'img/products/ktx-750.jpg',
                'gallery' => [
                    'img/products/ktx-750-1.jpg',
                    'img/products/ktx-750-2.jpg'
                ],
                'video_url' => null,
                'status' => 'active',
                'featured' => false,
                'order' => 3
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
