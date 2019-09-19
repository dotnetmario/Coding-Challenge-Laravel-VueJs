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


// update password
Route::get('/update-password', array('as' => 'update-password', 'uses' => 'UsersController@changePassword'));
Route::post('/update-password', array('as' => 'update-password', 'uses' => 'UsersController@changePassword'));

// add an item
Route::get('/add-item', array('as' => 'add-item', 'uses' => 'ItemsController@addItem'));
Route::post('/add-item', array('as' => 'add-item', 'uses' => 'ItemsController@addItem'));

// load items
Route::get('/load-item', array('as' => 'load-item', 'uses' => 'ItemsController@loadItems'));
