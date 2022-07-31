<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

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
    Route::get('notifications', [\App\Http\Controllers\NotificationController::class, 'index'])->name('notifications');
    Route::get('notifications/{id}', [\App\Http\Controllers\NotificationController::class, 'show'])->name('notifications.read');


    Route::view('categories', 'admin.categories.index')->name('categories');
    Route::view('products', 'admin.products.index')->name('products');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/product/{slug}', [HomeController::class, 'productDetails'])->name('product-details');

Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');

Route::get('/checkout', [CheckoutController::class, 'create'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'store']);

Route::get('/orders', function(){
    return \App\Models\Order::with('items')->get();
})->name('orders');

Route::get('chat', [\App\Http\Controllers\MessagesController::class, 'index'])->name('chat');
Route::post('chat', [\App\Http\Controllers\MessagesController::class, 'store']);

require __DIR__.'/auth.php';
