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
        Schema::create('formas_acesso', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curso_id')->constrained(
                table: 'curso'
            )->onDelete("cascade");
            $table->string('forma_acesso');
            $table->float('porcentagem_vagas', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formas_acesso');
    }
};
