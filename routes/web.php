<?php

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


Route::get('/edit', function () {
    return view('edit');
});

//Esto define y genera todas las rutas del crud(podeis ver todas las rutas con el comando php artisan route:list)
// Route::resource('songs', SongController::class);

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
Route::get('/create', [SongController::class, 'create'])->name('song.create');
Route::get('/store', [SongController::class, 'store'])->name('song.store');
Route::post('/store', [SongController::class, 'store'])->name('song.store');
Route::get('/edit', [SongController::class, 'edit'])->name('song.edit');
Route::post('/edit', [SongController::class, 'edit'])->name('song.edit');
Route::get('/update', [SongController::class, 'update'])->name('song.update');
Route::post('/update', [SongController::class, 'update'])->name('song.update');
Route::get('/show', [SongController::class, 'show'])->name('song.show');
Route::get('destroy/{id}', [SongController::class, 'destroy'])->name('song.destroy');
// Route::delete('/song/{song}', [SongController::class, 'destroy'])->name('song.destroy');
Route::get('/search', [SearchController::class, 'search'])->name('search');


