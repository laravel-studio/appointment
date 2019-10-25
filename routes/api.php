<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'Api\AuthController@register');
Route::post('login', 'Api\AuthController@login');
Route::post('forgetpassword', 'Api\AuthController@forgetpassword');
Route::group([
    'middleware' => 'jwt.auth',
    'prefix' => 'auth'

], function ($router) {
    Route::post('logout', 'Api\AuthController@logout');
    Route::post('refresh', 'Api\AuthController@refresh');
    Route::post('me', 'Api\AuthController@me');
    Route::get('listuserbytype','Api\UsersController@listuserbytype');
    /*==================role start here================*/ 
    Route::get('rolelist','Api\RolesController@index');
    Route::post('addrole','Api\RolesController@addrole');
    Route::post('editrole/{id}','Api\RolesController@editrole');
    Route::delete('deleterole/{id}','Api\RolesController@deleterole');
 	/*==================role end here==================*/ 

    /*==================service start here================*/ 
    Route::get('serviceslist','Api\ServicesController@serviceslist');
    Route::post('addservice','Api\ServicesController@addservice');
    Route::post('editservice/{id}','Api\ServicesController@editservice');
    Route::delete('deleteservice/{id}','Api\ServicesController@deleteservice');
    /*==================service end here==================*/ 

    /*==================slots start here================*/ 
	Route::get('listslots','Api\SlotsController@listslots');
	Route::post('addslot','Api\SlotsController@addslot');
	Route::post('editslots/{id}','Api\SlotsController@editslots');
	Route::delete('deleteslots/{id}','Api\SlotsController@deleteslots');
    /*==================slots end here==================*/ 
    /*=====List of Employees assigned with services=====*/ 
    Route::get('listemployeewithservices','Api\EmployeeservicesController@listemployeewithservices');
    Route::post('assignemployeewithservices','Api\EmployeeservicesController@assignemployeewithservices');
    /*=====List of Employees assigned with services end=====*/
    Route::post('addemployeebyadmin','Api\EmployeesController@addemployeebyadmin');
    Route::delete('deleteusers/{id}','Api\EmployeesController@deleteusers');
});




