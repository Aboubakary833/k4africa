<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.roles', ['roles' => Role::all()]);
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
            'name' => 'required|string'
        ]);

        if($validator->failed()) return redirect()->back()->with('error', "Il y'a eu une erreur lors de l'ajout du role!");

        Role::create(['name' => $request->name]);

        return redirect()->back()->with('success', "Le role a été ajouté avec succès!");
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
            'name' => 'required|string'
        ]);

        if($validator->failed()) return redirect()->back()->with('error', "Il y'a eu une erreur lors de l'édition du role!");

        $role = Role::find($id);
        $role->update(['name' => $request->name]);
        return redirect()->back()->with('success', "Le role a été modifié avec succès!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        if(!$role) return redirect()->back()->with('error', "Il y'a eu une erreur lors de la suppression du role!");

        Role::destroy($id);
        return redirect()->back()->with('success', "Le role a été supprimé avec succès!");
    }
}
