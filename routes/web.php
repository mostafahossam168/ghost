<?php

use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\ScooterController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['as' => 'admin.'], function () {
    Route::group(['controller' => AuthController::class], function () {
        Route::get('/', 'login')->name('login');
        Route::post('/', 'adminLogin')->name('admin_login');
        Route::get('/profile', 'login')->name('profile');
        Route::post('/logout', 'logout')->name('logout');
    });
    Route::group(['controller' => HomeController::class], function () {
        Route::get('/home', 'index')->name('home');
    });
    Route::resource('users', UserController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('scooters', ScooterController::class);
});