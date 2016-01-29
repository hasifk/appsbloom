<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

    Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {
    return view('clientadmin.signup');
    });


   	Route::post('registerme', 'Auth\IndexController@register');

   	
    Route::get('login', 'Auth\IndexController@login');
    Route::post('tologin', 'Auth\IndexController@tologin');
    });




/*********************************************************************************************************************/
    Route::group(['middleware' => ['web','auth']], function () {

       Route::get('success', 'Auth\IndexController@success');
       Route::get('logout', 'Auth\IndexController@logout');
       Route::post('areainterest', 'Auth\IndexController@areainterest');
       Route::get('apptype', 'ClientDashboard\AppsController@apptype');
       Route::post('storeapptype', 'ClientDashboard\AppsController@storeapptype');
       Route::get('appinfo', 'ClientDashboard\AppsController@appinfo');
       Route::post('storeappinfo', 'ClientDashboard\AppsController@storeappinfo');
       
});
