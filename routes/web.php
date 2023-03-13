<?php

use App\Http\Controllers\ListenedController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Establecemos la vista principal(home)
Route::get('/', function() {
    return view('home');
})->middleware('auth');


Route::get('/register', [RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('register.index');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');

Route::get('/login', [SessionsController::class, 'create'])
    ->middleware('guest')
    ->name('login.index');

Route::post('/login', [SessionsController::class, 'store'])
    ->name('login.store');

Route::get('/logout', [SessionsController::class, 'destroy'])
    ->middleware('auth')
    ->name('login.destroy');

Route::get('/index', [SongController::class, 'index'])->name('song.index');
Route::get('/create', [SongController::class, 'create'])->name('home');
Route::post('/store', [SongController::class, 'store'])->name('song.store');
Route::get('/edit/{id}', [SongController::class, 'edit'])->name('song.edit');
Route::put('/update/{id}', [SongController::class, 'update'])->name('song.update');
Route::get('/show', [SongController::class, 'show'])->name('song.show');
Route::get('destroy/{id}', [SongController::class, 'destroy'])->name('song.destroy');
Route::get('/songs/search', [SongController::class, 'search'])->name('song.search');
Route::post('/songs/{song}mark-as-listened', [ListenedController::class, 'markAsListened'])->name('song.markAsListened');
Route::get('/listened', [ListenedController::class, 'index'])->name('listened.index');


