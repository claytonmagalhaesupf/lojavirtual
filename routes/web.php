<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TypesController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index']);

Route::get('/contato', function () {
    return view('contact');
})->name('contato');

Route::get('/dashboard', function () {
    $totalProducts = Product::count();

    return view('dashboard', compact('totalProducts'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/products', [ProductsController::class, 'index'])->name('products');
    Route::get('/products/new', [ProductsController::class, 'create'])->name('products.create');
    Route::post('/products/new', [ProductsController::class, 'store'])->name('products.store');

    Route::get('/products/update/{id}', [ProductsController::class, 'edit'])->name('products.edit');
    Route::post('/products/update/', [ProductsController::class, 'update'])->name('products.update');
    Route::get('/products/delete/{id}', [ProductsController::class, 'destroy'])->name('products.destroy');

    Route::get('/types/new', [TypesController::class, 'create'])->name('types.create');

    Route::get('/products/report', [ProductsController::class, 'report'])->name('products.report');
    Route::get('/products/report/pdf', [ProductsController::class, 'reportPdf'])->name('products.report.pdf');
});

Route::get('/api/products', [ProductsController::class, 'apiIndex'])->name('products.api.index');

require __DIR__ . '/auth.php';