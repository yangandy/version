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

Route::get('/home', 'HomeController@index');

Route::get('/index','MainController@index');
Route::get('/newpart','LoadController@newpart');
Route::get('/newdll','LoadController@newdll');
Route::post('/savedll','LoadController@savedll');
Route::post('/savepart','LoadController@savepart');
Route::any('/partdetail/{id}','MainController@partdetail');
Route::any('/del/{id}','LoadController@delpart');
Route::any('/deldll/{id}','LoadController@deldll');
Route::get('/dll','LoadController@alldll');
Route::get('/back',function () {
    return view('main.back');
});