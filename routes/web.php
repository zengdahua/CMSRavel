<?php

use Illuminate\Support\Facades\Route;

/**
 * 通用服务
 */
Route::group(['prefix' => 'service'], function () {
    foreach (glob(base_path('modules') . '/*/Route/Service.php') as $file) {
        require $file;
    }
});

/**
 * 后台认证
 */
Route::group(['prefix' => 'admin', 'auth_has' => 'admin', 'middleware' => ['auth.admin']], function () {
    foreach (glob(base_path('modules') . '/*/Route/AuthAdmin.php') as $file) {
        require $file;
    }
});

/**
 * 后台非认证
 */
Route::group(['prefix' => 'admin', 'public' => true, 'auth_has' => 'admin'], function () {
    foreach (glob(base_path('modules') . '/*/Route/Admin.php') as $file) {
        require $file;
    }
});

/**
 * web端非认证
 */
Route::group(['middleware' => ['web']], function () {
    foreach (glob(base_path('modules') . '/*/Route/Web.php') as $file) {
        require $file;
    }
});
