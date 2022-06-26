<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResource;
use App\Models\Conductor;

class LoginController extends Controller
{
    public function store(Request $request)
    {
        return $request;
        $request->validate([
          /*  'email' => 'required|string|email',
            'password' => 'required|string'*/
            'ci'=>'required|string|unique'
        ]);
        $conductor = Conductor::where('ci', '=', $request->ci)->firstOrFail();

        if (Hash::check($request->ci, $conductor->ci)) {
            return UserResource::make($conductor);
        } else {
            return response()->json(['message'=>'These credentials do not match our records'],404);
        }
    }
}
