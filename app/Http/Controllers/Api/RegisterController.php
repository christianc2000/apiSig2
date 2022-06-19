<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Conductor;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        return Conductor::included()->filter()->sort()->get();
    }
    public function store(Request $request)
    {
        $request->validate([
            'ci' => 'required|string|max:10|unique:conductors',
            'names' => 'required|string|max:30|unique:conductors',
            'lastname' => 'required|string|max:30|unique:conductors',
            'date' => 'require',
            'sex' => 'required|max:1',
            'phone' => 'required|int',
            'mail' => 'required|string|email|max:255|unique:conductors',
            'category_licencia_id' => 'required|string|max:12',
            'user_id' => 'required'
        ]);

        /*Crea al conductor */
        $conductor = new Conductor();
        $conductor->ci = $request->ci;
        $conductor->names = $request->names;
        $conductor->lastname = $request->lastname;
        $conductor->date = $request->date;
        $conductor->sex = $request->sex;
        $conductor->phone = $request->phone;
        $conductor->mail = $request->email;
        $conductor->license_category_id = $request->license_category_id;
        $conductor->user_id = $request->user_id;

        $conductor->save();

        return response($conductor, 200);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'ci' => 'required|string|max:10|unique:conductors',
            'names' => 'required|string|max:30|unique:conductors',
            'lastname' => 'required|string|max:30|unique:conductors',
            'date' => 'require',
            'sex' => 'required|max:1',
            'phone' => 'required|int',
            'mail' => 'required|string|email|max:255|unique:conductors',
            'category_licencia_id' => 'required|string|max:12',
            'user_id' => 'required'
        ]);

        /*Crea al conductor */
        $conductor = Conductor::findOrFail($id);
        $conductor->ci = $request->ci;
        $conductor->names = $request->names;
        $conductor->lastname = $request->lastname;
        $conductor->date = $request->date;
        $conductor->sex = $request->sex;
        $conductor->phone = $request->phone;
        $conductor->mail = $request->email;
        $conductor->license_category_id = $request->license_category_id;
        $conductor->user_id = $request->user_id;

        $conductor->save();

        return response($conductor, 200);
    }
    public function show(Request $request, $id)
    {
        $conductor = Conductor::findOrFail($id);
        return $conductor;
    }
    public function destroy($id)
    {
        $conductor = Conductor::included()->findOrFail($id);
        $conductor->delete();
        return $conductor;
    }
}
