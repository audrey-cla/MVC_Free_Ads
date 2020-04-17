<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Auth::routes(['verify' => true]);
Route::get('/', 'IndexController@showIndex');
Route::get('/update/{user}', 'UserController@update')->middleware('auth');
Route::post('/update/{user}', 'UserController@store')->middleware('auth');
Route::get('/home', 'IndexController@showIndex');
Route::get('/dashboard', 'IndexController@showIndex')->middleware('auth');


Route::get('/annonces/create', 'AnnonceController@create')->name('annonces.create')->middleware('auth');
Route::get('/annonces/user/{id}', 'AnnonceController@usercreated')->middleware('auth');

Route::post('/annonces/create', 'AnnonceController@store')->name('store.annonces')->middleware('auth');
Route::get('/annonces/update/{user}', 'AnnonceController@showupdate')->middleware('auth');
Route::post('/annonces/update/{user}', 'AnnonceController@update')->middleware('auth');

Route::get('/annonces/all', 'AnnonceController@index')->name('annonces.index')->middleware('auth');
Route::get('annonces', 'AnnonceController@index')->middleware('auth');

Route::get('messages', 'MessageController@index')->middleware('auth');
Route::get('messages/{id}', 'MessageController@showconv')->middleware('auth');
Route::post('messages/{id}', 'MessageController@store')->middleware('auth');


Route::get('/logout','UserController@logout');
Route::get('/annonces/delete/{id}', 'AnnonceController@deletepage')->middleware('auth');
Route::post('/annonces/delete/{id}', 'AnnonceController@delete')->name('delete.annonces')->middleware('auth');

