<?php

namespace App\Http\Controllers;

use App\Models\Propietario;
use Illuminate\Http\Request;

class PropietarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $propietarios = Propietario::all();
        return response()->json($propietarios);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // NADA ACA
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cedula'         => 'required|integer',
            'nombre_completo'       => 'required', //cambia esto al hacer una relacion
            //                                  ↑tabla              ↑columna, valida que el id sea real.
            'correo'             => 'required|email|max:255',
            'direccion'        => 'required|string',
            'fecha_nacimiento'        => 'required|date',
        ]);

        $propietario = Propietario::create($request->all());
        //respondo al usuario con el carro recien creado
        return response()->json($propietario, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Propietario $propietario)
    {
        return response()->json($propietario);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Propietario $propietario)
    {
        // NADA ACA
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Propietario $propietario)
    {
            $request->validate([
            'cedula'         => 'required|integer',
            'nombre_completo'       => 'required', //cambia esto al hacer una relacion
            //                                  ↑tabla              ↑columna, valida que el id sea real.
            'correo'             => 'required|email|max:255',
            'direccion'        => 'required|string',
            'fecha_nacimiento'        => 'required|date',
        ]);

        //4.le pasamos al encargado CARRO los datos y guardamos en la bd
        $propietario -> update($request->all());
        //respondo al usuario con el carro recien creado
        return response()->json($propietario, 200);

        //la flecha -> es accede a algo o haz algo.
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Propietario $propietario)
    {
        $propietario->delete();
        return response()->json(['mensaje' => 'Producto eliminado'], 200);
    }
}


/*

CódigoSignificaCuándo usarlo
200OKGET, PUT/PATCH, DELETE — operación exitosa
201CreatedPOST — recurso recién creado
204No Content
*/
