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

Route::get('/denuncia', function () {

  $denuncia = DB::table('denuncias')->get();

  return view('denuncia', ['denuncia' => $denuncia]);
});

Route::get('/denunciaAprovada', function () {

  $denuncia = DB::table('denuncias')->get();

  return view('denunciaAprovada', ['denuncia' => $denuncia]);
});

Route::get('/denunciaApropriadas', function () {

  $denuncia = DB::table('denuncias')->get();

  return view('denunciaApropriadas', ['denuncia' => $denuncia]);
});

Route::get('/denuncia/create', 'DenunciaController@create');

Route::post('/denuncia', 'DenunciaController@store');

Route::get('/message', function () {

  $message = DB::table('messages')->get();

  return view('message', ['message' => $message]);
});

Route::get('/message/create', 'MessageController@create');

Route::get('/message', 'MessageController@index');

Route::post('/message/store', 'MessageController@store');

Route::get('/admin', function () {

  $user = DB::table('users')->get();

  return view('menuAdmin', ['user' => $user]);
});

Route::get('/admin/changeRole', 'UserController@changeRole');
Route::post('/admin/changeRole/{$role}', 'UserController@changeRole');

Route::get('/perfil', function () {

  $user = DB::table('users')->get();

  return view('perfil', ['user' => $user]);
});

Route::get('/perfil/update', 'UserController@update');
Route::post('/perfil/update', 'UserController@update');

//Route::get('/denuncia/create', function () {
//  return view('novaDenuncia');
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users/delete', 'DenunciaController@destroy');
Route::delete('/users/delete/{id}', array('as' => 'user.destroy','uses' => 'UserController@destroy'));

Route::get('/denuncia/delete', 'DenunciaController@destroy');
Route::delete('/denuncia/delete/{id}', array('as' => 'denuncia.destroy','uses' => 'DenunciaController@destroy'));

Route::get('/denuncia/aprove', 'DenunciaController@aprove');
Route::post('/denuncia/aprove/{id}','DenunciaController@aprove');

Route::get('/denuncia/deaprove', 'DenunciaController@deaprove');
Route::post('/denuncia/deaprove/{id}','DenunciaController@deaprove');

Route::get('/denuncia/takeCharge', 'DenunciaController@takeCharge');
Route::post('/denuncia/takeCharge/{id}','DenunciaController@takeCharge');
