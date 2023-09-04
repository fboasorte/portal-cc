<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Postagem extends Model {

    protected $table = 'postagem';
    
    protected $fillable = [
        'titulo',
        'texto',
        'tipo_postagem_id',
        'imagem',
        'arquivo'
    ];
}