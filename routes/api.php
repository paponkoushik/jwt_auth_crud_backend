<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Product\ProductController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'auth'], function (Router $router) {

    $router->post('login', [AuthController::class, 'login'])
        ->name('login');

    $router->post('logout', [AuthController::class, 'logout'])
        ->name('logout');

    $router->middleware('auth:api')
        ->get('myself', [AuthController::class, 'mySelf'])
        ->name('myself');
});

Route::group(['prefix' => 'product', 'middleware' => 'auth:api'], function (Router $router) {
    $router->post('store', [ProductController::class, 'store'])->name('product.store');
});
