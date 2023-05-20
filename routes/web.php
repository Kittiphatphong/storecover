<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\FontEndController;
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

Route::get('/', [FontEndController::class,'home'])->name('home');
Route::get('/store-list', [FontEndController::class,'store'])->name('store.list');
Route::get('/store-detail', [FontEndController::class,'storeDetail'])->name('store.detail');
//Client

Route::get('/client-login',[FontEndController::class,'login'])->name('client.login');
Route::get('/customer-register',[FontEndController::class,'customerRegister'])->name('customer.register');
Route::post('/customer-register',[FontEndController::class,'customerRegisterStore'])->name('customer.register.store');
Route::get('/store-register',[FontEndController::class,'storeRegister'])->name('store.register');
Route::post('/store-register',[FontEndController::class,'storeRegisterStore'])->name('store.register.store');

Route::get('locale/{locale}', function ($locale){

    app()->setLocale($locale);
    session()->put('locale', $locale);
    return back();
})->name('lang');



//customer
Route::group(['middleware' => 'auth'], function()
{
    Route::get('cart', [FontEndController::class, 'cart'])->name('cart');
    Route::get('add-to-cart/{id}', [FontEndController::class, 'addToCart'])->name('add.to.cart');

    Route::get('remove-to-cart/{id}', [FontEndController::class, 'removeToCart'])->name('remove.to.cart');
    Route::get('remove-from-cart', [FontEndController::class, 'remove'])->name('remove.from.cart');

    Route::get('checkout', [FontEndController::class, 'checkout'])->name('checkout');
    Route::get('sell-list', [FontEndController::class, 'sell'])->name('sell.list');
});


//admin and store


Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard')->with('dashboard','dashboard');
    })->name('dashboard');

    Route::resource('users',UsersController::class);
    Route::resource('user',UserController::class);

    Route::resource('store',StoreController::class);
    Route::resource('customer',CustomerController::class);
    Route::resource('slide',SlideController::class);
    Route::resource('product-type',ProductTypeController::class);
    Route::resource('product',ProductController::class);
    Route::resource('stock',StockController::class);

    Route::resource('sell',SellController::class);
    Route::resource('payment',PaymentController::class);

});




require __DIR__.'/auth.php';
