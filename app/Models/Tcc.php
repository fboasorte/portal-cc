<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tcc extends Model
{
    protected $table = 'tcc';



    protected $fillable = [
        'titulo', 'resumo', 'link', 'ano', 'aluno_id', 'banca_id'
    ];

    public function aluno() {
        return $this->hasOne(Aluno::class, 'id', 'aluno_id');
    }

    public function banca() {
        return $this->hasOne(Banca::class, 'id', 'banca_id');
    }
}
