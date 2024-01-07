<?php

use App\Http\Controllers\API\Dvice\Auth\LoginController;
use App\Http\Controllers\API\Dvice\DviceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Dvice Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login',[LoginController::class,'login']);
route::post('pay',[DviceController::class,'pay'])->middleware('auth:sanctum');