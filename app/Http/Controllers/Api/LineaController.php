<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Linea;
use Illuminate\Http\Request;

class LineaController extends Controller
{
    public function index()
    {
        $lineas = Linea::all();
        return response()->json([
            "status" => 1,
            "msg" => "Lista de Líneas",
            "data" => $lineas
        ]);
    }
}
