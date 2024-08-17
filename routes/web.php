<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;


Route::get('/', function () {
    return view('main.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    route::get('admin/dashboard', [HomeController::class, 'adminDashboard'])->middleware(['auth','admin']);

    route::get('/admin/books',[BookController::class, 'index']);
    route::get('/admin/add-book',[BookController::class, 'add']);
    route::post('/admin/add-book',[BookController::class, 'store']);
    route::get('/admin/edit-book/{slug}',[BookController::class, 'edit']);
    route::post('/admin/edit-book/{slug}',[BookController::class, 'update']);
    route::get('/admin/delete-book/{slug}',[BookController::class, 'delete']);
    
    

    route::get('/admin/categories',[CategoryController::class, 'index']);
    route::get('/admin/add-category',[CategoryController::class, 'add']);
    route::post('/admin/add-category',[CategoryController::class, 'store']);
    route::get('/admin/edit-category/{slug}',[CategoryController::class, 'edit']);
    route::put('/admin/edit-category/{slug}',[CategoryController::class, 'update']);
    route::get('/admin/delete-category/{slug}',[CategoryController::class, 'delete']);
   
Route::middleware(['auth', 'member'])->group(function () {
    route::get('/main/dashboard', [HomeController::class, 'userDashboard'])->middleware(['auth','member']);
});
    
    
});




require __DIR__.'/auth.php';




