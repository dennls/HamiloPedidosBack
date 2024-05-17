<?php

use App\Http\Controllers\Api\AutenticacionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NegociosController;
use App\Http\Controllers\Api\PedidosController;
use App\Http\Controllers\Api\ProductosController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AutenticacionController::class, 'registro']);
Route::post('/login', [AutenticacionController::class, 'login']);

Route::group(["middleware" => "auth:sanctum"], function () {
    Route::post('/verificar', [AutenticacionController::class, 'verificar']);
});
Route::get('/negocios', [NegociosController::class, 'index']);

//lista productos
Route::get('/productos/{id}', [ProductosController::class, 'index']);

Route::post('/pedidos/registrar', [PedidosController::class, 'store']);

//historial
Route::get('/pedidos/historial/{cliente_id}', [PedidosController::class, 'historial']);
