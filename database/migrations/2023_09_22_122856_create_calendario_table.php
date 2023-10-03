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
        Schema::create('calendario', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curso_id')->constrained(
                table: 'curso'
            )->onDelete("cascade");
            $table->string('arquivo')->nullable();
            $table->string('horario')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendario');
    }
};
