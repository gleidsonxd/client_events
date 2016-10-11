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
    return view('/mlogin');
});
Route::get('/index', 'HomeController@index');
Route::get('/noadmin', 'HomeController@noadmin');
Route::get('feed','EventosController@feed');
Route::get('/mlogin', function () {
    return view('mlogin');
});

Route::get('/sair','UsuariosController@logout');

Route::post('/login','UsuariosController@login');

// Route::auth();

//Rotas Eventoss MODIFICAR
Route::get('form_evento','EventosController@form');

Route::post('editar_evento', 'EventosController@edit');


Route::post('eventos','EventosController@create');
Route::get('eventos','EventosController@listAll');
Route::get('eventos/{id}','EventosController@read');
Route::put('eventos/{id}','EventosController@update');
Route::delete('eventos/{id}','EventosController@delete');


//Rotas servicos
Route::get('form_servico','ServicosController@form');

Route::post('editar_servico', 'ServicosController@edit');


Route::post('servicos','ServicosController@create');
Route::get('servicos','ServicosController@listAll');
Route::get('servicos/{id}','ServicosController@read');
Route::put('servicos/{id}','ServicosController@update');
Route::delete('servicos/{id}','ServicosController@delete');

//Rotas Usuarios MODIFICAR
Route::get('form_usuario','UsuariosController@form');
Route::post('editar_usuario', 'UsuariosController@edit');


Route::post('usuarios','UsuariosController@create');
Route::get('usuarios','UsuariosController@listAll');
Route::get('usuarios/{id}','UsuariosController@read');
Route::put('usuarios/{id}','UsuariosController@update');
Route::delete('usuarios/{id}','UsuariosController@delete');

//Rotas coords
Route::get('form_coord', 'CoordsController@form');
Route::post('editar_coord', 'CoordsController@edit');


Route::post('coords','CoordsController@create');
Route::get('coords','CoordsController@listAll');
Route::get('coords/{id}','CoordsController@read');
Route::put('coords/{id}','CoordsController@update');
Route::delete('coords/{id}','CoordsController@delete');

//Rotas Lugars
Route::get('form_lugar', 'LugarsController@form');
Route::post('editar_lugar', 'LugarsController@edit');


Route::post('lugars','LugarsController@create');
Route::get('lugars','LugarsController@listAll');
Route::get('lugars/{id}','LugarsController@read');
Route::put('lugars/{id}','LugarsController@update');
Route::delete('lugars/{id}','LugarsController@delete');


// //---------------------------------------Middleware
// Route::group(['middleware'=>'web'], function(){
// 	Route::auth();
// 	Route::get('/', function () {
//    	 return view('welcome');
// 	});
// 	Route::get('/home', 'HomeController@index');
// });