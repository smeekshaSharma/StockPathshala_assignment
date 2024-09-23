<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
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

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/otp', [AuthController::class, 'showOtpForm'])->name('otp');
Route::post('/otp', [AuthController::class, 'verifyOtp'])->name('otp.submit');
Route::get('/classes', [ClassController::class, 'index'])->name('classes');
Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->name('verify.otp');
Route::middleware(['ensure.token.is.valid'])->group(function () {
    Route::get('/classes', [ClassController::class, 'index'])->name('classes');
});
