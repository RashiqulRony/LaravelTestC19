<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\HomeController;


Auth::routes();
Route::get('/', function () {
   return redirect('search');
});


Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/search-result', [SearchController::class, 'search'])->name('search-result');
Route::get('/home', function () {
    return redirect(route('search'));
})->name('home');
