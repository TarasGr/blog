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

Route::get('/template', function () {
    return view('template');
});

Route::get('/list', 'CommentsController@listAction')->name('list');
Route::post('/create', 'CommentsController@createAction')->name('create');
Route::post('/edit/{id}', 'CommentsController@editAction')->name('edit');
Route::get('/delete/{id}', 'CommentsController@deleteAction')->name('delete');
