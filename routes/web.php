<?php

use App\Http\Controllers\CommunityLinkController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
Route::view('/home', 'home');

// routes/web.php
//Route::view('/fecha', 'fecha');

//con la función compact()
//return view('fecha', compact('datos'));


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [CommunityLinkController::class, 'index'])
->middleware(['auth', 'verified'])
->name('dashboard');
//rutas para los post de links y vistas

Route::post('/dashboard', [CommunityLinkController::class, 'index'])
->middleware(['auth', 'verified'])
->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//añadiendo la ruta Contact para que funcione los enlaces
Route::get('/contact', function () {
    return view('contact');
    
})->name('contact'); //el nombre de la ruta o enlace

//añadiendo la ruta Analytics para que funcione los enlaces
Route::get('/analytics', function () {
    return view('analytics');
    
})->name('analytics'); //el nombre de la ruta o enlace

require __DIR__.'/auth.php';
