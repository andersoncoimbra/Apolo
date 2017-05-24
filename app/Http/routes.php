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
    return redirect()->action('HomeController@index');
});


Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['prefix'=>'api'], function (){
    Route::get('{id}/all',['uses'=>'CadastroController@allregistros']);
    Route::post('temp',['uses'=>'CadastroController@registro']);
});

