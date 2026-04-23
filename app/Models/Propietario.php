<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
    protected $fillable = [
        'ceudula',
        'nombre_completo',
        'correo',
        'direccion',
        'fecha_nacimiento',
    ];

    /*
    En el Model — la regla es simple:
El hijo (Carro) usa belongsTo — "pertenezco a un propietario"
El padre (Propietario) usa hasMany — "tengo muchos carros"*/

// Un propietario tiene muchos carros
    public function carros()
    {
        return $this->hasMany(Carro::class);
    }
}
