<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemTransactionController;
use App\Http\Controllers\RoleConroller;
use App\Http\Controllers\UserController;

Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('test');
    });
    Route::resource('category', CategoryController::class);
    Route::resource('unit', UnitController::class);
    Route::resource('item', ItemController::class);

    Route::prefix('stock')->group(function () {
        Route::get('/', [ItemTransactionController::class, 'index'])->name('stock.index');
        Route::get('/inout', [ItemTransactionController::class, 'create'])->name('stock.create');
        Route::post('/inout', [ItemTransactionController::class, 'store'])->name('stock.store');
        Route::get('/edit/{id}', [ItemTransactionController::class, 'edit'])->name('stock.edit');
        Route::patch('/edit/{id}', [ItemTransactionController::class, 'update'])->name('stock.update');
        Route::get('/stock', [ItemTransactionController::class, 'stock'])->name('stock.stock');
        Route::delete('/delete/{id}', [ItemTransactionController::class, 'destroy'])->name('stock.destroy');

        Route::get("history/pdf", [ItemTransactionController::class, 'printPdf'])->name('stock.pdf');
        Route::get("pdf", [ItemTransactionController::class, 'stockPrintPdf'])->name('stock.stockpdf');
    });

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/', [UserController::class, 'store'])->name('users.store');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::patch('/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    Route::prefix('roles')->group(function () {
        Route::get('/', [RoleConroller::class, 'index'])->name('roles.index');
        Route::get('/create', [RoleConroller::class, 'create'])->name('roles.create');
        Route::post('/', [RoleConroller::class, 'store'])->name('roles.store');
        Route::get('/{role}/edit', [RoleConroller::class, 'edit'])->name('roles.edit');
        Route::patch('/{role}', [RoleConroller::class, 'update'])->name('roles.update');
        Route::delete('/{role}', [RoleConroller::class, 'destroy'])->name('roles.destroy');
    });

});



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
