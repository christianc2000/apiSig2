<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transporte;
use Illuminate\Http\Request;

class TransporteController extends Controller
{
    public function index()
    {
        return Transporte::all();
    }
    public function store(Request $request)
    {
        $request->validate([
            'placa' => 'required|string|max:15',
            'modelo' => 'required',
            'linea' => 'required',
            'cantidad_asiento' => 'required',
            'numero_interno' => 'required',
            'fecha_asignacion' => 'required',
            'fecha_baja' => 'required',
            'conductor_id' => 'required'

        ]);

        $transporte = new Transporte();

        $transporte->placa = $request->placa;
        $transporte->modelo = $request->modelo;
        $transporte->linea = $request->linea;
        $transporte->cantidad_asiento = $request->cantidad_asiento;
        $transporte->numero_interno = $request->numero_interno;
        $transporte->fecha_asignacion = $request->fecha_asignacion;
        $transporte->fecha_baja = $request->fecha_baja;
        $transporte->conductor_id = $request->conductor_id;
        $transporte->save();

        return response($transporte, 200);
    }
    public function update(Request $request, Transporte $transporte)
    {
        $request->validate([
            'placa' => 'required',
            'modelo' => 'required',
            'linea' => 'required',
            'cantidad_asiento' => 'required',
            'numero_interno' => 'required',
            'fecha_asignacion' => 'required',
            'fecha_baja' => 'required',
            'conductor_id' => 'required'

        ]);
       
      

        $transporte->placa = $request->placa;
        $transporte->modelo = $request->modelo;
        $transporte->linea = $request->linea;
        $transporte->cantidad_asiento = $request->cantidad_asiento;
        $transporte->numero_interno = $request->numero_interno;
        $transporte->fecha_asignacion = $request->fecha_asignacion;
        $transporte->fecha_baja = $request->fecha_baja;
        $transporte->conductor_id = $request->conductor_id;
        $transporte->save();

        return response($transporte, 200);
    }
    public function show($id){
        $transporte= Transporte::findOrFail($id);
        return $transporte;
    }
    public function destroy($id){
        $transporte= Transporte::findOrFail($id);
        $transporte->delete();
        return $transporte;
    }
}
