<?php

use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\BrowseController;
use App\Http\Controllers\HomeController;
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

Route::get('/', ([HomeController::class, 'index']))->name('home');
Route::get('login', ([UserController::class, 'login']))->name('login');
Route::get('login/callback', ([UserController::class, 'login_callback']))->name('login_callback');
Route::get('browse', [BrowseController::class, 'index'])->name('browse');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(
    function () {
        Route::get('profile', ([UserController::class, 'profile']))->name('profile');
        Route::put('profile', ([UserController::class, 'update_profile']))->name('update_profile');

        Route::name('admin.')->middleware(['checkUserRole:admin'])->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
            Route::resource('product', ProductController::class);
            Route::resource('category', ProductCategoryController::class);
            Route::resource('color', ColorController::class);
        });
    }
);

require __DIR__ . '/auth.php';
