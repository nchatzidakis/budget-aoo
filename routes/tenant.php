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
    'auth',
    \Stancl\Tenancy\Middleware\InitializeTenancyByPath::class,
])->group(function () {
    Route::resource('/tenant', \App\Http\Controllers\Panel\TenantController::class)
        ->only('show');

    Route::resource('tenant/{tenant}/account', \App\Http\Controllers\Tenant\AccountController::class);
    Route::resource('tenant/{tenant}/category', \App\Http\Controllers\Tenant\CategoryController::class);
    Route::resource('tenant/{tenant}/expense', \App\Http\Controllers\Tenant\ExpenseController::class);
    Route::resource('tenant/{tenant}/bill', \App\Http\Controllers\Tenant\BillController::class);
    Route::resource('tenant/{tenant}/income', \App\Http\Controllers\Tenant\IncomeController::class);
    Route::resource('tenant/{tenant}/transfer', \App\Http\Controllers\Tenant\TransferController::class);

    Route::get('tenant/{tenant}/nordigen', [\App\Http\Controllers\Tenant\Services\NordigenController::class, 'index'])
        ->name('nordigen.index');
    Route::get('tenant/{tenant}/nordigen/create', [\App\Http\Controllers\Tenant\Services\NordigenController::class, 'create'])
        ->name('nordigen.create');
    Route::get('tenant/{tenant}/callback', [\App\Http\Controllers\Tenant\Services\NordigenController::class, 'store'])
        ->name('nordigen.callback');
    Route::get('tenant/{tenant}/nordigen/{id}', [\App\Http\Controllers\Tenant\Services\NordigenController::class, 'show'])
        ->name('nordigen.show');
});
