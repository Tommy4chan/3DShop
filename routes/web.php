<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [MainController::class, 'home'])->name('home');
Route::get('/thanks', [MainController::class, 'thanks'])->name('thanks');
Route::resource('product', ProductController::class, ['only' => ['show']]);

Route::prefix('order')->group(function () {
    Route::name('order.')->group(function () {

        Route::controller(OrderController::class)->group(function () {
            Route::get('/create/{id}', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{id}', 'show')->name('show');
        });

    });
});

Route::prefix('admin')->group(function () {
    Route::name('admin.')->group(function () {
        Route::middleware(['is_admin'])->group(function () {
            Route::controller(AdminController::class)->group(function () {
                Route::get('/', 'home')->name('home');

                Route::prefix('user')->group(function () {
                    Route::name('user.')->group(function () {
                        Route::get('/', 'userIndex')->name('index');
                        Route::get('/make/admin/{user}', 'makeAdmin')->name('make.admin');
                    });
                });
            });

            Route::prefix('order')->group(function () {
                Route::name('order.')->group(function () {
                    Route::controller(OrderController::class)->group(function () {
                        Route::get('/', 'index')->name('index');
                        Route::put('/{order}', 'update')->name('update');
                    });
                });
            });
            Route::prefix('product')->group(function () {
                Route::name('product.')->group(function () {
                    Route::controller(ProductController::class)->group(function () {
                        Route::get('/', 'index')->name('index');
                        Route::get('/create', 'create')->name('create');
                        Route::post('/store', 'store')->name('store');
                        Route::get('/edit/{id}', 'edit')->name('edit');
                        Route::put('/{product}', 'update')->name('update');
                        Route::delete('/{product}', 'destroy')->name('destroy');
                    });
                });
            });
        });
    });
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
