<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


//Route::get('/', 'HomeController@index')->name('home');//DC 3 nov 2020

Route::get('formClaveUsuario', 'PersonaController@formPassword')->name('usuario.cambio');
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'EvaluacionController@index')->name('home');

Route::get('/', function(){
    return view('auth.login');
});

Route::get('showTest/{id}', 'EvaluacionController@showTest');


Route::get('preguntasEvaluacionB4L/{slug}', 'EvaluacionB4LController@preguntasEvaluacionB4L');
Route::get('guardarPreguntaLaboralB4L/{respuesta}/{pregunta_slug}', 'EvaluacionB4LController@guardarPreguntaLaboralB4L');
Route::get('guardarDescriptoresB4L/{respuesta}/{pregunta_slug}', 'EvaluacionB4LController@guardarDescriptoresB4L');

Route::get('preguntasEvaluacion/{slug}', 'EvaluacionController@preguntasEvaluacion')->name('preguntasevaluacion');
Route::get('guardarPreguntaLaboral/{respuesta}/{pregunta_slug}', 'EvaluacionController@guardarPreguntaLaboral');

Route::get('guardarFrases/{respuesta}/{pregunta_slug}', 'EvaluacionController@guardarFrases');
Route::get('aceptarFrases/{respuesta}/{pregunta_slug}', 'EvaluacionController@aceptarFrases');
Route::get('guardarFrasesFavoritas/{respuesta}/{pregunta_slug}', 'EvaluacionController@guardarFrasesFavoritas');
Route::get('retornarFrase/{respuesta}/{pregunta_slug}', 'EvaluacionController@retornarFrase');

Route::get('guardarDescriptores/{respuesta}/{pregunta_slug}', 'EvaluacionController@guardarDescriptores');
Route::get('guardarDescriptorFavorito/{respuesta}/{pregunta_slug}', 'EvaluacionController@guardarDescriptorFavorito');
Route::get('guardarAficiones/{respuesta}/{pregunta_slug}', 'EvaluacionController@guardarAficiones');
Route::get('guardarAficionFavorita/{respuesta}/{pregunta_slug}', 'EvaluacionController@guardarAficionFavorita');
Route::get('guardarAficionRegular/{respuesta}/{pregunta_slug}', 'EvaluacionController@guardarAficionRegular');
Route::get('guardarAtributo/{respuesta}/{pregunta_slug}/{pareja}', 'EvaluacionController@guardarAtributo');
Route::get('guardarPregunta/{respuesta}/{pregunta_slug}', 'EvaluacionController@guardarPregunta');
Route::get('guardarForma/{respuesta}/{pregunta_slug}/{pareja}', 'EvaluacionController@guardarForma');
Route::get('guardarCarrera/{idEvaluacion}/{idCarrera}', 'EvaluacionController@guardarCarrera');

Route::get('guardarProfesion/{slugEvaluacion}/{idProfesion}', 'EvaluacionController@guardarProfesion');

Route::get('preguntaZurdo/{slug}', 'EvaluacionController@preguntaZurdo')->name('evaluacion.preguntazurdo');
Route::get('preguntaDiestro/{slug}', 'EvaluacionController@preguntaDiestro')->name('evaluacion.preguntadiestro');

Route::post('claveUsuario', 'PersonaController@cambioPassword')->name('usuario.clave');



Route::resource('usuario', 'UsuarioController');
Route::resource('persona', 'PersonaController');
Route::resource('evaluacion', 'EvaluacionController');
Route::resource('evaluacionB4L', 'EvaluacionB4LController');


//Auth::routes();
Auth::routes([

    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
  ]);



