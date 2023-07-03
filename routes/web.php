<?php

use App\Http\Controllers\Guests\ComicController;
use App\Http\Controllers\Guests\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//rotte PageController.php
Route::get('/', [PageController::class, 'home'])->name('home');

// Rotte ComicController.php
// Route::get('/comics/index', [ComicController::class, 'index'])->name('comics.index');
// Route::get('/comics/create', [ComicController::class, 'create'])->name('comics.create');
// Route::post('/comics', [ComicController::class, 'store'])->name('comics.store');
// Route::get('/comics/{comic}', [ComicController::class, 'show'])->name('comics.show');

Route::resource('comics', ComicController::class);
Route::post('/comics/{comic}/restore', [ComicController::class, 'restore'])->name('comics.restore');
