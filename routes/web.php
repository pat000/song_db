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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/jobs', 'JobsController@index')->name('jobs');
Route::get('/jobs/rawdata', 'JobsController@rawdata')->name('jobs.rawdata');
Route::post('/jobs/addJobs', 'JobsController@addJobs')->name('jobs.addJobs');
Route::post('/jobs/updateJobs', 'JobsController@updateJobs')->name('jobs.updateJobs');
Route::post('/jobs/deleteJob', 'JobsController@deleteJob')->name('jobs.deleteJob');

Route::get('/applicants', 'ApplicantsController@index')->name('applicants');
Route::get('/applicants/rawdata', 'ApplicantsController@rawdata')->name('applicants.rawdata');



Route::get('/logout', 'Auth\LoginController@logout');

Route::post('/applicants', 'ApplicationsController@applicants')->name('applicants');



