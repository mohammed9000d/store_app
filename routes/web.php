<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//

Route::view('/', 'welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('admin')->middleware('auth')->group(function(){
    Route::view('categories', 'admin.categories.index')->name('categories');
    Route::view('products', 'admin.products.index')->name('products');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/product/{slug}', [HomeController::class, 'productDetails'])->name('product-details');

Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');

require __DIR__.'/auth.php';
