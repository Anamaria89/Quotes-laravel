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

//AUTH 

Route::get('/', 'Frontend\IndexController@index')->name('home');

Route::any('/login', 'UsersController@login')->name('login');
Route::get('/register', 'UsersController@create')->name('createuser');
Route::post('/register', 'UsersController@register')->name('register');
Route::any('/logout', 'UsersController@logout')->name('logout');

//END AUTH

//CATEGORIES
Route::get('/categories', 'Frontend\CategoriesController@index')->name('categories.index');
Route::get('/categories/category/{category}', 'Frontend\QuotesController@category')->name('categories.show');
//END CATEGORIES

// QUOTES MODUL START
Route::get('/quotes', 'Frontend\QuotesController@index')->name('quotes.index');
Route::get('/quotes/create', 'Frontend\QuotesController@create')->name('quotes.create');
Route::post('/quotes/store', 'Frontend\QuotesController@store')->name('quotes.store');
Route::get('/quotes/{quote}/edit', 'Frontend\QuotesController@edit')->name('quotes.edit');
Route::post('/quotes/{quote}/edit', 'Frontend\QuotesController@update')->name('quotes.update');
Route::get('/quotes/{quote}/delete', 'Frontend\QuotesController@delete')->name('quotes.delete');
//QUOTES MODUL END





