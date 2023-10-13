<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/check', [Controller::class, 'check']);
Route::get('/CheckTrack/{id}', [Controller::class, 'CheckTrack']);
Route::get('/SaveTrack', [Controller::class, 'SaveTrack']);
