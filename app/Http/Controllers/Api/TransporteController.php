<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\TransporteResource;
use App\Models\Transporte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransporteController extends Controller
{
    public function index()
    {
        $user=Auth()->user();
      
        $transporte=$user->transportes;

        return response()->json([
            "status" => 1,
            "msg" => "Lista de transporte",
            "data" => $transporte
        ]);
        //$transporte=Transporte::paginate()->filter()->sort();
       // return TransporteResource::collection($transporte);
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
           
        ]);
       
        $user=Auth()->user();
        $transporte = new Transporte();
        
        $transporte->placa = $request->placa;
        $transporte->modelo = $request->modelo;
        $transporte->linea = $request->linea;
        $transporte->cantidad_asiento = $request->cantidad_asiento;
        $transporte->numero_interno = $request->numero_interno;
        $transporte->fecha_asignacion = $request->fecha_asignacion;
       // $transporte->fecha_baja = $request->fecha_baja;
        $transporte->user_id = $user->id;
        $transporte->save();
     
        return response()->json([
            "status" => 1,
            "msg" => "Transporte registrado exitosamente!",
            "data" => $transporte
        ]);
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
            'fecha_baja' => '',
           // 'conductor_id' => 'required|exist:conductors,id'

        ]);

      
        $user=Auth()->user();
        $transporte->placa = $request->placa;
        $transporte->modelo = $request->modelo;
        $transporte->linea = $request->linea;
        $transporte->cantidad_asiento = $request->cantidad_asiento;
        $transporte->numero_interno = $request->numero_interno;
        $transporte->fecha_asignacion = $request->fecha_asignacion;
        $transporte->fecha_baja = $request->fecha_baja;
        $transporte->user_id = $user->id;
        $transporte->save();

        return response()->json([
            "status" => 1,
            "msg" => "Transporte actualizado exitosamente!",
            "data" => $transporte
        ]);
    }
    public function show($id)
    {
        $transporte = Transporte::findOrFail($id);
        return response()->json([
            "status" => 1,
            "data" => $transporte
        ]);
    }
    public function destroy($id)
    {
        $transporte = Transporte::findOrFail($id);
        $transporte->delete();
        return response()->json([
            "status"=>1,
            "msg"=>"Transporte eliminado exitosamente",
            "data"=>$transporte
        ]);
    }
}
