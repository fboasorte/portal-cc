<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArquivoCalendario extends Model
{

    use HasFactory;

    protected $table = 'arquivo_calendario';

    protected $fillable =[

        'path',
        'curso_id',
    ];

    public function calendario(){
        return $this->belongsTo(Curso::class);
    }

}
