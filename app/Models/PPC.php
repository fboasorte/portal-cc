<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PPC extends Model{
    protected $table = 'ppc';

    protected $fillable = [
        'periodo',
        'status',
    ];

} 