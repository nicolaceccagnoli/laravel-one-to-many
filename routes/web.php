<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Admin\MainController as AdminMainController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\Typecontroller as AdminTypeController;



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

Route::get('/', [MainController::class, 'index'])->name('home');

// Definisco la rotta per mostrare i progetti ai Guest
Route::prefix('projects')
            ->name('projects.')
            ->group(function () {

            Route::get('/', [ProjectController::class, 'index'])->name('index');
            Route::get('/{project}', [ProjectController::class, 'show'])->name('show');
});

Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function () {

    Route::get('/dashboard', [AdminMainController::class, 'dashboard'])->name('dashboard');

    Route::resource('projects', AdminProjectController::class);

    Route::resource('categories', AdminTypeController::class);
});

require __DIR__.'/auth.php';
