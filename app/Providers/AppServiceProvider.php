<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\Slug;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        $slug = Slug::where('value', $request->path())->first();
        View::share([
            'pages'=> Page::all(),
            'active_page' => $slug ? $slug->page : null
        ]);
    }
}
