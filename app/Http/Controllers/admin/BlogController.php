<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Slug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.blog', ['articles' => Article::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.new_article');
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
            'title' => 'required|string',
            'path' => 'required|string',
            'pathname' => 'required|string'
        ]);

        if($validator->failed()) return redirect()->with('error', "Il y'a eu une erreur lors de l'ajout de l'article!");

        $slug = Slug::create([
            'name' => $request->pathname,
            'value' => $request->path,
        ]);

        Article::create([
            'slug_id' => $slug->id,
            'title' => $request->title,
            'content' => $request->content || ''
        ]);

        return redirect()->back()->with('success', "L'article a été ajoutée avec succès!");
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
        $article = Article::find($id);
        return view('admin.pages.article', ['article' => $article]);
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
            'title' => 'required|string',
            'path' => 'required|string',
            'pathname' => 'required|string'
        ]);

        if($validator->failed()) return redirect()->with('error', "Il y'a eu une erreur lors de la modification!");

        $article = Article::find($id);
        $slug = Slug::find($article->slug->id);

        $article->update([
            'title' => $request->title,
        ]);

        $slug->update([
            'name' => $request->pathname,
            'value' => $request->path
        ]);

        return redirect()->back()->with('success', "L'article a été modifiée avec succès!");
    }

    public function updateArticleContent(Request $request) {
        $validator = Validator::make($request->all(), [
            'article' => 'required',
            'content' => 'required'
        ]);

        if($validator->failed()) return redirect()->back()->with('error', "Il y'a eu une erreur lors de la mise à jour de l'article!");

        $subpage = Article::find($request->article);
        $subpage->update(['content' => $request->content]);

        return redirect()->back()->with('success', 'Article mis à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        if(!$article) return redirect()->back()->with('error', 'Erreur lors de la suppression.');

        Article::destroy($id);

        return redirect()->back()->with('success', 'Article supprimé avec succès.');
    }
}
