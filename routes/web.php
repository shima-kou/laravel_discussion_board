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

Route::get('/board/{id}', 'BoardController@edit')->name('board.edit');
Route::patch('/board/{id}', 'BoardController@update')->name('board.update');

Route::get('/board/delete/{id}', 'BoardController@return');
Route::delete('/board/delete/{id}', 'BoardController@delete')->name('board.delete');

Route::get('/board/like/{id}', 'BoardController@like')->name('board.like');
Route::get('/board/unlike/{id}', 'BoardController@unlike')->name('board.unlike');
