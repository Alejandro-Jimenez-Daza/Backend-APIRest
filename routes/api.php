<?php

use App\Http\Controllers\CarroController;
use App\Http\Controllers\PropietarioController;
use App\Http\Controllers\RevisionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// agrego la ruta de carro y la llamo en los uses

Route::apiResource('carros', CarroController::class);
Route::apiResource('propietarios', PropietarioController::class);
Route::apiResource('revisiones', RevisionController::class)->parameters(['revisiones' => 'revision']); //para que no pluralize mal laravel



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
