<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiThemaController;
use App\Http\Controllers\Api\ApiWoordController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::middleware(['auth:sanctum'])->group(function () {



// });
Route::get('/woorden', [ApiWoordController::class, 'index']);
Route::get('/woorden/{id}', [ApiWoordController::class, 'show']);
Route::get('/woorden/thema/{themaId}', [ApiWoordController::class, 'getWordsByThema']);

Route::get('/themas', [ApiThemaController::class, 'index']);
Route::get('/themas/{id}', [ApiThemaController::class, 'show']);