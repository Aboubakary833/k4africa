<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Slug;
use App\Models\SubPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubPageController extends Controller
{


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
            'title' => 'required|string',
            'path' => 'required|string',
            'pathname' => 'required|string'
        ]);

        if($validator->failed()) return redirect()->with('error', "Il y'a eu une erreur lors de l'ajout de la sous page!");

        $slug = Slug::create([
            'name' => $request->pathname,
            'value' => $request->path,
        ]);

        SubPage::create([
            'page_id' => $request->page,
            'slug_id' => $slug->id,
            'name' => $request->name,
            'title' => $request->title,
            'content' => ''
        ]);

        return redirect()->back()->with('success', "La sous page a été ajoutée avec succès!");
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subpage = SubPage::find($id);
        if(!$subpage) return redirect()->back()->with('erreur', "La sous page n'a pas été trouvée!");

        return view('admin.pages.subpage', ['subpage' => $subpage]);
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
            'title' => 'required|string',
            'path' => 'required|string',
            'pathname' => 'required|string'
        ]);

        if($validator->failed()) return redirect()->with('error', "Il y'a eu une erreur lors de la modification de la sous page!");

        $subpage = SubPage::find($id);
        $slug = Slug::find($subpage->slug->id);

        $subpage->update([
            'name' => $request->name,
            'title' => $request->title,
        ]);

        $slug->update([
            'name' => $request->pathname,
            'value' => $request->path
        ]);

        return redirect()->back()->with('success', "La sous page a été modifiée avec succès!");
    }

    public function updateContent(Request $request) {
        $validator = Validator::make($request->all(), [
            'subpage' => 'required',
            'content' => 'required'
        ]);

        if($validator->failed()) return redirect()->back()->with('error', "Il y'a eu une erreur lors de la mise à jour du contenu!");

        $subpage = SubPage::find($request->subpage);
        $subpage->update(['content' => $request->content]);

        return redirect()->back()->with('success', 'Contenu mis à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subpage = SubPage::find($id);
        if(!$subpage) return redirect()->back()->with('erreur', "La sous page n'a pas été trouvée!");
        SubPage::destroy($id);
        return redirect()->back()->with('success', "La sous page a été supprimée avec succès!");
    }
}
