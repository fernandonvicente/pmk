<?php

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/home', 'Site\HomeController@index');


Route::get('/', 'Site\HomeController@index');
Route::get('', 'Site\HomeController@index');


Route::get('/consultCep/{cep}', ['as' => 'consultCep', 'uses' =>  'All\ConsultCepController@consultCep']);

Route::get('/getCities/{idState}', ['as' => 'getCities', 'uses' =>  'Site\CityController@getCities']);



Route::group(['prefix' => 'pmkadmin', 'namespace' => 'Admin', 'as' => 'admin::', 'middleware' => 'auth'], function() {
     

    Route::get('/', [
        'uses' => 'AdminController@index', 'as' => 'home'
    ]);

    // User
    Route::group(['prefix' => 'user', 'as' => 'user.'], function() {        

        Route::get('/index', 'UserController@index');
        Route::get('/create', 'UserController@create');
        Route::post('/store', 'UserController@store');
        Route::get('/edit/{id}', 'UserController@edit');
        Route::post('/edit/{id}', 'UserController@update');
        Route::get('/update/{user}', 'UserController@update');
        Route::get('/delete/{id}', 'UserController@destroy');
        Route::get('/updateAvatar/{id}', 'UserController@updateAvatar');
        Route::get('/permission', 'UserController@permission');
        Route::get('/permission/role/{role}', 'UserController@permission');
        Route::post('/createProfilePermission', 'UserController@createProfilePermission');

    });


// doador
    Route::group(['prefix' => 'doador', 'as' => 'doador.'], function() {
       
        Route::get('/index', 'DoadorController@indexajax');
        Route::get('/carregaTabela', 'DoadorController@carregaTabela');
        Route::get('/carregaTabelaInformacoes/{clienteId}', 'DoadorController@carregaTabelaInformacoes');
        Route::get('/create', 'DoadorController@create');
        Route::post('/store', 'DoadorController@store');
        Route::get('/edit/{id}', 'DoadorController@edit');
        Route::get('/edit/{id}/{tab}', 'DoadorController@edit');
        Route::post('/edit/{id}', 'DoadorController@update');
        Route::get('/delete/{id}', 'DoadorController@destroy');
       
    }); 



    
});
