<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PharmacyDashboardController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SearchController;

// Public Routes

Route::get('/', [AuthController::class, 'home'])->name('home');

Route::get('/about', [AuthController::class, 'about'])->name('about');

Route::get('/contact', [AuthController::class, 'contact'])->name('contact');

//Authentication Routes

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate'])->name('login.post');

Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register', [AuthController::class, 'store'])->name('register.store');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Admin Routes

Route::middleware(['auth','admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

});

// Patient Routes

Route::middleware(['auth','patient'])->group(function () {

    Route::get('/patient/dashboard', [PatientController::class, 'dashboard'])->name('patient.dashboard');

});

//Pharmacy Routes

Route::middleware(['auth','pharmacy'])->group(function () {

    Route::get('/pharmacy/dashboard', [PharmacyController::class, 'dashboard'])->name('pharmacy.dashboard');

});

// Hospital Routes

Route::middleware(['auth','hospital'])->group(function () {

    Route::get('/hospital/dashboard', [HospitalController::class, 'dashboard'])->name('hospital.dashboard');

});

// Category Routes

Route::middleware(['auth','admin'])->group(function () {

    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');

    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');

    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');

    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');

    Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');

    Route::delete('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

});

// Medicine Routes

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/medicine', [MedicineController::class, 'index'])->name('medicine.index');

    Route::get('/medicine/create', [MedicineController::class, 'create'])->name('medicine.create');

    Route::post('/medicine/store', [MedicineController::class, 'store'])->name('medicine.store');

    Route::get('/medicine/edit/{id}', [MedicineController::class, 'edit'])->name('medicine.edit');

    Route::put('/medicine/update/{id}', [MedicineController::class, 'update'])->name('medicine.update');

    Route::delete('/medicine/delete/{id}', [MedicineController::class, 'destroy'])->name('medicine.destroy');

});

// Purchase Routes

Route::middleware(['auth','admin'])->group(function () {

    Route::get('/purchase', [PurchaseController::class, 'index'])->name('purchase.index');

    Route::get('/purchase/create', [PurchaseController::class, 'create'])->name('purchase.create');

    Route::post('/purchase/store', [PurchaseController::class, 'store'])->name('purchase.store');

    Route::get('/purchase/edit/{id}', [PurchaseController::class, 'edit'])->name('purchase.edit');

    Route::put('/purchase/update/{id}', [PurchaseController::class, 'update'])->name('purchase.update');

    Route::delete('/purchase/delete/{id}', [PurchaseController::class, 'destroy'])->name('purchase.destroy');

});

// Sale Routes

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/sale', [SaleController::class, 'index'])->name('sale.index');

    Route::get('/sale/create', [SaleController::class, 'create'])->name('sale.create');

    Route::post('/sale/store', [SaleController::class, 'store'])->name('sale.store');

    Route::get('/sale/edit/{id}', [SaleController::class, 'edit'])->name('sale.edit');

    Route::put('/sale/update/{id}', [SaleController::class, 'update'])->name('sale.update');

    Route::delete('/sale/delete/{id}', [SaleController::class, 'destroy'])->name('sale.destroy');

});


Route::middleware(['auth','admin'])->group(function () {

    Route::get('/notification', [NotificationController::class, 'index'])->name('notification.index');

});


Route::middleware(['auth','admin'])->group(function () {

    Route::get('/reports/purchase',[ReportController::class,'purchaseReport'])->name('reports.purchase');

    Route::get('/reports/sale',[ReportController::class,'saleReport'])->name('reports.sale');

    Route::get('/reports/stock',[ReportController::class,'stockReport'])->name('reports.stock');

});

Route::get('/search', [SearchController::class, 'index'])->name('search.index');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');


Route::middleware(['auth'])->group(function () {

    Route::get('/pharmacy/dashboard',[PharmacyDashboardController::class, 'index'])->name('pharmacy.dashboard');

});

