<?php




Route::get('modul1','modul1Controller@show');

Route::post('modul1','modul1Controller@store');

Route::get('modul2','modul2Controller@show');

Route::get('punctaje','PunctajeController@punctaje');

Route::get('modul3','PunctajeController@modul3');

Route::get('editare','PunctajeController@editare');

Route::get('home','PunctajeController@home');

Route::post('pages','PunctajeController@store');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);