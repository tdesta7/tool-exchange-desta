<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'welcome']);

Route::get('/phpinfo', [HomeController::class, 'phpinfo']);

Route::get('/dashboard', [HomeController::class, 'dashboard'])
    ->middleware(['auth'])->name('dashboard');

Route::prefix('/pets')->middleware(['auth'])->group(function() {
    Route::get('/', [PetController::class, 'index'])->name('viewPets');
    Route::get('/create', [PetController::class, 'create'])->name('viewForm');
    Route::post('/store', [PetController::class, 'store']);
    Route::put('/store', [PetController::class, 'update']);
    Route::get('/edit/{id}', [PetController::class, 'edit'])->name('editForm');
});

require __DIR__.'/auth.php';
