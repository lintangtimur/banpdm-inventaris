<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('test');
});


Route::resource('category', CategoryController::class);
Route::resource('unit', UnitController::class);
Route::resource('item', ItemController::class);