<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Professor extends Model
{
    protected $table = 'professor';

    protected $fillable = [
        'titulacao',
        'curriculo',
        'biografia',
        'servidor_id',
        'foto',
    ];

    public function tccs() {
        return $this->hasMany(Tcc::class, 'professor_id', 'id');
    }

    public function bancas() {
        return $this->BelongsToMany(Banca::class, 'banca_professor', 'professor_id', 'banca_id');
    }
}
