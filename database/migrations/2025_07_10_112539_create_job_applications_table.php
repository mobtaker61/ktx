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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('career_opportunity_id');
            $table->string('full_name');
            $table->enum('gender', ['male', 'female']);
            $table->string('email');
            $table->string('phone');
            $table->text('cover_letter');
            $table->string('nationality')->nullable();
            $table->string('current_location')->nullable();
            $table->string('experience_years')->nullable();
            $table->string('resume_path');
            $table->string('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->enum('status', ['pending', 'reviewed', 'shortlisted', 'rejected'])->default('pending');
            $table->timestamps();

            $table->foreign('career_opportunity_id')
                ->references('id')->on('career_opportunities')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
