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
        Schema::create('admission_requirements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('university_id');
            $table->integer('program_id');
            $table->integer('department_id');
            $table->integer('subject_id');
            $table->float('gpa');
            $table->float('gre');
            $table->float('toefl');
            $table->float('ielts');
            $table->float('pte');
            $table->float('det');
            $table->float('pdf');
            $table->enum('status', ['ACTIVE', 'INACTIVE'])->default('ACTIVE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admission_requirements');
    }
};
