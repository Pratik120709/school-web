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
        Schema::create('universities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('website');
            $table->bigInteger('phone')->unique();
            $table->string('email');
            $table->integer('country_id');
            $table->integer('state_id');
            $table->text('address');
            $table->boolean('is_featured')->default(false);
            $table->decimal('fees', 10, 2);
            $table->string('level');
            $table->string('ranking');
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->string('logo');
            $table->string('featured_image');
            $table->string('banner_image');
            $table->longText('description');
            $table->enum('status', ['ACTIVE', 'INACTIVE'])->default('ACTIVE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universities');
    }
};
