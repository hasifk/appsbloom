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
       /*Route::post('areainterest', 'Auth\IndexController@areainterest');
       Route::get('apptype', 'ClientDashboard\AppsController@apptype');
       Route::post('storeapptype', 'ClientDashboard\AppsController@storeapptype');
       Route::get('appinfo', 'ClientDashboard\AppsController@appinfo');
       Route::post('storeappinfo', 'ClientDashboard\AppsController@storeappinfo');*/
       
       Route::get('manageabout', 'ClientDashboard\AboutController@manageabout');
       Route::post('saveabout', 'ClientDashboard\AboutController@saveabout');
      
       Route::get('manageservices', 'ClientDashboard\ServicesController@manageservices');
       Route::post('saveservice', 'ClientDashboard\ServicesController@saveservice');
       Route::get('editservice/{id}', 'ClientDashboard\ServicesController@editservice');
       Route::post('updateservice', 'ClientDashboard\ServicesController@updateservice');
       Route::get('deleteservice/{id}', 'ClientDashboard\ServicesController@deleteservice');
       
       Route::get('managecontact', 'ClientDashboard\ContactController@managecontact');
       Route::post('savecontact', 'ClientDashboard\ContactController@savecontact');

       Route::get('manageschedule', 'ClientDashboard\ScheduleController@manageschedule');
       Route::post('saveschedule', 'ClientDashboard\ScheduleController@saveschedule');

       Route::get('manageloyalty', 'ClientDashboard\LoyaltyController@manageloyalty');
       Route::post('saveloyalty', 'ClientDashboard\LoyaltyController@saveloyalty');
       Route::get('editloyalty/{id}', 'ClientDashboard\LoyaltyController@editloyalty');
       Route::post('updateloyalty', 'ClientDashboard\LoyaltyController@updateloyalty');
       Route::get('deleteloyalty/{id}', 'ClientDashboard\LoyaltyController@deleteloyalty');

       Route::get('manageevents', 'ClientDashboard\EventsController@manageevents');
       Route::post('saveevent', 'ClientDashboard\EventsController@saveevent');
       Route::get('editevent/{id}', 'ClientDashboard\EventsController@editevent');
       Route::post('updateevent', 'ClientDashboard\EventsController@updateevent');
       Route::get('deleteevent/{id}', 'ClientDashboard\EventsController@deleteevent');

       Route::get('managelanguages', 'ClientDashboard\LanguagesController@managelanguages');
       Route::post('savelanguage', 'ClientDashboard\LanguagesController@savelanguage');
       Route::get('editlanguage/{id}', 'ClientDashboard\LanguagesController@editlanguage');
       Route::post('updatelanguage', 'ClientDashboard\LanguagesController@updatelanguage');
       Route::get('deletelanguage/{id}', 'ClientDashboard\LanguagesController@deletelanguage');

       Route::get('managelangkeys','ClientDashboard\LangkeyController@managelangkeys');
       Route::post('savelangkey', 'ClientDashboard\LangkeyController@savelangkey');
       Route::get('editlangkey/{id}', 'ClientDashboard\LangkeyController@editlangkey');
       Route::post('updatelangkey', 'ClientDashboard\LangkeyController@updatelangkey');
       Route::get('deletelangkey/{id}', 'ClientDashboard\LangkeyController@deletelangkey');



       Route::get('manageanalytics','ClientDashboard\AnalyticsController@manageanalytics');
       
});
