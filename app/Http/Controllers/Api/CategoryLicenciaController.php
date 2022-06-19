<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category_licencia;
use Illuminate\Http\Request;

class CategoryLicenciaController extends Controller
{
    public function index(){
        return Category_licencia::all();
    }
    public function store(Request $request)
    {
        $request->validate([
            'abreviacion' => 'required'
        ]);
//        return $request->all();
        $cl =new Category_licencia();
        $cl->abreviacion=$request->abreviacion;
        
        $cl->save();
       
        return response($cl, 200);
    }
}
