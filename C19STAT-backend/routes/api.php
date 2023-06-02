<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CovidStatisticController;
use App\Http\Controllers\HelpController;

// Authentication Routes
Route::post('login', [LoginController::class, 'login']);
Route::post('register', [RegisterController::class, 'register']);
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail']);
Route::post('password/reset', [ResetPasswordController::class, 'reset']);
Route::get('/covid-statistics', [CovidStatisticController::class, 'index']);
Route::post('/help', [HelpController::class, 'store']);
Route::get('/help', [HelpController::class, 'index']);
Route::put('/helps/{id}', [HelpController::class, 'update']); 
Route::delete('/helps/{id}', [HelpController::class, 'destroy']); 
