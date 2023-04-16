<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductoController;
use App\Http\Controllers\Api\ProveedorController;
use App\Http\Controllers\Api\AuthController;

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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

//Productos
Route::resource('/productos',ProductoController::class);
Route::get('/productos/{id}', 'ProductoController@show');
Route::put('/productos/{id}', 'ProductosController@update');

//Proveedores
Route::resource('/proveedors',ProveedorController::class);
Route::get('/proveedors/{id}', 'ProveedorController@show');
Route::put('/proveedors/{id}', 'ProveedorController@update');

//Auth
Route::post('register',[AuthController::class]);
