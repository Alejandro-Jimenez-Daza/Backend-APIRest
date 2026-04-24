<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{

    protected $table = 'revisiones'; // ← fuerza el nombre de la tabla
    
    protected $fillable = [
        'carro_id', //parece que si ponen ids de foraneas
        'fecha_revision',
        'tipo_mecanica',
        'costo',
        'observaciones',
    ];

    public function carro(){ //el metodo se nombra con carro, no se nombra a a si mismo
        return $this->belongsTo(Carro::class);
    }
}
