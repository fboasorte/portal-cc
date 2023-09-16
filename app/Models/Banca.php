<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banca extends Model
{
    protected $table = 'banca';

    protected $fillable = [
        'data', 'local'
    ];

    public function professoresExternos() {
        return $this->belongsToMany(ProfessorExterno::class, 'banca_professor_externo', 'banca_id', 'professor_externo_id');
    }
}
