<?php

use App\Http\Controllers\AdditionalContentController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\CommentsController;
use App\Http\Controllers\admin\DevisController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\NewletterController;
use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\admin\PartnerController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\SubPageController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\ContactsController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function() {
    Route::middleware('auth')->group(function() {
        Route::get('/', [HomeController::class, 'index'])->name('admin.home');
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
        Route::get('/pages/{page}', [PageController::class, 'index'])->name('page.index');
        Route::post('/page/update/{id}', [PageController::class, 'update'])->name('page.update');
        Route::resource('additional_content', AdditionalContentController::class);
        Route::resource('partners', PartnerController::class);
        Route::resource('subpages', SubPageController::class);
        Route::post('updateContent', [SubpageController::class, 'updateContent'])->name('subpages.updateContent');
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
        Route::resource('contacts', ContactsController::class);
        Route::resource('manage_devis', DevisController::class);
        Route::resource('manage_newsletter', NewletterController::class);
        Route::resource('manage_blog', BlogController::class);
        Route::post('updateArticleContent', [BlogController::class, 'updateArticleContent'])->name('updateArticleContent');
        Route::resource('comments', CommentsController::class);
    });
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'authenticate'])->name('login');
});