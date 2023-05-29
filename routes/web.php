<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;

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
Route::prefix('category')->group(function () {
    Route::get('/index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/show/{id}', [CategoryController::class, 'show'])->name('category.show');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/delete/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
});
Route::prefix('subcategory')->group(function () {
    Route::get('/index', [SubcategoryController::class, 'index'])->name('subcategory.index');
    Route::get('/create', [SubcategoryController::class, 'create'])->name('subcategory.create');
    Route::post('/store', [SubcategoryController::class, 'store'])->name('subcategory.store');
    Route::get('/show/{id}', [SubcategoryController::class, 'show'])->name('subcategory.show');
    Route::get('/edit/{id}', [SubcategoryController::class, 'edit'])->name('subcategory.edit');
    Route::put('/update/{id}', [SubcategoryController::class, 'update'])->name('subcategory.update');
});
