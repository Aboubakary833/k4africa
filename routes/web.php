<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SubpagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'home'])->name('home');
Route::prefix('services')->group(function() {
    Route::get('/', [PagesController::class, 'services'])->name('services');
});
Route::get('/details/{subpage}', [SubpagesController::class, 'index'])->name('details.subpage');

Route::prefix('programmes')->group(function() {
    Route::get('/', [PagesController::class, 'programs'])->name('programs');
});

Route::get('a_propos', [PagesController::class, 'about'])->name('about');
Route::get('/contacts', [PagesController::class, 'contact'])->name('contact');
Route::post('/send', [ContactsController::class, 'send'])->name('contact.send');
Route::get('/devis', [PagesController::class, 'devis'])->name('devis');
Route::post('askdevis', [ContactsController::class, 'askDevis'])->name('askdevis');
Route::get('/inscription_newsletter', [PagesController::class, 'newsletter'])->name('news_letter');
Route::post('/subscribeNewsletters', [PagesController::class, 'subscribeNewsletters'])->name('news_letter');

require __DIR__ . '/admin/index.php';