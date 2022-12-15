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
Route::get('/create', 'CrudsController@create');
Route::post('/store', 'CrudsController@store');
Route::get('/show','CrudsController@index');
Route::get('/new', 'CrudsController@new');
Route::post('/add', 'CrudsController@add');
Route::delete('/delete/{id}','CrudsController@destroy');
Route::get('/edit/{id}','CrudsController@edit');
Route::any('/update/{id}', 'CrudsController@update');
Route::get('/login', 'CrudsController@login');
Route::any('/loginverify', 'CrudsController@loginverify');
Route::any('/logout', 'CrudsController@logout');
















