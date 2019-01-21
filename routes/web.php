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
Route::get('/data-connect', 'dataController@data_connect');
Route::POST('/new_data', 'dataController@new_data');
Route::post('/data', 'dataController@manual_connect');
Route::get('/destroy-data', 'dataController@destroy');
