<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Cpanel\DashboardController;
use App\Http\Controllers\Cpanel\FaqController;
use App\Http\Controllers\Cpanel\PackageController;
use App\Http\Controllers\Cpanel\PageController;
use App\Http\Controllers\Cpanel\SystemController;
use App\Http\Controllers\Cpanel\TransactionController;

use App\Http\Controllers\Frontpage\HomepageController as FeHomepageController;
use App\Http\Controllers\Frontpage\PaymentController as FePaymentController;
use App\Http\Controllers\Frontpage\PageController as FePageController;

Route::name('fe.')
->group(function () {
    Route::get('/', [FeHomepageController::class, 'index'])->name('homepage');
    Route::post('/checkout', [FePaymentController::class, 'checkout'])->name('payment-checkout');
    Route::post('/proof-payment', [FePaymentController::class, 'proof_payment'])->name('payment-proof');
    Route::get('/invoice', [FePaymentController::class, 'invoice'])->name('payment-invoice');
    Route::get('/page/{slug}', [FePageController::class, 'index'])->name('page');
});

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::prefix('cpanel/')
->middleware(['auth', 'verified'])
->name('cpanel.')
->group(function () {
    Route::get('/under-development', function () {
        return view('pages/cpanel/_extras/under-development');
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('transaction/')
    ->name('transaction.')
    ->group(function () {
        Route::get('/list', [TransactionController::class, 'index'])->name('list');
        Route::put('/update', [TransactionController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [TransactionController::class, 'delete'])->name('delete');
    });

    Route::prefix('faq/')
    ->name('faq.')
    ->group(function () {
        Route::get('/list', [FaqController::class, 'index'])->name('list');
        Route::get('/create', [FaqController::class, 'create'])->name('create');
        Route::post('/store', [FaqController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [FaqController::class, 'edit'])->name('edit');
        Route::put('/update', [FaqController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [FaqController::class, 'delete'])->name('delete');
    });

    Route::prefix('package/')
    ->name('package.')
    ->group(function () {
        Route::get('/list', [PackageController::class, 'index'])->name('list');
        Route::get('/create', [PackageController::class, 'create'])->name('create');
        Route::post('/store', [PackageController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [PackageController::class, 'edit'])->name('edit');
        Route::put('/update', [PackageController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [PackageController::class, 'delete'])->name('delete');
    });

    Route::prefix('page/')
    ->name('page.')
    ->group(function () {
        Route::get('/list', [PageController::class, 'index'])->name('list');
        Route::get('/create', [PageController::class, 'create'])->name('create');
        Route::post('/store', [PageController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [PageController::class, 'edit'])->name('edit');
        Route::put('/update', [PageController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [PageController::class, 'delete'])->name('delete');
    });

    Route::prefix('settings/')
    ->name('settings.')
    ->group(function () {
        Route::prefix('system/')
        ->name('system.')
        ->group(function () {
            Route::get('', [SystemController::class, 'index'])->name('list');
            Route::put('/update', [SystemController::class, 'update'])->name('update');
        });
    });
});

