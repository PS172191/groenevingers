<?php

use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\UserdataController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\EmployeeMiddleware;
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

Route::controller(LoginRegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

Route::middleware(['auth', AdminMiddleware::class])->group(function () {

    Route::resource('management', UserdataController::class);
    Route::put('/management/{employee}', [UserdataController::class, 'update'])->name('management.update');

    Route::get('/management', [UserdataController::class, 'index'])->name('management.index');
    Route::get('/management/create', [UserdataController::class, 'create'])->name('management.create');
    Route::post('/management', [UserdataController::class, 'store'])->name('management.store');
    Route::get('/management/{user}', [UserdataController::class, 'show'])->name('management.show');
    Route::get('/management/{user}/edit', [UserdataController::class, 'edit'])->name('management.edit');
    Route::put('/management/{user}', [UserdataController::class, 'update'])->name('management.update');
    Route::delete('/management/{user}', [UserdataController::class, 'destroy'])->name('management.destroy');

    Route::get('/product/{id}', [ProductController::class, 'show'])->name('management.product.show');

    Route::get('/sales', [SalesController::class, 'index'])->name('management.sales');
    // Route::get('/shifts', [ShiftController::class, 'index'])->name('management.shifts');
    Route::get('/inventory', [InventoryController::class, 'index'])->name('management.inventory');
    Route::get('/inventory/order', [InventoryController::class, 'orderView'])->name('management.wholesale');
    Route::post('/inventory/order', [InventoryController::class, 'order'])->name('inventory.order');

});

Route::middleware(['auth', EmployeeMiddleware::class])->group(function () {

    Route::get('/welcome', [EmployeeController::class, 'index'])->name('employee.welcome');
    Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.calendar');

    Route::get('/welcome', [CalendarController::class, 'welcome'])->name('employee.welcome');
    Route::get('/employee', [CalendarController::class, 'shifts'])->name('employee.shifts');

    Route::get('/absence', [AbsenceController::class, 'index'])->name('employee.absence');
    Route::post('/absence', [AbsenceController::class, 'store'])->name('absence.store');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('employee.checkout');
    Route::post('/generate-invoice', [CheckoutController::class, 'generateInvoice'])->name('generateInvoice');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
});
