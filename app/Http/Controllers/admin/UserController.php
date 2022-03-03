<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.users', [
            'users' => User::all(),
            'roles' => Role::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'role_id' => 'required|integer',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password' => 'required'
        ]);

        if($validator->failed()) return redirect()->back()->with('error', "Il y'a eu une erreur lors de l'ajout de l'utilisateur!")->withErrors($validator);

        $inputs = $request->all(['name', 'role_id', 'email', 'phone']);
        $inputs['password'] = Hash::make($request->password);
        $inputs['uuid'] = Str::uuid();

        if($profile = $request->file('profile')) {
            $full_path = $profile->store('public/users');
            $splited_path = explode('/', $full_path);
            $path = $splited_path[1] . '/' . $splited_path[2];
            $inputs['profile'] = $path;
        } else $inputs['profile'] = 'users/default.png';


        User::create($inputs);

        return redirect()->back()->with('success', 'Utilisateur ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'role_id' => 'required|integer',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone'
        ]);

        if($validator->failed()) return redirect()->back()->with('error', "Il y'a eu une erreur lors de la modification de l'utilisateur!");

        $inputs = $request->all(['name', 'role_id', 'email', 'phone']);
        if($request->password) $inputs['password'] = Hash::make($request->password);

        if($profile = $request->file('profile')) {
            $full_path = $profile->store('public/users');
            $splited_path = explode('/', $full_path);
            $path = $splited_path[1] . '/' . $splited_path[2];
            $inputs['profile'] = $path;
        }

        $user = User::where('uuid', $id)->first();
        $user->update($inputs);

        return redirect()->back()->with('success', "Utilisateur modifié avec succès!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('uuid', $id)->first();
        if(!$user) return redirect()->back()->with('error', "Il y'a eu une erreur lors de la suppression de l'utilisateur.");

        User::destroy($user->id);

        return redirect()->back()->with('success', 'Utilisateur supprimé avec succès!');
    }
}
