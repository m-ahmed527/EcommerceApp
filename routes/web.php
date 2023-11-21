<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NotificationCOntroller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['middleware'=> 'auth'],function()
    {
        Route::get('/',[ HomeController::class, 'index'])->name('index');
        Route::post('/logout',[ LoginController::class, 'logout'])->name('logout');
        Route::get('/create-product',[ ProductController::class, 'create'])->name('create.product');
        Route::post('/store-product',[ ProductController::class, 'store'])->name('store.product');
        Route::get('/products',[ ProductController::class, 'index'])->name('products');
        Route::get('/edit-product/{product}',[ ProductController::class, 'edit'])->name('edit.product');
        Route::post('/update-product/{product}',[ ProductController::class, 'update'])->name('update.product');
        Route::get('/delete-product/{product}',[ ProductController::class, 'destroy'])->name('delete.product');
        Route::get('/show-product/{product}',[ ProductController::class, 'show'])->name('show.product');
        Route::get('/cart',[ CartController::class, 'cart'])->name('cart');
        Route::post('/add-cart',[ CartController::class, 'addcart'])->name('add.cart');
        Route::post('/remove-cart/{id}',[ CartController::class, 'removeCart'])->name('remove.cart');
        Route::post('/update/cart/{id}',[ CartController::class, 'update'])->name('update.cart');
        Route::get('/checkout',[ CheckOutController::class, 'checkOutForm'])->name('checkout.form');
        Route::post('/checkout/create/order',[ CheckOutController::class, 'createOrder'])->name('checkout');
        Route::get('/success',[ CheckOutController::class, 'success'])->name('card.success');
        Route::get('/fail',[ CheckOutController::class, 'fail'])->name('card.fail');
        Route::get('/markread/{id}',[ NotificationCOntroller::class, 'markread'])->name('markread');
        Route::get('/markAllAsRead',[ NotificationCOntroller::class, 'markAllAsRead'])->name('markAllAsRead');

    }
);
Route::group(['middleware'=>'guest'],function(){

Route::get('/login',[ LoginController::class, 'loginForm'])->name('login');
Route::post('/login',[ LoginController::class, 'login'])->name('login');
Route::get('/register',[ RegisterController::class, 'registerForm'])->name('register');
Route::post('/register',[ RegisterController::class, 'register'])->name('register');
}
);
