<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{

    public function index()
    {
        $data = DB::table('vehiculos')
            ->join('usuarios', 'vehiculos.dueno_actual_id', '=', 'usuarios.id')
            ->select('vehiculos.id', 'vehiculos.marca', 'vehiculos.modelo', 'vehiculos.anio', 'vehiculos.precio', 'usuarios.nombre', 'usuarios.apellidos')
            ->get(); // Puedes seleccionar las columnas que necesitas


        return view('welcome')->with('data', $data);
    }

    public function create(Request $request)
    {
        try {
            $duenoActual = DB::table('usuarios')
                ->select('id') // Supongamos que quieres seleccionar el campo 'id' de otra_tabla
                ->where(DB::raw("CONCAT(nombre, ' ', apellidos)"), '=', $request->textdueno) // Agrega cualquier condición que necesites
                ->first();

            $sql = DB::table('vehiculos')->insertGetId([
                'marca' => $request->textmarca,
                'modelo' => $request->textmodelo,
                'anio' => $request->textanio,
                'dueno_actual_id' => $duenoActual->id, // Utiliza el resultado del SELECT
                'precio' => $request->textprecio,
            ]);

            DB::table('historico_duenos')->insert([
                'vehiculo_id' => $sql,
                'dueno_id' => $duenoActual->id
            ]);
        } catch (\Exception $e) {
            $sql = 0;
        }
        if ($sql == true) {
            return back()->with('correcto', 'Vehiculo registrado correctamente');
        } else {
            return back()->with('incorrecto', 'Error al registrar');
        }
    }
    public function update(Request $request)
    {
        try {
            $nuevoDueno = DB::table('usuarios')
                ->select('id')
                ->where(DB::raw("CONCAT(nombre, ' ', apellidos)"), '=', $request->textodueno) // Agrega cualquier condición que necesites
                ->first();


            $sql = DB::table('vehiculos')
                ->where('id', $request->textoid)
                ->update([
                    'dueno_actual_id' => $nuevoDueno->id,
                    'precio' => $request->textoprecio
                ]);

            DB::table('historico_duenos')->insert([
                'vehiculo_id' => $request->textoid,
                'dueno_id' => $nuevoDueno->id
            ]);
        } catch (\Exception $e) {
            $sql = 0;
        }
        if ($sql == true) {
            return back()->with('correcto', 'Vehiculo modificado correctamente');
        } else {
            return back()->with('incorrecto', 'Error al modificar');
        }
    }

    public function usercreate(Request $request)
    {
        try {
            $sql = DB::table('usuarios')->insert([
                'nombre' => $request->textonombre,
                'apellidos' => $request->textoapellidos,
                'correo' => $request->textocorreo
            ]);
        } catch (\Exception $e) {
            $sql = 0;
        }
        if ($sql == true) {
            return back()->with('correcto', 'Usuario registrado correctamente');
        } else {
            return back()->with('incorrecto', 'Error al registrar');
        }
    }
    public function usuario()
    {
        $data = DB::table('usuarios')
            ->select('*')
            ->get();

        return view('user')->with('data', $data);
    }

    public function usermodify(Request $request)
    {
        try {
            $sql = DB::table('usuarios')
                ->where('id', $request->textoid)
                ->update([
                    'nombre' => $request->textonombre,
                    'apellidos' => $request->textoapellidos,
                    'correo' => $request->textocorreo
                ]);
        } catch (\Exception $e) {
            $sql = 0;
        }
        if ($sql == true) {
            return back()->with('correcto', 'Usuario registrado correctamente');
        } else {
            return back()->with('incorrecto', 'Error al registrar');
        }
    }
    public function historico()
    {
        $data = DB::table('usuarios')
            ->join('vehiculos', 'vehiculos.dueno_actual_id', '=', 'usuarios.id')
            ->join('historico_duenos','historico_duenos.dueno_id','=','usuarios.id')
            ->select('vehiculos.id', 'vehiculos.marca', 'vehiculos.modelo', 'vehiculos.anio', 'vehiculos.precio', 'usuarios.nombre', 'usuarios.apellidos', 'historico_duenos.fecha_cambio')
            ->get();

        return view('historic-user')->with('data', $data);
    }
}
