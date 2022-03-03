<?php

namespace App\Http\Controllers;

use App\Models\Slug;
use App\Models\SubPage;
use Illuminate\Http\Request;

class SubpagesController extends Controller
{
    function index($subpage) {
        $subpage = Slug::where('value', $subpage)->first()->subpage;
        return view('pages.subpage', ['subpage' => $subpage]);
    }
}
