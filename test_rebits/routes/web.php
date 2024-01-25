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

Route::get("/", [CrudController::class, "index"])->name("crud.index"); 

//
Route::post("/agregar-vehiculo", [CrudController::class, "create"])->name("crud.create"); 
//Route::get("/", "app\http\Controllers\CrudController@index")->name("crud.index");

Route::post("/modificar-vehiculo", [CrudController::class,"update"])->name("crud.update");

Route::post("/agregar-usuario", [CrudController::class,"usercreate"])->name("crud.usercreate");

Route::post("/modificar-usuario", [CrudController::class,"usermodify"])->name("crud.usermodify");

Route::get("/usuario", [CrudController::class,"usuario"])->name("crud.usuario");

Route::get("/historico", [CrudController::class,"historico"])->name("crud.historico");