<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RegisterResource;
use App\Models\Conductor;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    
    public function index()
    {
        $conductor = Conductor::included()
            ->filter()
            ->sort()
            ->paginate();
        return RegisterResource::collection($conductor);
    }
    public function store(Request $request)
    {
     
        $data = $request->validate([
            'ci' => 'required|string|max:10|unique:conductors',
            'names' => 'required|string|max:30',
            'lastname' => 'required|string|max:30',
            'date' => 'required',
            'sex' => 'required|max:1',
            'phone' => 'required|int',
            'mail' => 'required|string|email|max:255|unique:conductors',
            'category_licencia_id' => 'required|string|max:12|exists:category_licencias,id'
        ]);
        $user = auth()->user();
   
        $data['user_id'] = $user->id;
        /*Crea al conductor */
        $conductor = new Conductor();
        $conductor->ci = $request->ci;
        $conductor->names = $request->names;
        $conductor->lastname = $request->lastname;
        $conductor->date = $request->date;
        $conductor->sex = $request->sex;
        $conductor->phone = $request->phone;
        $conductor->mail = $request->mail;
        $conductor->category_licencia_id = $request->category_licencia_id;
        $conductor->user_id = $user->id;

        $conductor->save();
      
        return RegisterResource::make($conductor);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'ci' => 'required|string|max:10|unique:conductors',
            'names' => 'required|string|max:30|unique:conductors',
            'lastname' => 'required|string|max:30|unique:conductors',
            'date' => 'required',
            'sex' => 'required|max:1',
            'phone' => 'required|int',
            'mail' => 'required|string|email|max:255|unique:conductors',
            'category_licencia_id' => 'required|string|max:12|exists:category_licencias,id',
            'user_id' => 'required|exists:users,id'
        ]);

        /*Crea al conductor */
        $conductor = Conductor::findOrFail($id);
        $conductor->ci = $request->ci;
        $conductor->names = $request->names;
        $conductor->lastname = $request->lastname;
        $conductor->date = $request->date;
        $conductor->sex = $request->sex;
        $conductor->phone = $request->phone;
        $conductor->mail = $request->mail;
        $conductor->category_licencia_id = $request->category_licencia_id;
        $conductor->user_id = $request->user_id;
        $conductor->save();

        return RegisterResource::make($conductor);
    }
    public function show(Request $request, $id)
    {
        $conductor = Conductor::included()->findOrFail($id);
        return RegisterResource::make($conductor);
    }
    public function destroy($id)
    {
        $conductor = Conductor::included()->findOrFail($id);
        $conductor->delete();
        return RegisterResource::make($conductor);
    }
}
