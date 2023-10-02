<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('curso', function (Blueprint $table) {
            $table->string('nome')->unique();
            $table->string('turno');
            $table->integer('carga_horaria');
            $table->string('sigla')->unique();
            $table->string('analytics')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('curso', function (Blueprint $table) {
            $table->dropColumn('nome');
            $table->dropColumn('turno');
            $table->dropColumn('carga_horaria');
            $table->dropColumn('sigla');
            $table->dropColumn('analytics');
        });
    }

};
