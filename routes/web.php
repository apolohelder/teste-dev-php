<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SairController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('login', [LoginController::class, 'loginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('produtos/{name}', [ProductController::class, 'show'])->name('auth.produtos.show');
Route::get('fornecedores/{name}', [SupplierController::class, 'show'])->name('suppliers.show');

Route::middleware('auth')->group(function () {

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    Route::get('admin/usuarios', [UserController::class, 'index'])->name('users.index');
    Route::get('admin/usuarios/cadastrar', [UserController::class, 'create'])->name('users.create');
    Route::get('admin/usuarios/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('admin/usuarios', [UserController::class, 'store'])->name('users.store');
    Route::put('admin/usuarios/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('admin/usuarios/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('admin/fornecedores', [SupplierController::class, 'index'])->name('suppliers.index');
    Route::get('admin/fornecedores/cadastrar', [SupplierController::class, 'create'])->name('suppliers.create');
    Route::get('admin/fornecedores/{id}/edit', [SupplierController::class, 'edit'])->name('suppliers.edit');
    Route::post('admin/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');
    Route::put('admin/suppliers/{id}', [SupplierController::class, 'update'])->name('suppliers.update');
    Route::delete('admin/suppliers/{id}', [SupplierController::class, 'destroy'])->name('suppliers.destroy');

    Route::get('admin/produtos', [ProductController::class, 'index'])->name('products.index');
    Route::get('admin/produtos/cadastrar', [ProductController::class, 'create'])->name('products.create');
    Route::get('admin/produtos/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::post('admin/produtos', [ProductController::class, 'store'])->name('products.store');
    Route::put('admin/produtos/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('admin/produtos/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    
});