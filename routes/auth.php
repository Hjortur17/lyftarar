<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('innskra', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('innskra', [AuthenticatedSessionController::class, 'store']);

    Route::get('gleymt-lykilorð', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('gleymt-lykilorð', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('endurstilla-lykilorð/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('endurstilla-lykilorð', [NewPasswordController::class, 'store'])
                ->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('nyskra', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('nyskra', [RegisteredUserController::class, 'store']);

    Route::get('staðfesta-netfang', [EmailVerificationPromptController::class, '__invoke'])
                ->name('verification.notice');

    Route::get('staðfesta-netfang/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('netfang/staðfestingar-tilkynning', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('staðfesta-lykilorð', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('staðfesta-lykilorð', [ConfirmablePasswordController::class, 'store']);

    Route::post('utskra', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
