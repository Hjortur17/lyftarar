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
            Route::get('', [ForkliftController::class, 'index'])->name('forklifts');
            Route::get('/bæta', [ForkliftController::class, 'create'])->name('forklifts.create');
            Route::post('/bæta', [ForkliftController::class, 'store'])->name('forklifts.store');
            Route::get('/{model}', [ForkliftController::class, 'show'])->name('forklifts.show');
            Route::put('/{forklift}', [ForkliftController::class, 'update'])->name('forklifts.update');
            Route::delete('/{forklift}', [ForkliftController::class, 'destroy'])->name('forklifts.destroy');
            Route::put('/{forklift}/tæki', [ForkliftController::class, 'edit']);

            Route::post('/leita', [ForkliftController::class, 'search'])->name('forklifts.search');
        });

        Route::prefix('/saga')->group(function () {
            Route::get('', [ServiceController::class, 'index'])->name('services');
            Route::patch('/uppfæra/{service}', [ServiceController::class, 'update'])->name('services.update');
            Route::post('/bæta', [ServiceController::class, 'store'])->name('service.store');
        });

        Route::prefix('/tæki')->group(function () {
            Route::get('', [EquipmentController::class, 'index'])->name('equipments.index');
            Route::get('/bæta', [EquipmentController::class, 'create'])->name('equipments.create');
            Route::post('/bæta', [EquipmentController::class, 'store'])->name('equipments.store');
            Route::put('/tengja', [EquipmentController::class, 'edit'])->name('equipments.edit');
            Route::put('/aftengja', [EquipmentController::class, 'remove'])->name('equipments.remove');
            Route::delete('/{equipment}', [EquipmentController::class, 'destroy'])->name('equipments.destroy');
        });

        Route::get('/notendur', [UsersController::class, 'index'])->name('users')->middleware('can:admin');
        Route::delete('/notendur/{user}', [UsersController::class, 'destroy'])->name('users.destroy')->middleware('can:admin');
    });
});

require __DIR__ . '/auth.php';
