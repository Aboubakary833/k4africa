<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.partner', ['partners' => Partner::all()]);
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
            'link' => 'string',
            'logo' => 'required'
        ]);

        if($validator->failed()) return redirect()->back()->with('error', "Il y'a eu une erreur lors de l'ajout du parténaire");

        $inputs = $request->all('name');
        if($request->link) $inputs['link'] = $request->link;

        if($logo = $request->file('logo')) {
            $full_path = $logo->store('public/partners');
            $splited_path = explode('/', $full_path);
            $path = $splited_path[1] . '/' . $splited_path[2];
            $inputs['logo'] = $path;
        }

        Partner::create($inputs);
        
        return redirect()->back()->with('success', "Parténaire ajouté avec succès!");

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
            'link' => 'string'
        ]);

        if($validator->failed()) return redirect()->back()->with('error', "Il y'a eu une erreur lors de la modifcation du parténaire");

        $inputs = $request->all('name');
        if($request->link) $inputs['link'] = $request->link;

        if($logo = $request->file('logo')) {
            $full_path = $logo->store('public/partners');
            $splited_path = explode('/', $full_path);
            $path = $splited_path[1] . '/' . $splited_path[2];
            $inputs['logo'] = $path;
        }

        $partner = Partner::find($id);
        $partner->update($inputs);

        return redirect()->back()->with('success', "Parténaire modifié avec succès!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
