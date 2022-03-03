<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AdditionalContent;
use App\Models\Page;
use App\Models\Slug;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function index($page) {
            $given_page = Slug::where('name', $page)->first()->page;
            $additional_contents = Collection::unwrap(AdditionalContent::where('page_id', $given_page->id)->get());
                return view('admin.pages.page', [
                    'page' => $given_page,
                    'additional_contents' => $additional_contents
                ]);
    }


    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
        ]);

        if($validator->failed()) return redirect()->back()->with('error', "Il y'a eu une erreur lors de la modification de la page!");

        $inputs['title'] = $request->title;

        if($image = $request->file('image')) {
            $full_path = $image->store('public/pages');
            $splited_path = explode('/', $full_path);
            $path = $splited_path[1] . '/' . $splited_path[2];
            $inputs['image'] = $path;
        }

        $page = Page::find($id);
        $page->update($inputs);

        return redirect()->back()->with('success', "Page modifié avec succès!");

    }
}
