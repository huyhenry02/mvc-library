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
    return redirect()->route('user.index');
});

Route::group([
    'prefix' => 'auth'
], function () {
    Route::get('/login', [UserController::class, 'indexLogin'])->name('login.index');
    Route::post('/', [UserController::class, 'postLogin'])->name('login.post');
    Route::get('/logout', [UserController::class, 'postLogout'])->name('logout');
});

Route::group([
    'prefix' => 'book',
    'middleware' => 'auth'
], function () {
    Route::get('/', [BookController::class, 'index'])->name('book.index');
    Route::get('/create', [BookController::class, 'create'])->name('book.create');
    Route::post('/', [BookController::class, 'store'])->name('book.store');
    Route::get('/{book}', [BookController::class, 'show'])->name('book.show');
    Route::get('/get-rental-price/{book}', [BookController::class, 'getRentalPrice'])->name('book.get-rental-price');
    Route::get('/edit/{book}', [BookController::class, 'edit'])->name('book.edit');
    Route::post('/update/{book}', [BookController::class, 'update'])->name('book.update');
    Route::get('/delete/{book}', [BookController::class, 'destroy'])->name('book.destroy');
});

Route::group([
    'prefix' => 'category',
    'middleware' => 'auth'
], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/{category}', [CategoryController::class, 'show'])->name('category.show');
    Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/update/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/delete/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
});

Route::group([
    'prefix' => 'user',
    'middleware' => 'auth'
], function () {
//    /user
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/', [UserController::class, 'store'])->name('user.store');
    Route::get('/{user}', [UserController::class, 'show'])->name('user.show');
    Route::get('/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/update/{user}', [UserController::class, 'update'])->name('user.update');
    Route::get('/delete/{user}', [UserController::class, 'destroy'])->name('user.destroy');
});

Route::group([
    'prefix' => 'author',
    'middleware' => 'auth'
], function () {
    Route::get('/', [AuthorController::class, 'index'])->name('author.index');
    Route::get('/create', [AuthorController::class, 'create'])->name('author.create');
    Route::post('/', [AuthorController::class, 'store'])->name('author.store');
    Route::get('/{author}', [AuthorController::class, 'show'])->name('author.show');
    Route::get('/edit/{author}', [AuthorController::class, 'edit'])->name('author.edit');
    Route::post('/update/{author}', [AuthorController::class, 'update'])->name('author.update');
    Route::get('/delete/{author}', [AuthorController::class, 'destroy'])->name('author.destroy');
});

Route::group([
    'prefix' => 'borrowing-form',
    'middleware' => 'auth'
], function () {
    Route::get('/', [BookBorrowingFormController::class, 'index'])->name('borrowing-form.index');
    Route::get('/create', [BookBorrowingFormController::class, 'create'])->name('borrowing-form.create');
    Route::post('/', [BookBorrowingFormController::class, 'store'])->name('borrowing-form.store');
    Route::get('/{borrowingForm}', [BookBorrowingFormController::class, 'show'])->name('borrowing-form.show');
    Route::get('/edit/{borrowingForm}', [BookBorrowingFormController::class, 'edit'])->name('borrowing-form.edit');
    Route::post('/update/{borrowingForm}', [BookBorrowingFormController::class, 'update'])->name('borrowing-form.update');
    Route::get('/delete/{borrowingForm}', [BookBorrowingFormController::class, 'destroy'])->name('borrowing-form.destroy');
});
Route::group([
    'prefix' => 'purchase-form',
    'middleware' => 'auth'
], function () {
    Route::get('/', [BookPurchaseFormController::class, 'index'])->name('purchase-form.index');
    Route::get('/create', [BookPurchaseFormController::class, 'create'])->name('purchase-form.create');
    Route::post('/', [BookPurchaseFormController::class, 'store'])->name('purchase-form.store');
    Route::get('/{purchaseForm}', [BookPurchaseFormController::class, 'show'])->name('purchase-form.show');
    Route::get('/edit/{purchaseForm}', [BookPurchaseFormController::class, 'edit'])->name('purchase-form.edit');
    Route::post('/update/{purchaseForm}', [BookPurchaseFormController::class, 'update'])->name('purchase-form.update');
    Route::get('/delete/{purchaseForm}', [BookPurchaseFormController::class, 'destroy'])->name('purchase-form.destroy');
});




