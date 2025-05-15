<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::table('admission_requirements', function (Blueprint $table) {
            $table->string('pdf')->change(); 
        });
    }

   
    public function down(): void
    {
        Schema::table('admission_requirements', function (Blueprint $table) {
            $table->float('pdf')->change(); 
        });
    }
};
