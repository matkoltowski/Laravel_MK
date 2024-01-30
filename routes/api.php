<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeopleCOntroller;

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

Route::post('/people', [PeopleCOntroller::class, 'store']);
Route::get('/people/{id}', [PeopleCOntroller::class, 'show']);
Route::put('/people/{id}', [PeopleCOntroller::class, 'update']);
Route::delete('/people/{id}', [PeopleCOntroller::class, 'destroy']);
Route::get('/people', [PeopleCOntroller::class, 'index']);