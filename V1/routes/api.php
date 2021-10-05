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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/round', 'Api\Auth\RoundController@store');


Route::post('/register', 'API\AuthController@register');
Route::post('/login', 'API\AuthController@login');

Route::group(['middleware' => 'auth:api', 'prefix' => 'auth'], function() {

    Route::get('/user', 'API\AuthController@user');
    Route::get('/logout', 'API\Auth\AuthController@logout');
    
});
