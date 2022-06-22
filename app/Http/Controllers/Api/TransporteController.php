<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\TransporteResource;
use App\Models\Transporte;
use Illuminate\Http\Request;

class TransporteController extends Controller
{
    public function index()
    {
        $transporte=Transporte::paginate()->filter()->sort();
        return TransporteResource::collection($transporte);
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
            'conductor_id' => 'required|exists:conductors,id'

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
        return $transporte;
        return TransporteResource::collection($transporte);
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
            'conductor_id' => 'required|exist:conductors,id'

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

        return TransporteResource::collection($transporte);
    }
    public function show($id)
    {
        $transporte = Transporte::findOrFail($id);

        return TransporteResource::make($transporte);
    }
    public function destroy($id)
    {
        $transporte = Transporte::findOrFail($id);
        $transporte->delete();
        return TransporteResource::collection($transporte);
    }
}
