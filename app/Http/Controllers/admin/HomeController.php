<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() {
        $contacts = DB::table('contacts')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pages.home', ['contacts' => $contacts]);
    }
}
