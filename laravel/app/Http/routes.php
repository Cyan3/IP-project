<?php




Route::get('modul1',['middleware' => 'auth','uses' => 'modul1Controller@show']);

Route::post('modul1',['middleware' => 'auth','uses' => 'modul1Controller@store']);

Route::get('modul2',['middleware' => 'auth','uses' => 'modul2Controller@show']);

Route::get('punctaje',['middleware' => 'auth','uses' => 'PunctajeController@punctaje']);

Route::get('modul3',['middleware' => 'auth','uses' => 'PunctajeController@modul3']);

Route::get('editare',['middleware' => 'auth','uses' => 'PunctajeController@editare']);

Route::get('home',['middleware' => 'auth','uses' => 'PunctajeController@home']);

Route::post('pages',['middleware' => 'auth','uses' => 'PunctajeController@store']);


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);