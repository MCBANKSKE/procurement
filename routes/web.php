<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/export/products/{format}', [ReportController::class, 'exportProducts'])->name('export.products');
Route::get('/export/purchases/{format}', [ReportController::class, 'exportPurchases'])->name('export.purchases');
Route::get('/export/sales/{format}', [ReportController::class, 'exportSales'])->name('export.sales');