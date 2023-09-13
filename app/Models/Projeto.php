<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    use HasFactory;

    protected $table = 'projeto';

    public $timestamps = false;
    
    protected $fillable = [
        'descricao',
        'resultados',
        'data_inicio',
        'data_termino',
        'palavras_chave',
        'professor_id'
    ];

    public function alunos(){
        return $this->hasMany(Aluno::class);
    }

    public function professor(){
        return $this->belongsTo(Professor::class);
    }
}
