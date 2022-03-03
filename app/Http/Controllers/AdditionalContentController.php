<?php

namespace App\Http\Controllers;

use App\Models\AdditionalContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdditionalContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'page' => 'required',
            'name' => 'required|string',
            'content' => 'required|string'
        ]);

        if($validator->failed()) return redirect()->back()->with('error', "Il y'a eu une erreur lors de l'ajout du contenu!");

        AdditionalContent::create([
            'page_id' => $request->page,
            'name' => $request->name,
            'content' => $request->content
        ]);

        return redirect()->back()->with('success', "Le contenu a été ajouté avec succès!");
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
            'content' => 'required|string'
        ]);

        if($validator->failed()) return redirect()->back()->with('error', "Il y'a eu une erreur lors de l'édition du contenu!");

        $content = AdditionalContent::find($id);
        $content->update([
            'name' => $request->name,
            'content' => $request->content
        ]);

        return redirect()->back()->with('success', "Le contenu a été modifié avec succès!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = AdditionalContent::find($id);
        if(!$content) return redirect()->back()->with('error', "Il y'a eu une erreur lors de la suppression du contenu!");

        AdditionalContent::destroy($id);
        return redirect()->back()->with('success', "Le contenu a été supprimé avec succès!");
    }
}
