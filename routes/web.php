<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


//1:  welcome
Route::get('/', function () {
    return view('welcome');
});


// to localize a specific page 
// for localization
// Route::get('/{lang}', function ($lang) {
//     App::setLocale($lang);
//     return view('welcome');
// });


// 2/ Products

// Route::get('/products', [ProductController::class, 'index'] )->name('products.index');
// Route::get('/products/create', [ProductController::class, 'create'] )->name('products.create');
// Route::post('/products', [ProductController::class, 'store'] )->name('products.store');
// Route::get('/products/{product}', [ProductController::class, 'show'] )->name('products.show');
// Route::get('/products/{product}/edit', [ProductController::class, 'edit'] )->name('products.edit');
// Route::put('/products/{product}', [ProductController::class, 'update'] )->name('products.update');
// Route::delete('/products/{product}', [ProductController::class, 'destroy'] )->name('products.destroy');

Route::resource('product', ProductController::class);  // auto resourse class



// named routes and groups along with prefix
// Route::controller(ProductController::class)->prefix('product')->name('product.')->group(function(){
// Route::get('/', 'index')->name('index');
// Route::get('/create',  'create' )->name('create');
// Route::post('/store',  'store' )->name('store');
// Route::get('/{product}/edit',  'edit' )->name('edit');
// Route::put('/{product}',  'update' )->name('update');
// Route::delete('/{product}',  'destroy')->name('destroy');


// }) ;


// 3. Tasks


Route::get('/tasks',function(){
return view('tasks.index');
})->name('tasksRouteName');




Route::get('send-mail', [MailController::class, 'sendEmail']);
