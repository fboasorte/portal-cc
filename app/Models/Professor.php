<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $table = 'professor';

    public $timestamps = false;

    protected $fillable = [
        'nome',
    ];

    public function projetos(){
        return $this->hasMany(Projeto::class);
    }
}
