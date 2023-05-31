<?php
/**
 * -----------------------------------------------------------------
 * NOTE : There is two routes has a name (user & group),
 * any change in these two route's name may cause an issue
 * if not modified in all places that used in (e.g Chatify class,
 * Controllers, chatify javascript file...).
 * -----------------------------------------------------------------
 */

use User\Controllers\ProfileController;
use User\Controllers\RoleController;
use User\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use User\Controllers\BranchController;
use User\Controllers\PositionController;
use User\Controllers\DepartmentController;
use User\Controllers\PermissionController;

Route::middleware(['web', 'auth'])
    ->group(function () {
        Route::resource('permissions',PermissionController::class)->except('create','show');
        Route::resource('roles',RoleController::class)->except('create','show');
        Route::resource('user',UserController::class)->except('create','show');
        Route::resource('branch',BranchController::class)->except('create','show');
        Route::resource('position',PositionController::class)->except('create','show');
        Route::resource('department',DepartmentController::class)->except('create','show');
        Route::get('profile',[ProfileController::class,'profile'])->name('profile');
        Route::put('update-profile/{user}',[ProfileController::class,'update_profile'])->name('update_profile');
    });
