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
Route::get('/update/{user}', 'UserController@update');
Route::post('/update/{user}/done', 'UserController@store');
Route::get('/home', 'IndexController@showIndex');
Route::get('/annonces/create', 'AnnonceController@create')->name('annonces.create');
Route::post('/annonces/create', 'AnnonceController@store')->name('store.annonces');
Route::get('/annonces/all', 'AnnonceController@index');
Route::get('/logout','UserController@logout');