<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
});

/*
Route::get('products', function () {
    return 'Lista de productos';
})->name('products.index');

Route::get('products/create', function () {
    return 'Aquí para crear un producto';
})->name('products.create');

Route::post('products', function () {
    ////
})->name('products.store');

Route::get('products/{product}', function ($product) {
    return "mostrar producto con id {$product}";
})->name('products.show');

Route::get('products/{product}/edit', function ($product) {
    return "editar producto con id {$product}";
})->name('products.edit');

Route::match(['put', 'patch'], 'products/{product}', function ($product) {
    /////////
})->name('products.update');


Route::delete('products/{product}', function ($product) {
    /////////
})->name('products.destroy');

*/


Route::get('products', [ProductController::class, 'index' ])->name('products.index');
Route::get('products/create', [ProductController::class, 'create' ])->name('products.create');
Route::post('products', [ProductController::class, 'store' ])->name('products.store');
Route::get('products/{product}', [ProductController::class, 'show' ])->name('products.show');
Route::get('products/{product}/edit', [ProductController::class, 'edit' ])->name('products.edit');
Route::match(['put', 'patch'],'products/{product}', [ProductController::class, 'update' ])->name('products.update');
Route::delete('products/{$product}', [ProductController::class, 'destroy' ])->name('products.destroy');

