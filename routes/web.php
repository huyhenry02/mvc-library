<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookBorrowingFormController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookPurchaseFormController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('layouts.main');
});

Route::group([
    'prefix' => 'book'
], function () {
    Route::get('/', [BookController::class, 'index'])->name('book.index');
    Route::get('/create', [BookController::class, 'create'])->name('book.create');
    Route::post('/', [BookController::class, 'store'])->name('book.store');
    Route::get('/{book}', [BookController::class, 'show'])->name('book.show');
    Route::get('/{book}/edit', [BookController::class, 'edit'])->name('book.edit');
    Route::put('/{book}', [BookController::class, 'update'])->name('book.update');
    Route::delete('/{book}', [BookController::class, 'destroy'])->name('book.destroy');
});

Route::group([
    'prefix' => 'category'
], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/{category}', [CategoryController::class, 'show'])->name('category.show');
    Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
});

Route::group([
    'prefix' => 'user'
], function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/', [UserController::class, 'store'])->name('user.store');
    Route::get('/{user}', [UserController::class, 'show'])->name('user.show');
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('user.destroy');
});

Route::group([
    'prefix' => 'author'
], function () {
    Route::get('/', [AuthorController::class, 'index'])->name('author.index');
    Route::get('/create', [AuthorController::class, 'create'])->name('author.create');
    Route::post('/', [AuthorController::class, 'store'])->name('author.store');
    Route::get('/{author}', [AuthorController::class, 'show'])->name('author.show');
    Route::get('/{author}/edit', [AuthorController::class, 'edit'])->name('author.edit');
    Route::put('/{author}', [AuthorController::class, 'update'])->name('author.update');
    Route::delete('/{author}', [AuthorController::class, 'destroy'])->name('author.destroy');
});

Route::group([
    'prefix' => 'borrowing-form'
], function () {
    Route::get('/', [BookBorrowingFormController::class, 'index'])->name('borrowing-form.index');
    Route::get('/create', [BookBorrowingFormController::class, 'create'])->name('borrowing-form.create');
    Route::post('/', [BookBorrowingFormController::class, 'store'])->name('borrowing-form.store');
    Route::get('/{borrowingForm}', [BookBorrowingFormController::class, 'show'])->name('borrowing-form.show');
    Route::get('/{borrowingForm}/edit', [BookBorrowingFormController::class, 'edit'])->name('borrowing-form.edit');
    Route::put('/{borrowingForm}', [BookBorrowingFormController::class, 'update'])->name('borrowing-form.update');
    Route::delete('/{borrowingForm}', [BookBorrowingFormController::class, 'destroy'])->name('borrowing-form.destroy');
});
Route::group([
    'prefix' => 'purchase-form'
], function () {
    Route::get('/', [BookPurchaseFormController::class, 'index'])->name('purchase-form.index');
    Route::get('/create', [BookPurchaseFormController::class, 'create'])->name('purchase-form.create');
    Route::post('/', [BookPurchaseFormController::class, 'store'])->name('purchase-form.store');
    Route::get('/{purchaseForm}', [BookPurchaseFormController::class, 'show'])->name('purchase-form.show');
    Route::get('/{purchaseForm}/edit', [BookPurchaseFormController::class, 'edit'])->name('purchase-form.edit');
    Route::put('/{purchaseForm}', [BookPurchaseFormController::class, 'update'])->name('purchase-form.update');
    Route::delete('/{purchaseForm}', [BookPurchaseFormController::class, 'destroy'])->name('purchase-form.destroy');
});




