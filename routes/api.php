<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\LocalesController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ApartadosController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Login y registro
Route::post('login', [UsuariosController::class, 'authenticate']);
Route::post('users', [UsuariosController::class, 'register']);
Route::get('users', [UsuariosController::class, 'list']);

// Locales
Route::post('locales',[LocalesController::class,'create']);
Route::put('locales/{id}',[LocalesController::class,'updated']);
Route::delete('locales/{id}',[LocalesController::class,'delete']);
Route::get('locales',[LocalesController::class,'list']);
Route::get('locales/{id}',[LocalesController::class,'editar']);

// Clientes
Route::post('clientes',[ClientesController::class,'create']);
Route::put('clientes/{id}',[ClientesController::class,'updated']);
Route::delete('clientes/{id}',[ClientesController::class,'delete']);
Route::get('clientes',[ClientesController::class,'list']);
Route::get('clientes/{id}',[ClientesController::class,'editar']);

// Apartados
Route::post('apartados',[ApartadosController::class,'create']);
Route::put('apartados/{id}',[ApartadosController::class,'updated']);
Route::delete('apartados/{id}',[ApartadosController::class,'delete']);
Route::get('apartados',[ApartadosController::class,'list']);
Route::get('apartados/{id}',[ApartadosController::class,'editar']);
Route::get('apartados/{fechavencimiento}',[ApartadosController::class,'vencimiento']);



