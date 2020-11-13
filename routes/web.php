<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','PasteController@loadPaste');
Route::post('/','PasteController@myPaste');
Route::post('/insertPaste','PasteController@getData');
Route::get('/Paste/{link}','PasteController@getPage')->name('showPaste');

Route::get('login/{provider}', 'SocialController@redirect');
Route::get('login/{provider}/callback','SocialController@Callback');

Route::post('/register','Auth\RegisterController@create')->name('addUser');
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
