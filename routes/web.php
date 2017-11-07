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

//
//Route::group(['middleware' => 'auth'], function () {
//    //    Route::get('/link1', function ()    {
////        // Uses Auth Middleware
////    });
//
//    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
//    #adminlte_routes
//
//
//    Route::resource('coordenacoes','CoordenacaoController');
//    Route::resource('usuarios','UserController');
//    Route::resource('publicacoes','PublicacaoController');
//
//
//});



Route::group(['middleware'=>['web']],function(){
    Route::group(['prefix' => 'auth'], function (){

        Route::get('login',array('as' => 'auth.login', 'uses' => 'AuthController@login'));
        Route::post('login',array('as' => 'login.attempt', 'uses' => 'AuthController@attempt'));


        Route::get('register',array('as' => 'auth.register', 'uses' => 'AuthController@register'));
        Route::post('register',array('as' => 'register.create', 'uses' => 'AuthController@create'));


//        Route::get('logout',array('as'=>'auth.logout', 'uses'=>'AuthController@logout'));
        Route::post('logout',array('as'=>'auth.logout', 'uses'=>'AuthController@logout'));




//        Route::get('password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
//        Route::post('password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail');
//        Route::get('password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('password.token');
//        Route::post('password/reset', 'Admin\ResetPasswordController@reset');

    });

    Route::group(['prefix' => 'dashboard','middleware'=>'auth'],function (){
        Route::get('/',array('as' => 'dashboard', 'uses' => 'DashboardController@index'));



    });




    Route::resource('coordenacoes','CoordenacaoController');
    Route::resource('usuarios','UserController');
    Route::resource('publicacoes','PublicacaoController');


    Route::get('publicacoes/desativar/{id}','PublicacaoController@desativar')->name('PublicacaoDesativar');
    Route::get('publicacoes/publicar/{id}','PublicacaoController@publicar')->name('PublicacaoPublicar');

//    Route::get('perfil',array('as'=>'perfil', 'uses'=>'AuthController@perfil'));




});

