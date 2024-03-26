<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\TestMiddleWare;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware(TestMiddleWare::class);
// Route::get('/products', ProductsController::class ."@index")->name("products.index");

// Route::get('/products/create',[ProductsController::class,"create"])->name("products.create");

// Route::post('/products',[ProductsController::class,"store"])->name("products.store");

// Route::get('/products/{product}',[ProductsController::class,"show"])->name("products.show");
// Route::get('/products/{product}/edit',[ProductsController::class,"edit"])->name("products.edit");
// Route::put('/products/{product}',[ProductsController::class,"update"])->name("products.update");

// Route::delete('/products/{product}',[ProductsController::class,"destroy"])->name("products.destroy");

Route::resource("products",ProductsController::class);