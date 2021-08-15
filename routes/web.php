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
Route::post('/board', 'BoardController@create')->name('board.create');

Route::get('/board/edit', 'BoardController@return');
Route::post('/board/edit', 'BoardController@edit')->name('board.edit');
Route::patch('/board/edit', 'BoardController@update')->name('board.update');

Route::get('/board/delete', 'BoardController@return');
Route::delete('/board/delete', 'BoardController@delete')->name('board.delete');
