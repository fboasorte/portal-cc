<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model {
    protected $table = 'aluno';

    public $timestamps = false;

    protected $fillable = [
        'nome'
    ];
}
