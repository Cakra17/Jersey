<?php

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
});

Route::middleware('guest')->group(function () {
  Route::get('/login', \App\Livewire\Login::class)->name('login');
  Route::get('/register', \App\Livewire\Register::class)->name('register');
});

