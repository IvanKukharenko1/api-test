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


Route::middleware('api')->group(function () {
    //Create property route
    Route::post('/property', 'PropertyController@create');
    //Assign analytic type to property route
    Route::post('/property/{id}', 'PropertyController@assignAnalytic');
    //Update assign analytic type to property route
    Route::put('/property/{id}', 'PropertyController@update');
    //Get all analytics for a property route
    Route::get('/property/{id}', 'PropertyController@show');
    //Get analytics summery by query route
    Route::get('/analyticsSummery', 'PropertyController@index');
});
