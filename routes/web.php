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

Route::get('/', array('as' => 'auth.login', 'uses' => 'AuthController@login'));




Route::group(['middleware'=>['web']],function(){
    Route::group(['prefix' => 'auth'], function (){

        Route::get('login',array('as' => 'auth.login', 'uses' => 'AuthController@login'));
        Route::post('login',array('as' => 'login.attempt', 'uses' => 'AuthController@attempt'));


        Route::get('register',array('as' => 'auth.register', 'uses' => 'AuthController@register'));
        Route::post('register',array('as' => 'register.create', 'uses' => 'AuthController@create'));


        Route::post('logout',array('as'=>'auth.logout', 'uses'=>'AuthController@logout'));



    });

    Route::group(['prefix' => 'dashboard','middleware'=>'auth'],function (){
        Route::get('/',array('as' => 'dashboard', 'uses' => 'DashboardController@index'));


    });



    Route::get('perfil',array('as'=>'perfil', 'uses'=>'AuthController@perfil'));



    Route::get('publicacoes/tv','PublicacaoController@createTV')->name('PublicacaoCreateTV');
    Route::get('publicacoes/site','PublicacaoController@createSite')->name('PublicacaoCreateSite');



    Route::resource('coordenacoes','CoordenacaoController');
    Route::resource('usuarios','UserController');
    Route::resource('publicacoes','PublicacaoController');


    Route::get('publicacoes/desativar/{id}','PublicacaoController@desativar')->name('PublicacaoDesativar');
    Route::get('publicacoes/publicar/{id}','PublicacaoController@publicar')->name('PublicacaoPublicar');






    Route::get('/tv',array('as' => 'dashboard', 'uses' => 'DashboardController@tv'));





});

