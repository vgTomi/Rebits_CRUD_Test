<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
    public function index()
    {
        $data = DB::select(" SELECT * from vehiculos ");
        return view("welcome")->with("data", $data);
    }

    public function create(Request $request)
    {
        $duenoActual = DB::table('usuarios')
            ->select('id') // Supongamos que quieres seleccionar el campo 'id' de otra_tabla
            ->where(DB::raw("CONCAT(nombre, ' ', apellidos)"), '=', $request->textdueno) // Agrega cualquier condición que necesites
            ->first();

        $sql = DB::table('vehiculos')->insert([
            'marca' => $request->textmarca,
            'modelo' => $request->textmodelo,
            'anio' => $request->textanio,
            'dueno_actual_id' => $duenoActual->id, // Utiliza el resultado del SELECT
            'precio' => $request->textprecio,
        ]); 
        if($sql == true){
            return back()->with('correcto', 'Vehiculo registrado correctamente');
        }
        else{
            return back()->with('incorrecto', 'Error al registrar');
        }
    }
}
