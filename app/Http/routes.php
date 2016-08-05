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


Route::group(['domain' => config('project.app_domain'), 'as' => 'web.', 'middleware' => 'web'], function() {
    /*
    Route::get('/', [
        'as'   => 'reset.store',
        'uses' => 'PasswordsController@postReset',
    ]);
    */
    //Top page
    Route::auth();
    Route::get('/', [
        'as'   => 'home.index',
        'uses' => 'HomeController@index',
    ]);
    
    //Change language
    Route::get('locale', [
        'as'   => 'home.locale',
        'uses' => 'HomeController@locale',
    ]);
    
    //Social Login
    Route::get('social/{provider}', [
        'as'   => 'social.login',
        'uses' => 'SocialController@execute',
    ]);
});



Route::group(['domain' => config('project.api_domain'), 'as' => 'api.', 'namespace' => 'Api' , 'middleware' => 'cors'], function() {

    //Route::resource('photo', 'PhotoController');

    Route::group(['prefix' => 'v1', 'namespace' => 'V1'], function() {
        
         Route::resource('users', 'UsersController', ['only' => ['index']]);
        
        
        //Route::resource('photo', 'PhotoController', ['except' => ['create', 'edit']]);
        
        /* Session.
         * In API, logout path is not required. Because,
         * when token is expired, any API request will not be validated.
         */
        Route::get('auth/login', [
            'as'   => 'session.store',
            'uses' => 'SessionController@store'
        ]);
        Route::post('auth/refresh', [
            'as'   => 'session.refresh',
            'uses' => 'SessionController@refresh'
        ]);
    });
    /*
    Route::group(['prefix' => 'v2'], function() {
        Route::get('/', function () {
            return 'v2 입니당';
        });
    });
    */
});