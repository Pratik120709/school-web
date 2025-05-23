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
        Schema::table('admission_requirements', function (Blueprint $table) {
            $table->string('subject_id', 255)->change();
        });
    }


    public function down(): void
    {
        Schema::table('admission_requirements', function (Blueprint $table) {
            $table->integer('subject_id')->change();
        });
    }
};
