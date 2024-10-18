<?php

use App\Http\Controllers\CaptchaController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MyOrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ShoppingcartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/category/{id}', [ProductController::class, 'showByCategory'])->name('products.category');
Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

Route::get('/vacancies', [VacancyController::class, 'index'])->name('vacancies.index');
Route::get('/vacancy/{id}', [VacancyController::class, 'show'])->name('vacancies.show');

Route::get('/shoppingcart', [ShoppingcartController::class, 'index'])->name('shoppingcart');
Route::post('/shoppingcart', [ShoppingcartController::class, 'updateCart'])->name('shoppingcart');

Route::get('/payment', function () {
    session_start();

    return view('payment');
})->name('payment');

Route::post('/payment', [ShoppingcartController::class, 'updateCart'])->name('payment');

Route::middleware('auth')->group(function () {
    // Dashboards
    Route::get('/managementDashboard', function () {
        return view('managementDashboard');
    })->middleware(['auth', 'verified'])->name('managementDashboard');

    Route::get('/employeedashboard', function () {
        return view('employeeDashboard');
    })->middleware(['auth', 'verified'])->name('employeeDashboard');

    Route::get('/customerdashboard', function () {
        return view('customerDashboard');
    })->middleware(['auth', 'verified'])->name('customerDashboard');

    // Products
    Route::get('/products/employee', [ProductController::class, 'indexForEmployees'])->name('products.indexForEmployees');
    Route::get('/products/employee/{id}', [ProductController::class, 'showForEmployees'])->name('products.showForEmployees');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::post('/products/edit/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/employee/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

    // Users / Management
    Route::get('/users/admin', [UserController::class, 'index'])->name('management.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('management.create');
    Route::post('/users', [UserController::class, 'store'])->name('management.store');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('management.edit');
    Route::post('/users/edit/{id}', [UserController::class, 'update'])->name('management.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('management.destroy');

    // Orders
    Route::get('/myOrders', [MyOrderController::class, 'index'])->name('myOrders');
    Route::post('/myOrders', [MyOrderController::class, 'store'])->name('myOrders');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [CaptchaController::class, 'index'])->name('get.captcha');
Route::post('/my-captcha', [CaptchaController::class, 'submitCaptcha'])->name('submit.captcha');
Route::get('/refresh_captcha', [CaptchaController::class, 'refreshCaptcha'])->name('refresh.captcha');

Route::get('/', function () {
    return view('home');
})->name('home');

Route::post(uri: '/language-switch', action: [LanguageController::class, 'languageSwitch'])->name(name: 'language.switch');

require __DIR__ . '/auth.php';
