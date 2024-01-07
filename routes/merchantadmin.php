<?php

use Illuminate\Support\Facades\Route;
Route::group(['as' => 'mad_'], function () {

    Route::get('/dashboard', 'MerchantAdminGenelController@dashboardPage')->name('dashboard');
    Route::post('/logout', 'MerchantAdminGenelController@logout')->name('logout');

});
