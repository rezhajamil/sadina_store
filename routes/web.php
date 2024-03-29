<?php

use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\NotifController as AdminNotifController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\BrowseController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RajaOngkirApiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/form/{url}', ([HomeController::class, 'url_form']))->name('url_form');

Route::get('/', ([HomeController::class, 'index']))->name('home');
Route::get('login', ([UserController::class, 'login']))->name('login');
Route::get('login/callback', ([UserController::class, 'login_callback']))->name('login_callback');
Route::get('browse', [BrowseController::class, 'index'])->name('browse.index');
Route::get('show/browse/{id}', [BrowseController::class, 'show'])->name('browse.show');

Route::get('get_list_province', [RajaOngkirApiController::class, 'getListProvince'])->name('get_list_province');
Route::get('get_list_city', [RajaOngkirApiController::class, 'getListCity'])->name('get_list_city');
Route::get('get_cost', [RajaOngkirApiController::class, 'getCost'])->name('get_cost');

Route::get('payment/success', [PaymentController::class, 'midtransCallback']);
Route::post('payment/success', [PaymentController::class, 'midtransCallback']);

Route::middleware(['auth'])->group(
    function () {
        Route::get('/admin', function () {
            return redirect()->route('admin.dashboard');
        });

        Route::get('/dashboard', function () {
            return redirect()->route('admin.dashboard');
        });

        Route::get('profile', ([UserController::class, 'profile']))->name('profile');
        Route::put('profile', ([UserController::class, 'update_profile']))->name('update_profile');

        Route::post('add_to_cart', [CartController::class, 'store'])->name('add_cart');
        Route::resource('cart', CartController::class);
        Route::resource('payment', PaymentController::class);
        Route::resource('order', OrderController::class);
        Route::resource('notif', NotificationController::class);

        Route::put('order/change_status/{order}', [OrderController::class, 'change_status'])->name('order.change_status');

        Route::prefix('admin')->name('admin.')->middleware(['checkUserRole:admin'])->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
            Route::resource('product', ProductController::class);
            Route::resource('category', ProductCategoryController::class);
            Route::resource('color', ColorController::class);
            Route::resource('size', SizeController::class);
            Route::resource('tag', TagController::class);
            Route::resource('notif', AdminNotifController::class);
            Route::resource('order', AdminOrderController::class);

            Route::get('/user', [UserController::class, 'index'])->name('user.index');
            Route::get('/user/show/{user}', [UserController::class, 'show'])->name('user.show');
            Route::get('/user/edit_password', [UserController::class, 'edit_password'])->name('user.edit_password');
            Route::put('/user/update_password', [UserController::class, 'update_password'])->name('user.update_password');

            Route::put('order/change_status/{order}', [AdminOrderController::class, 'change_status'])->name('order.change_status');

            Route::put('change_cover/product/{id}', [ProductController::class, 'changeCover'])->name('product.change_cover');
        });
    }
);

require __DIR__ . '/auth.php';
