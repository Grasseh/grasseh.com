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
    return view('site.index');
});
Route::get('/projects', function () {
    return view('site.projects');
});
Route::get('/competitions', function () {
    return view('site.competitions');
});
Route::get('/logparser', function () {
    return view('projects.logparser');
});
Route::get('blog', 'Blog\BlogController@index');
Route::get('blog/{id}-{title}', 'Blog\BlogController@show', 'notes.login');
Route::get('notes', ['uses' => 'Notes\NotesController@index', 'as' => 'notes.index']);
Route::post('notes', ['uses' => 'Notes\NotesController@login', 'as' => 'notes.login']);
Route::get('notes/{dir}', 'Notes\NotesController@class');
Route::post('notes/{dir}', ['uses' => 'Notes\NotesController@postFile', 'as' => 'notes.addFile']);
Route::get('notes/{dir}/{file}', 'Notes\NotesController@file');
