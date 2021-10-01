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
Route::get('/logoutClient', function () {
    Auth::logout();
    return back();
})->name('logout.index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/position')->group(function () {
    Route::view('/', 'position.index')->name('position.index');
    Route::view('/create', 'position.create')->name('position.create');
    Route::get('/edit/{id}', function ($id) {
        return view('position.edit',[
            'pos_id' => $id
        ]);
    })->name('position.edit');
});


Route::view('/worker', 'worker.index')->name('worker.index');
