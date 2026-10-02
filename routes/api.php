<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductApiController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/testAPI', function(){
return ['apiname'=>'test api', 'api Version'=> 'V1'];
});


Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login'])->name('login');


Route::middleware('auth:sanctum')->group(function () {
Route::get('products', [ProductApiController::class, 'list']);
Route::get('get-product', [ProductApiController::class, 'getProduct']);
Route::post('add-product', [ProductApiController::class, 'addProduct']);
Route::put('update-product', [ProductApiController::class, 'updateProduct']);
});
