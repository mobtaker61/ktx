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
            'title' => 'Senior Chemical Engineer',
            'description' => 'We are seeking an experienced Chemical Engineer to join our Research & Development team. This position involves working on innovative projects in petrochemicals and developing new processes.',
            'location' => 'Dubai, UAE',
            'gender' => 'both',
            'department' => 'Research & Development',
            'experience_level' => '5-8 years',
            'employment_type' => 'full-time',
            'salary_min' => 15000,
            'salary_max' => 25000,
            'expiry_date' => now()->addMonths(2),
            'is_active' => true,
            'requirements' => "• Master's degree in Chemical Engineering\n• Minimum 5 years experience in petrochemical industry\n• Proficiency in process simulation software\n• Strong problem-solving and teamwork skills\n• Fluent in English",
            'benefits' => "• Comprehensive health insurance\n• 30 days annual leave\n• Professional development programs\n• Dynamic and innovative work environment"
        ]);

        CareerOpportunity::create([
            'title' => 'International Sales Manager',
            'description' => 'Seeking an experienced Sales Manager to expand our presence in international markets. This position involves developing sales strategies, managing key client relationships, and achieving sales targets.',
            'location' => 'Dubai, UAE',
            'gender' => 'both',
            'department' => 'Sales & Marketing',
            'experience_level' => '3-5 years',
            'employment_type' => 'full-time',
            'salary_min' => 12000,
            'salary_max' => 20000,
            'expiry_date' => now()->addMonths(1),
            'is_active' => true,
            'requirements' => "• Bachelor's degree in Business or Engineering\n• Minimum 3 years experience in international sales\n• Excellent negotiation and communication skills\n• Fluent in English and Arabic\n• Experience in petrochemical industry is a plus",
            'benefits' => "• Sales commission\n• Health and life insurance\n• 25 days annual leave\n• International travel opportunities"
        ]);

        CareerOpportunity::create([
            'title' => 'Quality Control Technician',
            'description' => 'Seeking a detail-oriented Quality Control Technician to ensure the quality of our products. This position involves conducting quality control tests, documenting results, and collaborating with the production team.',
            'location' => 'Dubai, UAE',
            'gender' => 'both',
            'department' => 'Quality Control',
            'experience_level' => '2-4 years',
            'employment_type' => 'full-time',
            'salary_min' => 8000,
            'salary_max' => 12000,
            'expiry_date' => now()->addMonths(3),
            'is_active' => true,
            'requirements' => "• Bachelor's degree in Chemistry or Chemical Engineering\n• Minimum 2 years experience in quality control\n• Familiarity with ISO standards\n• Strong analytical skills\n• Attention to detail and accuracy",
            'benefits' => "• Health insurance\n• 20 days annual leave\n• Training programs\n• Safe and hygienic work environment"
        ]);
    }
}
