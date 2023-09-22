<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model{
    protected $table = 'curso';

    protected $fillable = [
        'turno',
        'nome',
        'carga_horaria',
        'sigla',

    ];


}
