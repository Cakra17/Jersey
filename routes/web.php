<?php

use App\Http\Controllers\AfterPaymentController;
use App\Http\Controllers\LogoutController;
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

Route::middleware(['auth','verified'])->group(function () {
  Route::get('/', \App\Livewire\Home::class)->name('home')->withoutMiddleware(['auth','verified']);
  Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
  Route::get('/setting', \App\Livewire\Profile\Index::class)->name('profile.setting');
  Route::get('/admin', \App\Livewire\Admin\Index::class)->name('admin.index')->middleware('admin');
  Route::get('/admin/post', \App\Livewire\Admin\AddProduct::class)->name('admin.post')->middleware('admin');
  Route::get('/admin/product', \App\Livewire\Admin\GetProduct::class)->name('admin.product')->middleware('admin');
  Route::get('/admin/product/{id}', \App\Livewire\Admin\EditProduct::class)->name('admin.edit')->middleware('admin');
  Route::get('/product', \App\Livewire\User\Index::class)->name('user.product')->withoutMiddleware(['auth', 'verified']);
  Route::get('/product/{id}', \App\Livewire\User\ProductDetail::class)->name('user.productDetail');
  Route::get('/product/liga/{ligaid}', \App\Livewire\User\ProductLiga::class)->name('user.productLiga')->withoutMiddleware(['auth','verified']);
  Route::get('/admin/liga/post', \App\Livewire\Admin\AddLiga::class)->name('admin.liga.post')->middleware('admin');
  Route::get('/admin/liga',\App\Livewire\Admin\GetLiga::class)->name('admin.liga');
  Route::get('/admin/liga/{ligaid}',\App\Livewire\Admin\EditLiga::class)->name('admin.liga.edit');
  Route::get('/admin/paymentdetail', \App\Livewire\Admin\PaymentDetail::class)->name('admin.payment')->middleware('admin');
  Route::get('/wishlist', \App\Livewire\User\Wishlist::class)->name('user.wishlist')->middleware('pelanggan');
  Route::get('/cart', \App\Livewire\User\Cart::class)->name('user.cart')->middleware('pelanggan');
  Route::get('/payment/{id}', \App\Livewire\User\Checkout::class)->name('user.payment')->middleware('pelanggan');
  Route::get('/history', \App\Livewire\User\History::class)->name('user.history')->middleware('pelanggan');
});

Route::middleware('guest')->group(function () {
  Route::get('/login', \App\Livewire\Login::class)->name('login');
  Route::get('/register', \App\Livewire\Register::class)->name('register');
});

