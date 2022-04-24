<?php

use App\Http\Controllers\ForkliftController;
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

Route::get('/', [ForkliftController::class, 'index'])->middleware(['auth', 'verified'])->name('home');
Route::get('/lyftarar/{model}', [ForkliftController::class, 'show'])->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
