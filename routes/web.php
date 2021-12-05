<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AlgorithmController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ScrapperController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseTransactionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SuplierController;
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

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('master')->group(function () {
        Route::middleware('can:isAdmin')->group(function () {
            Route::resources([
                'user'      => UserController::class,
                'role'      => RoleController::class,
                'category'  => ProductCategoryController::class, 
                'product'   => ProductController::class,
                'suplier'   => SuplierController::class,
                'customer'   => CustomerController::class,
            ]);

            Route::post('update/product/{id}', [ProductController::class, 'update'])->name('update.product');
        });
    });
    Route::middleware('can:isHasAccess')->group(function () {
        Route::prefix('purchase')->group(function(){
            Route::get('transaction', [PurchaseTransactionController::class, 'index'])->name('purchase.transaction');
            Route::post('transaction', [PurchaseTransactionController::class, 'store'])->name('purchase.transaction.store');
            Route::get('transaction/{id}', [PurchaseTransactionController::class, 'show'])->name('purchase.transaction.show');
            Route::put('transaction/{id}', [PurchaseTransactionController::class, 'update'])->name('purchase.transaction.update');
        });

        Route::get('data/products', [DataController::class, 'productAll'])->name('data.products');
        Route::get('data/product/{id}', [DataController::class, 'productById'])->name('data.product');
        Route::get('data/supliers', [DataController::class, 'suplierAll'])->name('data.supliers');
        Route::get('data/suplier/{id}', [DataController::class, 'suplierById'])->name('data.suplier');
    });
});



Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
