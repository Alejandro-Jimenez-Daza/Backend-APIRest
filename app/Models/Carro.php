<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    // equivalente mas o menos a pdo
    protected $fillable = [
        'matricula',
        'propietario_id',
        'marca',
        'cilindraje',
        'disponible',

    ];

    //relacion: un carro pertenece a 1 propietario
    public function propietario(){
        return $this->belongsTo(Propietario::class);
    }
}
