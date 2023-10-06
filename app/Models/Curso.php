<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model{
    protected $table = 'curso';

    protected $fillable = [
        'nome',
        'turno',
        'carga_horaria',
        'sigla',
        'analytics',
        'calendario',
        'horario',
    ];

}
