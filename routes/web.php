<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WoordController;
use App\Http\Controllers\ThemaController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/words', [WoordController::class, 'index'])->name('home');
    Route::get('/words/create', [WoordController::class, 'create'])->name('words.create');
    Route::post('/words', [WoordController::class, 'store'])->name('words.store');
    Route::get('/words/{id}/edit', [WoordController::class, 'edit'])->name('words.edit');
    Route::put('/words/{id}', [WoordController::class, 'update'])->name('words.update');
    Route::delete('/words/{id}', [WoordController::class, 'destroy'])->name('words.destroy');

    Route::resource('themas', ThemaController::class);
    Route::get('/themas/', [ThemaController::class, 'index'])->name('themas');
    Route::get('/themas/create', [ThemaController::class, 'create'])->name('themas.create');
    Route::post('/themas', [ThemaController::class, 'store'])->name('themas.store');
    Route::get('/themas/{id}/edit', [ThemaController::class, 'edit'])->name('themas.edit');
    Route::put('/themas/{id}', [ThemaController::class, 'update'])->name('themas.update');
    Route::delete('/themas/{id}', [ThemaController::class, 'destroy'])->name('themas.destroy');

});
