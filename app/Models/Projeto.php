<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    use HasFactory;
    /* ADD:
        resultados: imagens, text
        dos alunos saber se é bolsista ou voluntário
        professores como colaboradores/participantes (Pode ser externos tmb)
        fomento
        link do projeto pág web (saiba mais)
    */

    protected $table = 'projeto';

    public $timestamps = false;

    protected $fillable = [
        'titulo',
        'descricao',
        'resultados',
        'data_inicio',
        'data_termino',
        'palavras_chave',
        'professor_id',
        'fomento',
        'link',
    ];

    public function alunos()
    {
        return $this->belongsToMany(Aluno::class, 'alunos_projetos', 'projeto_id', 'aluno_id');
    }

    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }

    public function professoresColaboradores()
    {
        return $this->belongsToMany(
            Professor::class,
            'professores_colaboradores_projeto',
            'projeto_id',
            'professor_id'
        );
    }

    public function professoresExternos()
    {
        return $this->belongsToMany(
            ProfessorExterno::class,
            'professores_externos_projeto',
            'projeto_id',
            'professor_externo_id'
        );
    }
}
