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
    return view('home');
});
//Route::view('book', 'book');

//Route::view('display', 'display');

Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/search', 'ContactsController@search');
Route::get('/sortByName', 'ContactsController@sortByName');
Route::get('/sortByNumber', 'ContactsController@sortByNumber');
Route::resource('contacts', 'ContactsController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


