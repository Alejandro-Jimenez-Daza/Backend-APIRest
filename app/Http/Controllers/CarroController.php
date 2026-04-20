<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use COM;
use Illuminate\Http\Request;

class CarroController extends Controller
{

    public function index()
    {
        // get api productos devuelve todos los productos, CArro viene de la clase del modelo
        $carros = Carro::all();
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
            'propietario'       => 'required|string|max:255',
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
        return response()->json($carro, 201);

        /*NORMALMENTE SOLO SE CREA CON ESTAS DOS LINEAS:
                    $producto = Producto::create($request->all());
                    return response()->json($producto, 201);
            */
    }


    public function show(Carro $carro)
    {
        //devuelve un podructo especifico, por id en url con GET

        return response()->json($carro);
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
            'propietario'       => 'required|string|max:255',
            'marca'             => 'required|string|max:100',
            'cilindraje'             => 'required|numeric|min:0',
            'disponible'             => 'boolean',
        ]);

        // antes de crear, forzamos que disponible sea true o false
        $request->merge([
            'disponible' => $request->has('disponible'),
        ]);

        //4.le pasamos al encargado CARRO los datos y guardamos en la bd
        $carro -> update($request->all());
        //respondo al usuario con el carro recien creado
        return response()->json($carro, 201);

        //la flecha -> es accede a algo o haz algo.
    }


    public function destroy(Carro $carro)
    {
        $carro->delete();
        return response()->json(['mensaje' => 'Producto eliminado']);
    }
}
