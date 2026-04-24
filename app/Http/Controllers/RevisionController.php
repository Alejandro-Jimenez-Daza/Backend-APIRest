<?php

namespace App\Http\Controllers;

use App\Models\Revision;
use Illuminate\Http\Request;

class RevisionController extends Controller
{

    public function index()
    {
        // muestra tabla
        // get api productos devuelve todos los productos, CArro viene de la clase del modelo
        // with('propietario') trae los datos del propietario en la misma consulta
        $revisiones = Revision::with('carro')->get();
        return response()->json($revisiones);


    }

    public function create()
    {}

    public function store(Request $request)
    {
         //recibe los datos y vue crea un carro, aca validamos
        $request->validate([

            'carro_id'              => 'required|exists:carros,id', //cambia esto al hacer una relacion
            //                                  ↑tabla              ↑columna, valida que el id sea real.
            'fecha_revision'        => 'required|date',
            'tipo_mecanica'         => 'required|string|max:9',
            'costo'                 => 'required|numeric|min:0',
            'observaciones'         => 'nullable|string|max:255',
        ]);

        // // antes de crear, forzamos que disponible sea true o false
        // $request->merge([
        //     'disponible' => $request->has('disponible'),
        // ]);

        //4.le pasamos al encargado CARRO los datos y guardamos en la bd
        $revision = Revision::create($request->all());
        //respondo al usuario con el carro recien creado
        return response()->json($revision->load('carro'), 201);
    }


    public function show(Revision $revision)
    {
        return response()->json($revision->load('carro'));
    }


    public function edit(Revision $revision)
    {}


    public function update(Request $request, Revision $revision)
    {
         //recibe los datos y vue crea un carro, aca validamos
        $request->validate([

            'carro_id'              => 'required|exists:carros,id', //cambia esto al hacer una relacion
            //                                  ↑tabla              ↑columna, valida que el id sea real.
            'fecha_revision'        => 'required|date',
            'tipo_mecanica'         => 'required|string|max:9',
            'costo'                 => 'required|numeric|min:0',
            'observaciones'         => 'nullable|string|max:255',
        ]);

        // // antes de crear, forzamos que disponible sea true o false
        // $request->merge([
        //     'disponible' => $request->has('disponible'),
        // ]);

        //4.le pasamos al encargado CARRO los datos y guardamos en la bd
        $revision -> update($request->all());
        //respondo al usuario con el carro recien creado
        return response()->json($revision->load('carro'), 200);
    }


    public function destroy(Revision $revision)
    {
        $revision->delete();
        return response()->json(['mensaje' => 'Revision eliminada']);
    }
}
