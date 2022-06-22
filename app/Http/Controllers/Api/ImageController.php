<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ImageResource;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
 
    public function index(){
        $user = auth()->user();
        return ImageResource::collection($user->image);
    }
    public function store(Request $request){
        
        
    }
    
}
