<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use Illuminate\Http\Request;

class CarroController extends Controller
{

    public function index()
    {
        // get api productos devuelve todos los productos, CArro viene de la clase del modelo
        // with('propietario') trae los datos del propietario en la misma consulta
        $carros = Carro::with('propietario')->get();
        return response()->json($carros);
    }


    public function create()
    {
        //No se usa para api, en vue se pasa
    }


    public function store(Request $request)
    {
        //recibe los datos y vue crea un carro, aca validamos
        $request->validate([
            'matricula'         => 'required|string|max:6',
            'propietario_id'       => 'required|exists:propietarios,id', //cambia esto al hacer una relacion
            //                                  ↑tabla              ↑columna, valida que el id sea real.
            'marca'             => 'required|string|max:100',
            'cilindraje'        => 'required|numeric|min:0',
            'disponible'        => 'boolean',
        ]);

        // // antes de crear, forzamos que disponible sea true o false
        // $request->merge([
        //     'disponible' => $request->has('disponible'),
        // ]);

        //4.le pasamos al encargado CARRO los datos y guardamos en la bd
        $carro = Carro::create($request->all());
        //respondo al usuario con el carro recien creado
        return response()->json($carro->load('propietario'), 201);

        /*NORMALMENTE SOLO SE CREA CON ESTAS DOS LINEAS:
                    $producto = Producto::create($request->all());
                    return response()->json($producto, 201);
            */


                    /*
                    // Sin load — devuelve solo el carro con propietario_id: 3
                    $carro = Carro::create($request->all());
                    return response()->json($carro);

                    // Con load — devuelve el carro CON los datos del propietario adentro
                    return response()->json($carro->load('propietario'));



                    El JSON con load:
                    json{
                    "id": 1,
                    "matricula": "ABC123",
                    "propietario_id": 3,
                    "propietario": {
                        "id": 3,
                        "nombre_completo": "Juan Pérez"
                    }
                    }*/
    }


    public function show(Carro $carro)
    {
        //devuelve un podructo especifico, por id en url con GET

        return response()->json($carro->load('propietario'));
    }


    public function edit(Carro $carro)
    {
        // NO SE UTILIZA EN UNA API.
    }


    public function update(Request $request, Carro $carro)
    {
        // actualiza un producto por id, realizo la validacion
        $request->validate([
            'matricula'         => 'required|string|max:6',
            'propietario_id'       => 'required|exists:propietarios,id',
            'marca'             => 'required|string|max:100',
            'cilindraje'             => 'required|numeric|min:0',
            'disponible'             => 'boolean',
        ]);

        //4.le pasamos al encargado CARRO los datos y guardamos en la bd
        $carro -> update($request->all());
        //respondo al usuario con el carro recien creado
        return response()->json($carro->load('propietario'), 201);

        //la flecha -> es accede a algo o haz algo.
    }


    public function destroy(Carro $carro)
    {
        $carro->delete();
        return response()->json(['mensaje' => 'Producto eliminado']);
    }
}
