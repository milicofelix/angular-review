<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* Clients */

Route::get('clientes', 'ClientController@index')->name('client.all');
Route::get('cliente/{id}', 'ClientController@show')->name('client.show');
Route::delete('cliente/delete/{id}', 'ClientController@destroy')->name('client.destroy');
Route::put('cliente/update/{id}', 'ClientController@update')->name('client.update');
Route::post('clientes/store', 'ClientController@store')->name('client.store');

/* Project */

Route::get('projetos', 'ProjectController@index')->name('project.all');
Route::get('projeto/{id}', 'ProjectController@show')->name('project.show');
Route::post('projeto/store', 'ProjectController@store')->name('project.store');
Route::put('projeto/update/{id}', 'ProjectController@update')->name('project.update');
Route::delete('projeto/delete/{id}', 'ProjectController@destroy')->name('project.destroy');

/* Project Note */

Route::get('project/{id}/note', 'ProjectNoteController@index')->name('note.all');
Route::get('project/{id}/note/{note_id}', 'ProjectNoteController@show')->name('note.show');
Route::post('project/{id}/store', 'ProjectNoteController@store')->name('note.store');
Route::put('project/{id}/note/update/{node_id}', 'ProjectNoteController@update')->name('note.update');
Route::delete('project/{id}/note/delete/{node_id}', 'ProjectNoteController@destroy')->name('client.destroy');

Route::resource('project/{id}/file', 'ProjectFileController');

//Route::post('project/{id}/file', 'ProjectFileController@store')->name('project.file');
