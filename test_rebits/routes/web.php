<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
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
// Ruta de inicio
Route::get("/", [CrudController::class, "index"])->name("crud.index"); 

// Ruta Agregar vehiculo
Route::post("/agregar-vehiculo", [CrudController::class, "create"])->name("crud.create"); 

// Ruta de modificacion de vehiculo
Route::post("/modificar-vehiculo", [CrudController::class,"update"])->name("crud.update");

// Ruta que agrega un usuario
Route::post("/agregar-usuario", [CrudController::class,"usercreate"])->name("crud.usercreate");

// Ruta que modifica los datos de un usuario
Route::post("/modificar-usuario", [CrudController::class,"usermodify"])->name("crud.usermodify");

// Ruta que envia la vista de usuario
Route::get("/usuario", [CrudController::class,"usuario"])->name("crud.usuario");

// Ruta que envia la vista de historico de duenos
Route::get("/historico", [CrudController::class,"historico"])->name("crud.historico");