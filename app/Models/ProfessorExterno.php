<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessorExterno extends Model
{
    protected $table = 'professor_externo';

    protected $fillable =[
        'nome', 'filiacao'
    ];

    public function bancas() {
        return $this->belongsTo('App\Models\Banca');
    }
}
