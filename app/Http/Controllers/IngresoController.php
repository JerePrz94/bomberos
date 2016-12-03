<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Ingreso;
use App\TipoAsistencia;

class IngresoController extends Controller
{

    public function listarIngresos()
    {
        $ingresados=Ingreso::all();
        $tipos_asistencia=TipoAsistencia::all(['id', 'nombre']);
        $tipos_asist = array();
        foreach ($tipos_asistencia as $tipo_asist)
        {
            $tipos_asist[$tipo_asist->id] = $tipo_asist->nombre;
        }
        return view('asistencia/listar',compact('ingresados', 'tipos_asist'));
    }

    public function guardarIngreso(Request $request){
      Ingreso::create($request->all());
    }

    public function borrarIngreso($id_bombero){
      $bombero=Ingreso::where('id_bombero', $id_bombero);
      $bombero->delete();
    }
}