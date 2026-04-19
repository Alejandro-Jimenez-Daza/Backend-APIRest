<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    // equivalente mas o menos a pdo
    protected $fillable = [
        'matricula',
        'propietario',
        'marca',
        'cilindraje',
        'disponible',

    ];
}
