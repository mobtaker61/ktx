<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('job_applications', function (Blueprint $table) {
            // Drop old columns
            $table->dropColumn(['full_name', 'status']);

            // Add new columns
            $table->string('first_name')->after('career_opportunity_id');
            $table->string('last_name')->after('first_name');
            $table->string('phone_code', 10)->after('email');
            $table->boolean('is_reviewed')->default(false)->after('resume_path');
            $table->boolean('is_shortlisted')->default(false)->after('is_reviewed');
            $table->boolean('is_rejected')->default(false)->after('is_shortlisted');

            // Update gender enum to include 'both'
            $table->enum('gender', ['male', 'female', 'both'])->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_applications', function (Blueprint $table) {
            // Revert changes
            $table->dropColumn(['first_name', 'last_name', 'phone_code', 'is_reviewed', 'is_shortlisted', 'is_rejected']);
            $table->string('full_name')->after('career_opportunity_id');
            $table->enum('status', ['pending', 'reviewed', 'shortlisted', 'rejected'])->default('pending')->after('resume_path');
            $table->enum('gender', ['male', 'female'])->change();
        });
    }
};
