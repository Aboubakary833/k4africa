<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\NewsLettersUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsletters = DB::table('news_letters_users')->paginate(15);
        return view('admin.pages.newsletters', ['newsletters' => $newsletters]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newsletter = NewsLettersUser::find($id);
        if(!$newsletter) return redirect()->back()->with('error', "Erreur lors de la suppression de l'inscris.");

        NewsLettersUser::destroy($id);

        return redirect()->back()->with('success', "Inscris supprimé avec succès!");
    }
}
