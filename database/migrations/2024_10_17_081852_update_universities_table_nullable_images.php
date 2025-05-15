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
        Schema::table('universities', function (Blueprint $table) {
            $table->string('logo')->nullable()->change(); // Make logo nullable
            $table->string('featured_image')->nullable()->change(); // Make featured_image nullable
            $table->string('banner_image')->nullable()->change(); // Make banner_image nullable
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('universities', function (Blueprint $table) {
            $table->string('logo')->nullable(false)->change(); // Revert to not nullable
            $table->string('featured_image')->nullable(false)->change(); // Revert to not nullable
            $table->string('banner_image')->nullable(false)->change(); // Revert to not nullable
        });
    }
};
