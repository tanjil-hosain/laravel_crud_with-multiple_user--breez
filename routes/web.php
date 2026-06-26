<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Auth\RegistredAdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('register',[RegistredAdminController::class,'create'])->name('register');
    Route::post('register',[RegistredAdminController::class,'store'])->name('register.store');

    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('login.post');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', function () {
        return view('backend.dashboard');
    })->middleware('auth:admin')->name('admin.dashboard');

    Route::resource('product',ProductController::class);
    Route::resource('category',CategoryController::class);
    Route::resource('sub_category',SubCategoryController::class);

});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
