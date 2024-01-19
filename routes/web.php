<?php

use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index')->middleware('auth');

Route::get('/login', [UserController::class, 'index'])->name('indexlogin');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::resource('etudiants', EtudiantController::class);
    Route::resource('filiere', FiliereController::class);
});