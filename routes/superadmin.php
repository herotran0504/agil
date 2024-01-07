<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'otp', 'as'=>'otp_'], function () {
    Route::get('/', 'AdminGenelController@otpIndex')->name('index');
    Route::post('check', 'AdminGenelController@otpStore')->name('post');
    Route::get('resend', 'AdminGenelController@otpResend')->name('resend');
});


Route::group(['as' => 'ad_','middleware'=>'otp'], function () {

    Route::get('/dashboard', 'AdminGenelController@dashboardPage')->name('dashboard');
    Route::post('/language', 'AdminGenelController@changeLanguage')->name('language_change');
    Route::post('/logout', 'AdminGenelController@logout')->name('logout');

    Route::group(['prefix' => 'admins'], function () {
        Route::get('/', 'AdminUsersController@index')->name('list_admins');
        Route::post('/admin/password', 'AdminUsersController@updateAdminPassword')->name('update.admin.password');
        Route::post('/admin/add', 'AdminUsersController@addAdmin')->name('add.admin');
        Route::get('/admin/{id}/delete', 'AdminUsersController@deleteAdmin')->name('delete.admin');
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'AdminGenelController@usersIndex')->name('list_users');
    });

    Route::group(['prefix' => 'merchants-admins', 'as'=>'merchant_admins_'], function () {
        Route::get('/', 'AdminMerchantsUsersController@merchantsAdminsIndex')->name('index');
        Route::post('/add', 'AdminMerchantsUsersController@merchantsAdminsAdd')->name('add');
        Route::get('/edit/{id}', 'AdminMerchantsUsersController@merchantsAdminsEdit')->name('edit');
        Route::post('/update/{id}', 'AdminMerchantsUsersController@merchantsAdminsUpdate')->name('update');
        Route::get('/delete/{id}', 'AdminMerchantsUsersController@merchantsAdminsDelete')->name('delete');
    });

    Route::group(['prefix' => 'merchants', 'as'=>'merchant_'], function () {
        Route::get('/', 'AdminMerchantsController@merchantsIndex')->name('index');
        Route::post('/add', 'AdminMerchantsController@merchantsAdd')->name('add');
        Route::get('/edit/{id}', 'AdminMerchantsController@merchantsEdit')->name('edit');
        Route::post('/update/{id}', 'AdminMerchantsController@merchantsUpdate')->name('update');
        Route::get('/delete/{id}', 'AdminMerchantsController@merchantsDelete')->name('delete');
    });

    Route::group(['prefix' => 'branches', 'as'=>'branch_'], function () {
        Route::get('/', 'AdminMerchantsBranchesController@branchesIndex')->name('index');
        Route::post('/add', 'AdminMerchantsBranchesController@branchesAdd')->name('add');
        Route::get('/edit/{id}', 'AdminMerchantsBranchesController@branchesEdit')->name('edit');
        Route::post('/update/{id}', 'AdminMerchantsBranchesController@branchesUpdate')->name('update');
        Route::get('/delete/{id}', 'AdminMerchantsBranchesController@branchesDelete')->name('delete');
    });

    Route::group(['prefix' => 'devices', 'as'=>'pos_'], function () {
        Route::get('/', 'AdminMerchantsDevicesController@posIndex')->name('index');
        Route::post('/add', 'AdminMerchantsDevicesController@posAdd')->name('add');
        Route::get('/edit/{id}', 'AdminMerchantsDevicesController@posEdit')->name('edit');
        Route::post('/update/{id}', 'AdminMerchantsDevicesController@posUpdate')->name('update');
        Route::get('/delete/{id}', 'AdminMerchantsDevicesController@posDelete')->name('delete');
        Route::get('/invoices/{id}', 'AdminMerchantsDevicesController@posInvoices')->name('invoices');
        Route::post('/invoices/add', 'AdminMerchantsDevicesController@posInvoicesAdd')->name('invoices_add');
    });

    Route::group(['prefix' => 'reports', 'as'=>'reports_'], function () {
        Route::get('/', 'AdminGenelController@reportsIndex')->name('index');
    });


});
