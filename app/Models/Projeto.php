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
        return $this->belongsToMany(Projeto::class, 'alunos_projetos', 'aluno_id', 'projeto_id');
    }

    public function professor(){
        return $this->belongsTo(Professor::class);
    }
}
