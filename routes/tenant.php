<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    \Stancl\Tenancy\Middleware\InitializeTenancyByPath::class,
])->group(function () {
    Route::resource('/tenant', \App\Http\Controllers\Panel\TenantController::class)
        ->only('show');

    Route::resource('tenant/{tenant}/account', \App\Http\Controllers\Tenant\AccountController::class);
    Route::resource('tenant/{tenant}/category', \App\Http\Controllers\Tenant\CategoryController::class);

    Route::get('tenant/{tenant}/openbank', [\App\Http\Controllers\Tenant\Services\NordigenController::class, 'index'])
        ->name('openbank.index');
    Route::get('tenant/{tenant}/openbank/create', [\App\Http\Controllers\Tenant\Services\NordigenController::class, 'create'])
        ->name('openbank.create');
    Route::get('tenant/{tenant}/callback', [\App\Http\Controllers\Tenant\Services\NordigenController::class, 'store'])
        ->name('openbank.callback');
    Route::get('tenant/{tenant}/openbank/{id}', [\App\Http\Controllers\Tenant\Services\NordigenController::class, 'show'])
        ->name('openbank.show');
});
