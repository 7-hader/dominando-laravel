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

// App\User::create([
// 	'name' => '',
// 	'email' => '@laravel.dev',
// 	'password' => bcrypt('12345'),
// 	'role_id' => 1
// ]);

Route::get('roles', function(){
	// return \App\Role::all();
	return \App\Role::with('users')->get();
});

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);

// Route::post('contacto', 'PagesController@mensajes');

Route::get('saludos/{nombre?}', ['as' => 'saludos', 'uses' => 'PagesController@saludo'])->where('nombre', "[A-Za-z]+");

// -----------------------------------------------------------------------------------------
Route::resource('mensajes', 'MessagesController');

Route::resource('usuarios', 'UsersController');

Route::get('login', 'Auth\LoginController@showLoginForm');
// Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);

Route::post('login', 'Auth\LoginController@login');

Route::get('logout', 'Auth\LoginController@logout');

// Route::get('/mensajes', ['as' => 'mensajes.index', 'uses' => 'MessagesController@index']);

// Route::get('/mensajes/create', ['as' => 'mensajes.create', 'uses' => 'MessagesController@create']);

// Route::post('/mensajes', ['as' => 'mensajes.store', 'uses' => 'MessagesController@store']);

// Route::get('/mensajes/{id}', ['as' => 'mensajes.show', 'uses' => 'MessagesController@show']);

// Route::get('/mensajes/{id}/edit', ['as' => 'mensajes.edit', 'uses' => 'MessagesController@edit']);

// Route::put('/mensajes/{id}', ['as' => 'mensajes.update', 'uses' => 'MessagesController@update']);

// Route::delete('/mensajes/{id}', ['as' => 'mensajes.destroy', 'uses' => 'MessagesController@destroy']);
