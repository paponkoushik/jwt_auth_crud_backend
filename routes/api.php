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
    $router->get('index', [ProductController::class, 'index'])->name('product.index');
    $router->post('store', [ProductController::class, 'store'])->name('product.store');
    $router->get('show/{product}', [ProductController::class, 'show'])->name('product.show');
    $router->patch('update/{product}', [ProductController::class, 'update'])->name('product.update');
    $router->delete('delete/{product}', [ProductController::class, 'delete'])->name('product.delete');
});
