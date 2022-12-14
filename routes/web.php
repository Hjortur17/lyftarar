<?php

use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\ForkliftController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UsersController;
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

Route::middleware('password.reset')->group(function () {
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/', [PageController::class, 'index'])->name('Home');

        Route::prefix('/lyftarar')->group(function () {
            Route::get('/', [ForkliftController::class, 'index'])->name('forklifts');
            Route::get('/bæta', [ForkliftController::class, 'create'])->name('forklifts.create');
            Route::post('/bæta', [ForkliftController::class, 'store'])->name('forklifts.store');
            Route::get('/{model}', [ForkliftController::class, 'show'])->name('forklifts.show');
            Route::put('/{forklift}', [ForkliftController::class, 'update'])->name('forklifts.update');
            Route::delete('/{forklift}', [ForkliftController::class, 'destroy'])->name('forklifts.destroy');

            Route::post('/leita', [ForkliftController::class, 'search'])->name('forklifts.search');
        });

        Route::get('/saga', [ServiceController::class, 'index'])->name('services');
        Route::post('/saga/bæta', [ServiceController::class, 'store'])->name('service.store');

        Route::get('/tæki', [EquipmentController::class, 'index'])->name('equipments.index');
        Route::get('/tæki/bæta', [EquipmentController::class, 'create'])->name('equipments.create');
        Route::post('/tæki/bæta', [EquipmentController::class, 'store'])->name('equipments.store');
        Route::delete('/tæki/{equipment}', [EquipmentController::class, 'destroy'])->name('equipments.destroy');

        Route::get('/notendur', [UsersController::class, 'index'])->name('users')->middleware('can:admin');
        Route::delete('/notendur/{user}', [UsersController::class, 'destroy'])->name('users.destroy')->middleware('can:admin');
    });
});

require __DIR__.'/auth.php';
