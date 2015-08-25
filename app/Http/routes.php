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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('medicos', ['as' => 'medicos.index', 'uses' => 'MedicoController@index']);
Route::get('medicos/create', ['as' => 'medicos.create', 'uses' => 'MedicoController@create']);
Route::post('medicos', ['as' => 'medicos.save', 'uses' => 'MedicoController@save']);
Route::get('medicos/{id}/edit', ['as' => 'medicos.edit', 'uses' => 'MedicoController@edit']);
Route::put('medicos/{id}', ['as' => 'medicos.update', 'uses' => 'MedicoController@update']);
Route::delete('medicos/{id}', ['as' => 'medicos.destroy', 'uses' => 'MedicoController@destroy']);
Route::get('medicos/pdf', ['as' => 'medicos.pdf', 'uses' => 'MedicoController@pdf']);


//buscas
Route::get('medicos/busca/', ['as' => 'medicos.busca', 'uses' => 'MedicoController@busca']);
Route::get('pacientes/busca/', ['as' => 'pacientes.busca', 'uses' => 'PacienteController@busca']);
Route::get('pacientes/busca-ajax', ['as' => 'pacientes.buscaAjax', 'uses' => 'PacienteController@buscaAjax']);


//tcles
Route::get('tcles/busca/', ['as' => 'tcles.busca', 'uses' => 'TCLEController@busca']);

//estados
Route::get('estados', function(){
    return \App\Estado::all(['id', 'nome', 'sigla']);
});

//resources controllers

Route::resource('pacientes', 'PacienteController');
Route::resource('tcles', 'TCLEController');



//jasper reports
Route::get('/reporting', ['uses' =>'ReportController@index', 'as' => 'Report']);
Route::post('/reporting', ['uses' =>'ReportController@post']);



//angular test
Route::get('lista-pacientes', 'HomeController@listaPacientes');
