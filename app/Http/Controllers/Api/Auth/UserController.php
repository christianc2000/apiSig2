<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'ci' => 'required|string|unique:users',
            'name' => 'required',
            'lastname' => 'required',
            'fecha_nac' => 'required',
            'sex' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'category_licencia_id' => 'required',
        ]);
        $user = new User();
        $user->ci = $request->ci;
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->fecha_nac = $request->fecha_nac;
        $user->sex = $request->sex;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->category_licencia_id = $request->category_licencia_id;

        $user->save();

        // return response(UserResource::make($user));
        return response()->json([
            "status" => 1,
            "msg" => "Alta de usuario exitoso!"
        ]);
    }
    public function login(Request $request)
    {
        $request->validate([
            'ci' => 'required|string',
            'password' => 'required'
        ]);

        $user = User::where('ci', '=', $request->ci)->first();
        if (isset($user->id)) {
          
            if (Hash::check($request->password, $user->password)) {
                //creamos el token
                $token=$user->createToken("auth_token")->plainTextToken;
                //si está todo ok
                return response()->json([
                    "status" => 1,
                    "msg" => "¡Usuario logueado exitosamente!",
                    "access_token"=>$token
                ]);
            } else {
                return response()->json([
                    "status" => 0,
                    "msg" => "La password es incorrecta"
                ],404);
            }
        }else{
            return response()->json([
                "status" => 0,
                "msg" => "Usuario no registrado"
            ],404);
        }
    }
    public function userProfile()
    {
        return response()->json([
            "status" => 0,
            "msg" => "Acerca del perfil de usuario",
            "data" => auth()->user()
        ]);
    }
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json([
             "status" => 1,
             "msg"=> "Cierre de Sesión"
        ]);
    }
}
