<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


//resourses de carro
Route::resource('profesores', 'ProfesorController');
Route::post('/profesor/actualizar/{id}', 'ProfesorController@update');
//resourses de agencia
Route::resource('cursos', 'CursoController');
Route::post('/curso/actualizar/{id}', 'CursoController@update');

//resourses de agencia
Route::resource('grupos', 'GrupoController');
Route::post('/agencia/actualizar/{id}', 'AgenciaController@update');

Route::auth();

Route::get('/home', 'HomeController@index');
