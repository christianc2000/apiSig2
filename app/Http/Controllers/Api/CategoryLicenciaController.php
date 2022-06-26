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

}
