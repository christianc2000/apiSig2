<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category_licencia;
use Illuminate\Http\Request;

class CategoryLicenciaController extends Controller
{
    public function index()
    {
        $category= Category_licencia::included()
        ->filter()
        ->sort()
        ->paginate();
        return CategoryResource::collection($category);
    }
    public function store(Request $request)
    {
        $request->validate([
            'abreviacion' => 'required'
        ]);
        //        return $request->all();
        $cl = new Category_licencia();
        $cl->abreviacion = $request->abreviacion;

        $cl->save();

        CategoryResource::make($cl);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'abreviacion' => 'required'
        ]);
        //        return $request->all();
        $cl = Category_licencia::findOrFail($id);
        $cl->abreviacion = $request->abreviacion;

        $cl->save();

        return CategoryResource::make($cl);
    }
    public function show($id)
    {
        $cl = Category_licencia::included()->findOrFail($id);
        return CategoryResource::make($cl);
    }
    public function destroy($id)
    {
        $cl = Category_licencia::findOrFail($id);
        $cl->delete();
        return CategoryResource::make($cl);
    }
}
