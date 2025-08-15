<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CareerOpportunity;

class CareerOpportunitySeeder extends Seeder
{
    public function run(): void
    {
        CareerOpportunity::create([
            'title' => 'Senior Mechanical Engineer - Compressor Systems',
            'description' => 'We are seeking an experienced Mechanical Engineer to join our Engineering team. This position involves designing and optimizing industrial compressor systems, conducting performance analysis, and providing technical support for our global clients.',
            'location' => 'Dubai, UAE',
            'gender' => 'both',
            'department' => 'Engineering',
            'experience_level' => '5-8 years',
            'employment_type' => 'full-time',
            'salary_min' => 18000,
            'salary_max' => 28000,
            'expiry_date' => now()->addMonths(2),
            'is_active' => true,
            'requirements' => "• Master's degree in Mechanical Engineering\n• Minimum 5 years experience in industrial compressor systems\n• Proficiency in CAD software and engineering analysis tools\n• Strong problem-solving and project management skills\n• Experience in oil & gas or petrochemical industry\n• Fluent in English",
            'benefits' => "• Comprehensive health insurance\n• 30 days annual leave\n• Professional development programs\n• International project opportunities\n• Dynamic and innovative work environment"
        ]);

        CareerOpportunity::create([
            'title' => 'International Sales Manager - Industrial Equipment',
            'description' => 'Seeking an experienced Sales Manager to expand our presence in international markets for industrial compressors. This position involves developing sales strategies, managing key client relationships, and achieving sales targets in the industrial equipment sector.',
            'location' => 'Dubai, UAE',
            'gender' => 'both',
            'department' => 'Sales & Marketing',
            'experience_level' => '3-5 years',
            'employment_type' => 'full-time',
            'salary_min' => 15000,
            'salary_max' => 25000,
            'expiry_date' => now()->addMonths(1),
            'is_active' => true,
            'requirements' => "• Bachelor's degree in Business or Engineering\n• Minimum 3 years experience in industrial equipment sales\n• Excellent negotiation and communication skills\n• Experience in compressor or industrial equipment industry\n• Fluent in English and Arabic\n• Willingness to travel internationally",
            'benefits' => "• Sales commission and performance bonuses\n• Health and life insurance\n• 25 days annual leave\n• International travel opportunities\n• Company car and mobile phone"
        ]);

        CareerOpportunity::create([
            'title' => 'Quality Control Engineer - Compressor Manufacturing',
            'description' => 'Seeking a detail-oriented Quality Control Engineer to ensure the quality of our industrial compressor products. This position involves developing quality control procedures, conducting inspections, and maintaining ISO standards.',
            'location' => 'Dubai, UAE',
            'gender' => 'both',
            'department' => 'Quality Control',
            'experience_level' => '2-4 years',
            'employment_type' => 'full-time',
            'salary_min' => 10000,
            'salary_max' => 15000,
            'expiry_date' => now()->addMonths(3),
            'is_active' => true,
            'requirements' => "• Bachelor's degree in Mechanical Engineering or related field\n• Minimum 2 years experience in quality control\n• Familiarity with ISO 9001 and manufacturing standards\n• Strong analytical and problem-solving skills\n• Attention to detail and accuracy\n• Experience in heavy machinery manufacturing",
            'benefits' => "• Health insurance\n• 20 days annual leave\n• Training programs\n• Safe and hygienic work environment\n• Performance bonuses"
        ]);

        CareerOpportunity::create([
            'title' => 'Service Engineer - Field Operations',
            'description' => 'We are looking for a Service Engineer to provide on-site technical support and maintenance services for our industrial compressor installations worldwide. This role involves troubleshooting, preventive maintenance, and customer training.',
            'location' => 'Dubai, UAE',
            'gender' => 'both',
            'department' => 'Service & Support',
            'experience_level' => '3-5 years',
            'employment_type' => 'full-time',
            'salary_min' => 12000,
            'salary_max' => 18000,
            'expiry_date' => now()->addMonths(4),
            'is_active' => true,
            'requirements' => "• Bachelor's degree in Mechanical or Electrical Engineering\n• Minimum 3 years experience in industrial equipment service\n• Strong technical troubleshooting skills\n• Experience with compressor systems\n• Willingness to travel internationally\n• Excellent communication and customer service skills\n• Fluent in English",
            'benefits' => "• Health and travel insurance\n• 25 days annual leave\n• International travel allowances\n• Company vehicle and tools\n• Professional development programs"
        ]);
    }
}
