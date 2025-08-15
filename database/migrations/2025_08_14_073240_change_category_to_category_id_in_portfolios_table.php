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
        Schema::table('portfolios', function (Blueprint $table) {
            // Add new category_id column
            $table->unsignedBigInteger('category_id')->nullable()->after('category');

            // Add foreign key constraint
            $table->foreign('category_id')->references('id')->on('portfolio_categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('portfolios', function (Blueprint $table) {
            // Drop foreign key constraint
            $table->dropForeign(['category_id']);

            // Drop category_id column
            $table->dropColumn('category_id');
        });
    }
};
