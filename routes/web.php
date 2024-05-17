<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return redirect('/login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/verificar', [App\Http\Controllers\HomeController::class, 'verificar'])->name('verificar');
    Route::get('/reenviar', [App\Http\Controllers\HomeController::class, 'reenviar'])->name('reenviarOTP');

    //rutas negocios
    Route::get('/negocios', [App\Http\Controllers\NegociosController::class, 'index']);
    Route::get('/negocios/registrar', [App\Http\Controllers\NegociosController::class, 'create']);
    Route::post('/negocios/registrar', [App\Http\Controllers\NegociosController::class, 'store']);
    Route::get('/negocios/actualizar/{id}', [App\Http\Controllers\NegociosController::class, 'edit']);
    Route::put('/negocios/actualizar/{id}', [App\Http\Controllers\NegociosController::class, 'update']);
    Route::get('/negocios/estado/{id}', [App\Http\Controllers\NegociosController::class, 'estado']);
    Route::get('/negocios/ver/{id}', [App\Http\Controllers\NegociosController::class, 'show']);

    //rutas productos
    Route::get('/productos', [App\Http\Controllers\ProductosController::class, 'index']);
    Route::get('/productos/registrar', [App\Http\Controllers\ProductosController::class, 'create']);
    Route::post('/productos/registrar', [App\Http\Controllers\ProductosController::class, 'store']);
    Route::get('/productos/actualizar/{id}', [App\Http\Controllers\ProductosController::class, 'edit']);
    Route::put('/productos/actualizar/{id}', [App\Http\Controllers\ProductosController::class, 'update']);
    Route::get('/productos/estado/{id}', [App\Http\Controllers\ProductosController::class, 'estado']);
    Route::get('/productos/ver/{id}', [App\Http\Controllers\ProductosController::class, 'show']);

    //pedidos
    Route::get('/pedidos', [App\Http\Controllers\PedidosController::class, 'index']);
    Route::get('/pedidos/registrar', [App\Http\Controllers\PedidosController::class, 'create']);
    Route::get('/pedidos/estado/{id}/{estado}', [App\Http\Controllers\PedidosController::class, 'estado']);
    Route::get('/pedidos/ver/{id}', [App\Http\Controllers\PedidosController::class, 'show']);

    //usuarios
    //Route::get('/usuarios', [App\Http\Controllers\UsuariosController::class, 'index']);

});
