<?php

use App\Models\SupportFaqs;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CouponController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\ScooterController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Api\SupportFaqController;
use App\Http\Controllers\Api\UserProfileController;

Route::group([
    'middleware' => 'guest:sanctum',
], function () {

    // Registration routes
    Route::post('/register', [RegisterController::class, 'register']);
    Route::post('/register/verify-otp', [RegisterController::class, 'verifyOtp']);

    // Login routes
    Route::post('/login/initiate', [LoginController::class, 'initiateLogin'])->name('login');
    Route::post('/login/verify-otp', [LoginController::class, 'verifyOtp']);
});

Route::middleware('auth:sanctum')->group(function () {
    // Review routes
    Route::post('/new-review', [ReviewController::class, 'store']);
    Route::get('/services/{service}/reviews', [ReviewController::class, 'index']);
    Route::delete('/services/review/delete/{id}', [ReviewController::class, 'destroy']);

    // Service-related routes protected with authentication middleware
    Route::apiResource('services', ServiceController::class);
    Route::get('/services/search/query', [ServiceController::class, 'search']);
    Route::post('/services/insert', [ServiceController::class, 'store']);
    Route::post('/services/book', [ServiceController::class, 'book']);

    // Payment route
    Route::post('/payment/process', [PaymentController::class, 'processPayment']);

    // Search route for services
    Route::get('/services/search', [ServiceController::class, 'search']);

    // Coupon application route
    Route::post('/coupons/apply', [CouponController::class, 'apply']);

    // User profile routes
    Route::get('/user/profile', [UserProfileController::class, 'getProfile']);
    Route::post('/user/profile', [UserProfileController::class, 'updateProfile']);
    Route::get('/user/profile-setting', [UserProfileController::class, 'getSettings']);
    Route::PUT('/user/profile-setting/update', [UserProfileController::class, 'updateSettings']);

    // User bookings route
    Route::get('/user/bookings', [BookingController::class, 'index']);

    // get all questions and answers
    Route::get('/support/faqs', [SupportFaqController::class, 'index']);

    // get scooters
    Route::group(['prefix' => "scooter", 'controller' => ScooterController::class], function () {
        Route::get('/', 'index');
        Route::post('/create', 'create');
        Route::post('/refresh', 'refresh');
        Route::post('update-control-info', 'ControlScooterRequest');
    });
});