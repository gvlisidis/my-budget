<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\KeywordController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});

Route::middleware(['auth'])->group(function (){
    Route::get('/', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/expenses', function () {
        return Inertia::render('Expenses');
    })->name('expenses');

    Route::prefix('categories')->name('categories.')->group(function (){
        Route::get('', [CategoryController::class, 'index'])->name('index');
        Route::get('create', [CategoryController::class, 'create'])->name('create');
        Route::post('', [CategoryController::class, 'store'])->name('store');
        Route::get('{category}', [CategoryController::class, 'edit'])->name('edit');
        Route::patch('{category}', [CategoryController::class, 'update'])->name('update');
//        Route::delete('{category}', [CategoryController::class, 'delete'])->name('delete');
    });

    Route::prefix('keywords')->name('keywords.')->group(function (){
        Route::post('', [KeywordController::class, 'store'])->name('store');
//        Route::delete('{keyword}', [KeywordController::class, 'delete'])->name('delete');
    });

    Route::get('/new-ideas', function () {
        return Inertia::render('Todo/Ideas');
    })->name('new-ideas');
});

require __DIR__.'/auth.php';
