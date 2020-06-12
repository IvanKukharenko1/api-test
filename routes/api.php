<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

//Create property route
Route::middleware('api')->post('/property', 'PropertyController@create');
//Assign analytic type to property route
Route::middleware('api')->post('/property/{id}', 'PropertyController@assignAnalytic');
//Update assign analytic type to property route
Route::middleware('api')->post('/property/{id}/update', 'PropertyController@updateAssignAnalytic');
//Get all analytics for a property
Route::middleware('api')->get('/property/{id}', 'PropertyController@show');
//Get analytics summery by query
Route::middleware('api')->get('/analyticsSummery', 'PropertyController@index');
