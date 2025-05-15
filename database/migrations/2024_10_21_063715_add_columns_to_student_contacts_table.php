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
        Schema::table('student_contacts', function (Blueprint $table) {
            $table->bigInteger('program_id')->after('phone');
            $table->string('department_ids')->nullable()->after('program_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_contacts', function (Blueprint $table) {
            $table->dropColumn('program_id');
            $table->dropColumn('department_ids');
        });
    }
};
