<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PDFController;



Route::get('/', [AuthController::class, 'index']);
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('postlogin', [AuthController::class, 'login'])->name('postlogin');
Route::get('signup', [AuthController::class, 'signup'])->name('register-user');
Route::post('postsignup', [AuthController::class, 'signupsave'])->name('postsignup');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    // product
    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::get('/product/add', [ProductController::class, 'create'])->name('product.create');
    Route::post('/products', [ProductController::class, 'store'])->name('product.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('/products', [ProductController::class, 'getTotalProducts']);

    // mengambil total product
    Route::get('/dashboard', [HomeController::class, 'showDashboard']);
    Route::post('/get-product-data', [ProductController::class, 'getTotalProductData']);
    Route::get('/getProductDataByYear/{year}', [ProductController::class, 'getProductDataByYear']);

    // report
    Route::get('/report', [ReportController::class, 'index'])->name('report');
    Route::get('/get-revenue-data', [ReportController::class, 'getRevenueData'])->name('get-revenue-data');
    Route::get('/get-income-data', [ReportController::class, 'getIncomeData'])->name('get-income-data');
    Route::get('/report', [ReportController::class, 'getProductData'])->name('get-product-data');

    // memanggil data pertahun
    Route::post('/get-revenue-by-year', [ProductController::class, 'getRevenueByYearRevenue']);
    Route::post('/get-income-by-year', [ProductController::class, 'getRevenueByYearIncome']);
    Route::get('/get-product-data', [ProductController::class, 'getProductDataByCategoryAndYear']);

    //Export
    Route::get('report/export/excel/{year}', [ReportController::class, 'export_excel']);
    Route::get('/pdf{year}', [PDFController::class, 'ExportPDF'])->name('exportpdf');

});
