<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json([
            'status' => 1,
            'msg' => "Lista de usuarios registrados",
            'data' => $users

        ]);
    }
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
            'image'   =>  'mimes:jpg,jpeg,bmp,png|max:8184', //8MB
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
        if ($request->hasFile('image')) {

            $folder = "public/imagenes/perfil";
            $imagen = $request->file('image')->store($folder); //Storage::disk('local')->put($folder, $request->image, 'public');
            $url = Storage::url($imagen);
            $user->image = $url;
        }
        $user->password = Hash::make($request->password);
        $user->category_licencia_id = $request->category_licencia_id;

        $user->save();
        $us = User::all()->find($user->id);
        $token = $user->createToken("auth_token")->plainTextToken;
        //si está todo ok
        // return response(UserResource::make($user));
        return response()->json([
            "status" => 1,
            "msg" => "Usuario registrado exitosamente!",
            "data" => $us,
            "access_token" => $token,
            "token_type" => "Bearer"
        ]);
    }
    public function loginget(Request $request)
    {
        return response()->json([
            "status" => 0,
            "msg" => "Necesita logguearse"
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
                $token = $user->createToken("auth_token")->plainTextToken;
                //si está todo ok
                return response()->json([
                    "status" => 1,
                    "msg" => "¡Usuario logueado exitosamente!",
                    "access_token" => $token,
                    "token_type" => "Bearer",
                    "data" => $user
                ]);
            } else {
                return response()->json([
                    "status" => 0,
                    "msg" => "La password es incorrecta"
                ], 404);
            }
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Usuario no registrado"
            ], 404);
        }
    }
    public function userProfile()
    {
        return response()->json([
            "status" => 1,
            "msg" => "Acerca del perfil de usuario",
            "data" => auth()->user()
        ]);
    }

    public function editProfile(Request $request)
    {

        $request->validate([

            'ci' => 'required|string',
            'name' => 'required',
            'lastname' => 'required',
            'fecha_nac' => 'required',
            'sex' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'image.*'   =>  'image|mimes:jpg,jpeg,bmp,png|max:8184', //8MB
            'password' => 'required|confirmed',
            'category_licencia_id' => 'required',
        ]);
        $u = Auth::user();
        $user = User::all()->where('id', '=', $u->id)->first();

        $user->ci = $request->ci;
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->fecha_nac = $request->fecha_nac;
        $user->sex = $request->sex;
        $user->phone = $request->phone;
        $user->email = $request->email;
        if ($request->hasFile('image')) {
            $folder = "public/imagenes/perfil";
            if ($user->image != null) { //si entra es para actualizar su foto borrando la que tenía, si no tenía entonces no entra
                $url=str_replace('storage','public',$user->image);//para eliminar la imagen de esa url
                Storage::delete($user->image);
            }
            $imagen = $request->file('image')->store($folder); //Storage::disk('local')->put($folder, $request->image, 'public');
            $url = Storage::url($imagen);
            $user->image = $url;
        }

        $user->password = Hash::make($request->password);
        $user->category_licencia_id = $request->category_licencia_id;

        $user->save();
      //  $u=User::all()->find($user->id);
        return response()->json([
            "status" => 1,
            "msg" => "Usuario actualizado correctamente!",
            "data" => $u
        ]);
    }
    public function logout()
    {
        $user = auth()->user();

        auth()->user()->tokens()->delete();
        return response()->json([
            "status" => 1,
            "msg" => "Cierre de Sesión",
            "data" => $user
        ]);
    }
}
