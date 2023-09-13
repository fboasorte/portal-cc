<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('professor', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
        });

        DB::table('professor')->insert(
            array(
                'nome' => 'Alberto'
            )
        );

        DB::table('professor')->insert(
            array(
                'nome' => 'Lucio'
            )
        );

        DB::table('professor')->insert(
            array(
                'nome' => 'Caribe'
            )
        );

        DB::table('professor')->insert(
            array(
                'nome' => 'Fatima'
            )
        );

        DB::table('professor')->insert(
            array(
                'nome' => 'Luciana'
            )
        );

        DB::table('professor')->insert(
            array(
                'nome' => 'Tadeu'
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professor');
    }
};
