<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// routes untuk login
Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [App\Http\Controllers\Api\AuthController::class, 'logout']);
    Route::get('/company', [App\Http\Controllers\Api\CompanyController::class, 'show']);
    Route::post('/checkin', [App\Http\Controllers\Api\AttendanceController::class, 'checkin']);
    Route::post('/checkout', [App\Http\Controllers\Api\AttendanceController::class, 'checkout']);
    Route::get('/is-checkin', [App\Http\Controllers\Api\AttendanceController::class, 'isCheckedin']);
    //update profile
    Route::post('/update-profile', [App\Http\Controllers\Api\AuthController::class, 'updateProfile']);
});
