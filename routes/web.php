<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PlaylistController;

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
Route::get('/login', [CustomAuthController::class,'login'])->middleware('alreadyLoggedIn');
Route::get('/registration', [CustomAuthController::class,'registration'])->middleware('alreadyLoggedIn');
Route::post('/register-user', [CustomAuthController::class,'registerUser'])->name('register-user');
Route::post('/login-user', [CustomAuthController::class,'loginUser'])->name('login-user');
Route::get('/dashboard', [CustomAuthController::class,'dashboard'])->middleware('isLoggedIn');
Route::get('/logout', [CustomAuthController::class,'logout']);
Route::get('/playlists',[PlaylistController::class,'playListsIndex'])->middleware('isLoggedIn');
Route::get('/genre', [GenreController::class,'index'])->middleware('isLoggedIn');
Route::get('/song/{id}', 'App\Http\Controllers\SongController@index');
Route::post('add-playlist', [PlaylistController::class, 'createPlayList']);
Route::post('add-Song', [PlaylistController::class, 'addSong']);
Route::get('delete-Playlist/{id}', 'App\Http\Controllers\PlaylistController@deletePlaylist');
Route::get('delete-Playlist-song/{id}/{list}', 'App\Http\Controllers\PlaylistController@deletePlaylistSong');
Route::get('delete-Playlists/{list}', 'App\Http\Controllers\PlaylistController@deleteList');
Route::post('update-Playlists', 'App\Http\Controllers\PlaylistController@updateList');
Route::post('add-Song-to-playlist', 'App\Http\Controllers\PlaylistController@addSongToPlaylist');
Route::get('calculate/{id}', 'App\Http\Controllers\PlaylistController@calculateDuration');
Route::post('save-Playlist', 'App\Http\Controllers\PlaylistController@savePlaylist');