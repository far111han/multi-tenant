<?php

use Illuminate\Support\Facades\Route;


Route::resource('tenantUsers', App\Http\Controllers\TenantUserController::class);


Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index']);
Route::get('/admin/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index']);

Route::get('/admin/login', [App\Http\Controllers\Auth\LoginController::class, 'showAdminLoginForm'])->name('login');
Route::get('/admin/logout', [App\Http\Controllers\Admin\AdminController::class, 'adminLogout']);

Route::post('/admin/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'adminLogin']);


 // Route::view('/admin', 'admin.admin');
Route::get('/admin/profile', [App\Http\Controllers\Admin\AdminController::class, 'profile']);
Route::post('admin/validate/profile', [App\Http\Controllers\Admin\AdminController::class, 'validateUser']);
Route::post('admin/profile/update', [App\Http\Controllers\Admin\AdminController::class, 'saveProfile']);
//Roles
Route::get('/admin/user-roles', [App\Http\Controllers\Admin\UserRoleController::class, 'userRole'])->name('admin.user-roles');
Route::get('/admin/user-roles/create', [App\Http\Controllers\Admin\UserRoleController::class, 'createRole'])->name('userRole.create');
Route::get('/admin/user-roles/edit/{role}', [App\Http\Controllers\Admin\UserRoleController::class, 'editRole'])->name('userRole.edit');
Route::get('/admin/user-roles/view/{role}', [App\Http\Controllers\Admin\UserRoleController::class, 'viewRole'])->name('userRole.view');
Route::post('/admin/user-roles/save', [App\Http\Controllers\Admin\UserRoleController::class, 'roleSave']);
Route::post('/admin/user-roles/delete', [App\Http\Controllers\Admin\UserRoleController::class, 'roleDelete']);
Route::post('/admin/user-roles/status', [App\Http\Controllers\Admin\UserRoleController::class, 'roleStatus']);
Route::post('/admin/user-roles/status', [App\Http\Controllers\Admin\UserRoleController::class, 'roleStatus']);

//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});
