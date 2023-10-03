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
        Schema::table('calendario', function (Blueprint $table) {
            $table->dropColumn('arquivo');
            $table->dropColumn('horario');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('calendario', function (Blueprint $table) {
            $table->string('arquivo');
            $table->string('horario');
        });
    }
};
