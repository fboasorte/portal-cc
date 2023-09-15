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
        Schema::create('professor_externo_banca', function (Blueprint $table) {
            $table->foreignId('professor_externo_id')
            ->references('id')->on('professor_externo')
            ->onDelete('CASCADE')
            ->onUpdate('CASCADE')
            ->constrained();

            $table->foreignId('banca_id')
            ->references('id')->on('banca')
            ->onDelete('CASCADE')
            ->onUpdate('CASCADE')
            ->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professor_externo_banca');
    }
};
