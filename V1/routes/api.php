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

Route::group(['middleware' => ['cors']], function () {
    Route::get('test', function () {
        return 'Run';
    });
    Route::post('/device', 'Api\DeviceController@store');    
    Route::get('/chekpoints', 'Api\Auth\RoundController@index');
    Route::post('/round', 'Api\Auth\RoundController@store');
});

