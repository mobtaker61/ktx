<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teams = [
            [
                'name' => 'John Smith',
                'position' => 'Founder & CEO',
                'bio' => 'John Smith is the visionary founder and CEO of KTX Nova Compressor Group. With over 20 years of experience in the industrial compressor industry, he leads our company with innovative strategies and deep technical expertise.',
                'image' => 'team/team-1.jpg',
                'email' => 'john.smith@ktx.com',
                'phone' => '+971 50 123 4567',
                'linkedin' => 'https://linkedin.com/in/johnsmith',
                'twitter' => 'https://twitter.com/johnsmith',
                'facebook' => 'https://facebook.com/johnsmith',
                'status' => 'active',
                'level' => 1,
                'order' => 1
            ],
            [
                'name' => 'Sarah Johnson',
                'position' => 'Technical Director',
                'bio' => 'Sarah Johnson serves as our Technical Director, bringing extensive engineering knowledge and innovative thinking to our compressor solutions. She ensures all our products meet the highest technical standards.',
                'image' => 'team/team-2.jpg',
                'email' => 'sarah.johnson@ktx.com',
                'phone' => '+971 50 123 4567',
                'linkedin' => 'https://linkedin.com/in/sarahjohnson',
                'twitter' => 'https://twitter.com/sarahjohnson',
                'facebook' => 'https://facebook.com/sarahjohnson',
                'status' => 'active',
                'level' => 2,
                'order' => 1
            ],
            [
                'name' => 'Mike Wilson',
                'position' => 'Engineering Manager',
                'bio' => 'Mike Wilson leads our engineering team as Engineering Manager, overseeing the design and development of cutting-edge compressor technologies. His expertise drives our product innovation forward.',
                'image' => 'team/team-3.jpg',
                'email' => 'mike.wilson@ktx.com',
                'phone' => '+971 50 123 4567',
                'linkedin' => 'https://linkedin.com/in/mikewilson',
                'twitter' => 'https://twitter.com/mikewilson',
                'facebook' => 'https://facebook.com/mikewilson',
                'status' => 'active',
                'level' => 2,
                'order' => 2
            ],
            [
                'name' => 'Emily Davis',
                'position' => 'Service Manager',
                'bio' => 'Emily Davis manages our service operations, ensuring exceptional customer support and maintenance services. She leads our commitment to providing 24/7 technical support and after-sales service excellence.',
                'image' => 'team/team-4.jpg',
                'email' => 'emily.davis@ktx.com',
                'phone' => '+971 50 123 4567',
                'linkedin' => 'https://linkedin.com/in/emilydavis',
                'twitter' => 'https://twitter.com/emilydavis',
                'facebook' => 'https://facebook.com/emilydavis',
                'status' => 'active',
                'level' => 3,
                'order' => 1
            ]
        ];

        foreach ($teams as $team) {
            Team::create($team);
        }
    }
}
