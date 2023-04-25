<?php

use App\Http\Controllers\ClipController;
use App\Http\Controllers\MarkerController;
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

Route::get('/', function () {
    return view('index');
});

Route::get('/markers', [MarkerController::class, 'get_all_markers']);
Route::get('/markers/game/{gameId}', [MarkerController::class, 'getMarkersByGame']);

Route::get('/clips', [ClipController::class, 'get_all_clips']);
