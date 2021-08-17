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
Route::get('/', 'BoardController@index')->name('home');

Route::get('/board', 'BoardController@add')->name('board.add');
Route::post('/board', 'BoardController@store')->name('board.store');

Route::get('/board/{id}', 'BoardController@edit');
Route::patch('/board/{id}', 'BoardController@update');

Route::get('/board/delete/{id}', 'BoardController@return');
Route::delete('/board/delete/{id}', 'BoardController@delete');
