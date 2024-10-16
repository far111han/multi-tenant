<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

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
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/', function () {
        return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    });


    Route::get('/', [App\Http\Controllers\Organization\Auth\LoginController::class, 'index']);
    Route::get('user/login', [App\Http\Controllers\Organization\Auth\LoginController::class, 'showAdminLoginForm'])->name('organization.login');
    Route::post('user/login', [App\Http\Controllers\Organization\Auth\LoginController::class, 'OrgLogin']);
    Route::get('user/logout', [App\Http\Controllers\Organization\Auth\LoginController::class, 'OrgLogout']);
    Route::get('user/register', [App\Http\Controllers\Organization\Auth\LoginController::class, 'orgRegister'])->name('organization.register');

    Route::get('user/dashboard', [App\Http\Controllers\Organization\Auth\DashboardController::class, 'index']);

});
