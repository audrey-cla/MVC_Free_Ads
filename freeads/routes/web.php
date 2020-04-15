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
Route::get('/index', 'IndexController@showIndex');
Route::get('/update/{user}', 'UserController@update');
Route::post('/update/{user}/done', 'UserController@store');
Route::get('/home', 'IndexController@showIndex');

Route::get('/annonces/create', 'AnnonceController@create')->name('annonces.create');
Route::get('/annonces/user/{id}', 'AnnonceController@usercreated');

Route::post('/annonces/create', 'AnnonceController@store')->name('store.annonces');
Route::get('/annonces/update/{user}', 'AnnonceController@showupdate');
Route::post('/annonces/update/{user}/done', 'AnnonceController@update');

Route::get('/annonces/all', 'AnnonceController@index')->name('annonces.index');
Route::get('annonces', 'AnnonceController@index');


Route::get('/logout','UserController@logout');
Route::get('/annonces/delete/{id}', 'AnnonceController@deletepage');
Route::post('/annonces/delete/{id}', 'AnnonceController@delete')->name('delete.annonces');

