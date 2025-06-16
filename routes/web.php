<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\StockInController;
use App\Http\Controllers\StockOutController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('categories', CategoryController::class);
    Route::resource('items', ItemController::class);
    Route::get('/export-items', [App\Http\Controllers\ExportController::class, 'exportItems'])->name('export.items');
    Route::resource('stock-ins', StockInController::class);
    Route::get('/export-stock-ins', [App\Http\Controllers\ExportController::class, 'exportStockIns'])->name('export.stockins');
    Route::resource('stock-outs', StockOutController::class);
    Route::get('/export-stock-outs', [App\Http\Controllers\ExportController::class, 'exportStockOuts'])->name('export.stockouts');

});

Route::get('/argon', function () {
    return view('layouts.argon');
})->middleware(['auth']);

Route::middleware(['auth', 'can:manage-users'])->group(function () {
    Route::resource('users', UserController::class);
});

require __DIR__.'/auth.php';
