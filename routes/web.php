<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AddReviewController;
use App\Http\Controllers\ReviewController;

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

Route::get('/', [ProductController::class, 'RequestData'])->name('home');
Route::get('/search', [ProductController::class, 'InputKeyword'])->name('search');
Route::get('/product/{product}', [ProductController::class, 'DetailProduct'])->name('detail');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', function () {
        return view('login');
    })->name('login');
    Route::get('/register', function () {
        return view('register');
    })->name('register');
    Route::post('/register', [RegisterController::class, 'SubmitFormRegister']);
    Route::post('/login', [LoginController::class, 'SubmitFormLogin']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/secret', function () {
        return 'secret';
    })->name('secret');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


    Route::post('/review/{product}', [AddReviewController::class, 'ValidateReviewForm'])->name('add-review');
    Route::delete('/review/{review}', [ReviewController::class, 'ValidateUserData'])->name('delete-review');

    // SELLER AREA
    Route::get('/register-seller', function () {
        return view('register-seller');
    })->name('register-product-owner');

    Route::post('/register-seller', [RegisterController::class, 'RegisterProductOwner'])->name('register-product-owner-post');

    Route::get('/product', [ProductController::class, 'DisplayProductForProductOwner'])->name('product-owner-page');
    Route::get('/product-add', [ProductController::class, 'DisplayAddProductView'])->name('add-product-page');
    Route::post('/product-add', [ProductController::class, 'ValidateReviewForm'])->name('add-product');
    Route::delete('/product/{product}', [ProductController::class, 'ClickDeleteButton'])->name('delete-product');
    Route::get('/product/{product}/edit', [ProductController::class, 'DisplayProductView'])->name('display-edit-product');
    Route::put('/product/{product}', [ProductController::class, 'SubmitFormUpdateProduct'])->name('edit-product');


    Route::get('/review/{review}', [ReviewController::class, 'DisplayFormView'])->name('display-edit-review');
    Route::put('/review/{review}', [ReviewController::class, 'SubmitFormReview'])->name('edit-review');
    
});
