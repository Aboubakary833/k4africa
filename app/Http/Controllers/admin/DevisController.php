<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Devis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DevisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.devis', ['devis' => DB::table('devis')->orderBy('created_at', 'desc')->paginate(15)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $devis = Devis::find($id);
        if(!$devis) return redirect()->back()->with('error', "Erreur lors de la suppression du dévis.");

        Devis::destroy($id);

        return redirect()->back()->with('success', "Le dévis a été supprimé avec succès.");
    }
}
