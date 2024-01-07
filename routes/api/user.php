<?php

use App\Http\Controllers\API\User\Auth\LoginController;
use App\Http\Controllers\API\User\Auth\RegisterController;
use App\Http\Controllers\API\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//group(['middleware' => ['auth:api']], function () {
//    Route::get('/user', function (Request $request) {

    Route::prefix('register')->group(function () {
    Route::post('/step_one', [RegisterController::class, 'stepOne'])->name('user.register.step-one');
    Route::post('/step_two', [RegisterController::class, 'stepTwo'])->name('user.register.step-two');
    // Route::post('/step_three', [RegisterController::class, 'stepThree'])->name('user.register.step-three');
    });
    Route::prefix('login')->group(function () {
    Route::post('/step_one', [LoginController::class, 'stepOne'])->name('user.login.step-one');
    Route::post('/step_two', [LoginController::class, 'stepTwo'])->name('user.login.step-two');
    // Route::post('/step_three', [RegisterController::class, 'stepThree'])->name('user.register.step-three');
    });
    
    // Route::middleware('auth:sanctum')->get('/test', function (Request $request) {
    //     return $request->user();
    // });
    Route::middleware('auth:sanctum')->group(function () {
    Route::get('/data',[UserController::class,'getUserData'])->name('user.get.user-data');
    Route::get('qr',[UserController::class,'getQr'])->name('user.get.qr');
    Route::get('/invoices',[UserController::class,'getInvoices'])->name('user.get.invoices');
    Route::get('/invoice_data',[UserController::class,'getUserDept'])->name('user.get.dept');
    Route::post('/logout',[LoginController::class,'logout'])->name('user.logout');
    });
