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
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');

    Route::get('/itens', [\App\Http\Controllers\ItemController::class, 'index'])->name('items.index');
    Route::get('/formulario-novo-item', [\App\Http\Controllers\ItemController::class, 'create'])->name('items.create');
    Route::post('/criar-item', [\App\Http\Controllers\ItemController::class, 'store'])->name('items.store');

    Route::get('/entidades', [\App\Http\Controllers\EntidadeController::class, 'index'])->name('entidades.index');
    Route::get('/formulario-nova-entidade', [\App\Http\Controllers\EntidadeController::class, 'create'])->name('entidades.create');
    Route::post('/criar-entidade', [\App\Http\Controllers\EntidadeController::class, 'store'])->name('entidades.store');
    Route::delete('/entidades/{entidade}', [\App\Http\Controllers\EntidadeController::class, 'destroy'])->name('entidades.destroy');

    Route::get('/formulario-nova-coleta', [\App\Http\Controllers\ColetaController::class, 'create'])->name('coletas.create');
    Route::get('/coletas', [\App\Http\Controllers\ColetaController::class, 'index'])->name('coletas.index');
    Route::post('/criar-coleta', [\App\Http\Controllers\ColetaController::class, 'store'])->name('coletas.store');
    Route::delete('/coletas/{coleta}', [\App\Http\Controllers\ColetaController::class, 'destroy'])->name('coletas.destroy');

    Route::get('/criar-item', function () {
        return view('items.create');
    })->name('items.create');
});
