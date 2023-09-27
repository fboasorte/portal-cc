<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArquivoHorario extends Model
{

    use HasFactory;

    protected $table = 'arquivo_horario';

    protected $fillable = [

        'path',
        'calendario_id',

    ];

    public function horario(){
        return $this belongsTo(Calendario::class);
    }

}