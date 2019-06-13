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
    return view('welcome');
});

Auth::routes();
// Carreras
Route::get('/home', 'CarreraController@registrosasignados');
Route::get('/Carre', 'CarreraController@index');

Route::get('/carrera', 'CarreraController@create');
Route::post('/carrera', 'CarreraController@store');

Route::get('/carrera_{id}', 'CarreraController@edit');
Route::post('/carrera_{id}', 'CarreraController@update');

Route::get('/carrera/{id}/eliminar', 'CarreraController@destroy');
//asignaciones
Route::get('/asignarmateria_{id}', 'CarreraController@asignacionmateria');
Route::post('/asignarmateria_{id}', 'CarreraController@actualizacionmateria');
Route::get('/asignaraula_{id}', 'CarreraController@asignacionaula');
Route::post('/asignaraula_{id}', 'CarreraController@actualizacionaula');
Route::get('/asignarhorario_{id}', 'CarreraController@asignacionhorario');
Route::post('/asignarhorario_{id}', 'CarreraController@actualizacionhorario');

// materias
Route::get('/materia', 'MateriaController@index');

Route::get('/crear_materia', 'MateriaController@create');
Route::post('/crear_materia', 'MateriaController@store');

Route::get('/materia_{id}', 'MateriaController@edit');
Route::post('/materia_{id}', 'MateriaController@update');

Route::get('/materia/{id}/eliminar', 'MateriaController@destroy');

//aulas

Route::get('/aula', 'AulaController@index');

Route::get('/crear_aula', 'AulaController@create');
Route::post('/crear_aula', 'AulaController@store');

Route::get('/aula_{id}', 'AulaController@edit');
Route::post('/aula_{id}', 'AulaController@update');

Route::get('/aula/{id}/eliminar', 'AulaController@destroy');

//horarios
Route::get('/horario', 'HorarioController@index');

Route::get('/crear_horario', 'HorarioController@create');
Route::post('/crear_horario', 'HorarioController@store');

Route::get('/horario_{id}', 'HorarioController@edit');
Route::post('/horario_{id}', 'HorarioController@update');

Route::get('/horario/{id}/eliminar', 'HorarioController@destroy');
