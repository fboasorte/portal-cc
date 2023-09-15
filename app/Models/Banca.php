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
        $this->belongsTo('App\Models\ProfessorExterno');
    }
}
