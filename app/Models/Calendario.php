<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendario extends Model
{

    protected $table = 'calendario';

    protected $fillable = [
        'curso_id',
    ];

    public function horario(){
        return $this->hasOne(ArquivoHorario::class);
    }

    public function calendario(){
        return $this->hasOne(ArquivoCalendario::class);
    }

}