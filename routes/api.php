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


Route::post('/customer/login', 'CustomerController@login');


Route::group([
    'middleware' => 'jwt.auth'
], function ($router) {

    Route::post('/activity', 'ActivityController@createActivity');
    Route::get('/activities', 'ActivityController@getAllActivities');
    Route::get('/user/activities', 'ActivityController@getAllActivitiesByUser');

});
