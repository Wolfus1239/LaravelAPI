<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/albums', [Controller::class, 'CheckAlbums']);
Route::get('/SaveAlbums', [Controller::class, 'SaveAlbums']);
Route::get('/albums/track_in_album/{id}', [Controller::class, 'TrackInAlbum']);
Route::get('/FoundTrack', [Controller::class, 'FoundTrack']);
Route::get('/SaveTrack', [Controller::class, 'SaveTrack']);
Route::get('/CheckTrack/{id}', [Controller::class, 'CheckTrack']);
