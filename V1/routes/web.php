<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/logoutClient', function () {
        Auth::logout();
        return back();
    })->name('logout.index');
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::view('/device', 'device.index')->name('device.index');
    
    Route::prefix('/position')->group(function () {
        Route::view('/', 'position.index')->name('position.index');
        Route::view('/create', 'position.create')->name('position.create');
        Route::get('/edit/{id}', function ($id) {
            return view('position.edit',[
                'pos_id' => $id
            ]);
        })->name('position.edit');
    });
    
    Route::prefix('/worker')->group(function () {
        Route::view('/', 'worker.index')->name('worker.index');
        Route::view('/create', 'worker.create')->name('worker.create');
        Route::get('/edit/{id}', function ($id) {
            return view('worker.edit',[
                'wor_id' => $id
            ]);
        })->name('worker.edit');
        Route::get('/show/{worker}', 'WorkerController@show')->name('worker.show');
    });
    
    Route::prefix('/checkpoint')->group(function () {
        Route::view('/', 'checkpoint.index')->name('checkpoint.index');
        Route::view('/create', 'checkpoint.create')->name('checkpoint.create');
        Route::get('/edit/{id}', function ($id) {
            return view('checkpoint.edit',[
                'cp_id' => $id
            ]);
        })->name('checkpoint.edit');
    });

    Route::prefix('/round')->group(function () {
        Route::view('/', 'round.index')->name('round.index');
    });
});



