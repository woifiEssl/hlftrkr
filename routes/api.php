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

    // user - belongsToMany Competition,
    // entry - type_id, name, value, from, to, user_id
    // entry_type - id, name, measure, created_at, updated_at
    // competition - id, name, from, to, created_at, updated_at, difficulty - hasMany Users
    return $request->user();
});
