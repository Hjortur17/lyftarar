<?php

use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\ForkliftController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
use Illuminate\Foundation\Application;
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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [PageController::class, 'index'])->name('Home');

    Route::get('/lyftarar', [ForkliftController::class, 'index']);
    Route::get('/lyftarar/{model}', [ForkliftController::class, 'show']);

    Route::get('/saga', [ServiceController::class, 'index']);

    Route::get('/tæki', [EquipmentController::class, 'index']);
});

require __DIR__.'/auth.php';
