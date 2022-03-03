<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function index() {
        return view('admin.pages.login');
    }

    public function authenticate(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => "required|email",
            'password' => "required"
        ], [
            'required' => "Ce champs est obligatoire.",
            'email' => "Vous devez entrer un email.",
        ]);

        if($validator->failed()) {
            return redirect()->back()->withErrors($validator);
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(!Auth::attempt($credentials, $request->remember)) {
            return redirect()->back()->with('error', "Email ou mot de passe incorrect!");
        }

        if(!Gate::allows('admin')) abort(403);
        return redirect('/admin');
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('login');
    }
}
