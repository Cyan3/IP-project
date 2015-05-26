<?php




Route::get('modul1',['middleware' => 'auth','uses' => 'modul1Controller@show']);

Route::post('modul1',['middleware' => 'auth','uses' => 'modul1Controller@store']);

Route::get('modul2',['middleware' => 'auth','uses' => 'modul2Controller@show']);

Route::post('modul2',['middleware' => 'auth','uses' => 'modul2Controller@showOutput']);

Route::get('modul2output',['middleware' => 'auth','uses' => 'modul2Controller@showOutput']);

Route::get('punctaje',['middleware' => 'auth','uses' => 'PunctajeController@punctaje']);

Route::get('modul3',['middleware' => 'auth','uses' => 'PunctajeController@modul3']);

Route::get('editare',['middleware' => 'auth','uses' => 'PunctajeController@editare']);

Route::get('home',['middleware' => 'auth','uses' => 'PunctajeController@home']);

Route::post('pages',['middleware' => 'auth','uses' => 'PunctajeController@store']);

Route::post('modul3',['middleware' => 'auth','uses' => 'modul3Controller@redirectModul3']);
Route::get('modul3Compiled',['middleware' => 'auth','uses' => 'modul3Controller@displayPoints']);
Route::post('modul3Compiled',['middleware' => 'auth','uses' => 'modul3Controller@redirectModul4']);
Route::get('modul4',['middleware' => 'auth','uses' => 'modul4Controller@showResults']);
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);