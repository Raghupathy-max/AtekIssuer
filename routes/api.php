<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/otp',[SendOtpController::class,'genOtp']);
Route::post('/verify_otp',[VerifyOtpController::class,'verifyOtp']);
