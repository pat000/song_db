<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/songs', 'SongsController@index')->name('songs');
Route::get('/songs/rawdata', 'SongsController@rawdata')->name('songs.rawdata');
Route::post('/songs/addSongs', 'SongsController@addSongs')->name('songs.addSongs');
Route::post('/songs/updateSongs', 'SongsController@updateSongs')->name('songs.updateSongs');
Route::post('/songs/deleteSong', 'SongsController@deleteSong')->name('songs.deleteSong');




