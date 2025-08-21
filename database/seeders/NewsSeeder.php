<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $news = [
            [
                'title' => 'KTX Launches New Industrial Compressor Series',
                'content' => '<p>KTX is proud to announce the launch of our new industrial compressor series, designed specifically for heavy-duty applications in manufacturing and processing industries.</p>

                <p>This new series features:</p>
                <ul>
                    <li>Advanced energy efficiency technology</li>
                    <li>Reduced maintenance requirements</li>
                    <li>Enhanced performance monitoring</li>
                    <li>Environmentally friendly operation</li>
                </ul>

                <p>The new compressors are now available for order and will begin shipping next month. Contact our sales team for more information and pricing details.</p>',
                'excerpt' => 'KTX announces the launch of a new industrial compressor series designed for heavy-duty applications with advanced energy efficiency technology.',
                'author' => 'KTX Engineering Team',
                'status' => 'published',
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Energy Efficiency Standards in Industrial Compressors',
                'content' => '<p>As industries worldwide focus on sustainability and reducing energy consumption, KTX is leading the way in developing energy-efficient compressor solutions.</p>

                <p>Our latest research shows that modern industrial compressors can achieve up to 30% energy savings compared to traditional models. This not only reduces operational costs but also helps companies meet their environmental goals.</p>

                <p>Key factors contributing to energy efficiency include:</p>
                <ul>
                    <li>Variable speed drive technology</li>
                    <li>Advanced control systems</li>
                    <li>Heat recovery systems</li>
                    <li>Optimized air flow design</li>
                </ul>

                <p>KTX continues to invest in research and development to push the boundaries of what\'s possible in compressor efficiency.</p>',
                'excerpt' => 'KTX explores the latest developments in energy efficiency standards for industrial compressors and their impact on operational costs and sustainability.',
                'author' => 'KTX Research Department',
                'status' => 'published',
                'published_at' => now()->subDays(12),
            ],
            [
                'title' => 'Maintenance Tips for Industrial Compressors',
                'content' => '<p>Proper maintenance is crucial for ensuring the longevity and optimal performance of industrial compressors. KTX experts share their top maintenance tips based on decades of experience.</p>

                <p><strong>Regular Inspection Schedule:</strong></p>
                <ul>
                    <li>Daily: Check oil levels and air filters</li>
                    <li>Weekly: Inspect belts and hoses</li>
                    <li>Monthly: Clean air filters and check for leaks</li>
                    <li>Quarterly: Professional inspection and oil analysis</li>
                </ul>

                <p><strong>Common Issues to Watch For:</strong></p>
                <ul>
                    <li>Unusual noises or vibrations</li>
                    <li>Increased energy consumption</li>
                    <li>Reduced air output</li>
                    <li>Oil leaks or contamination</li>
                </ul>

                <p>Following these maintenance guidelines can extend the life of your compressor by 20-30% and prevent costly breakdowns.</p>',
                'excerpt' => 'KTX experts share essential maintenance tips for industrial compressors to ensure optimal performance and extend equipment lifespan.',
                'author' => 'KTX Service Team',
                'status' => 'published',
                'published_at' => now()->subDays(20),
            ],
        ];

        foreach ($news as $article) {
            $article['slug'] = Str::slug($article['title']);
            News::create($article);
        }
    }
}
