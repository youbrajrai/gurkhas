<?php
/**
 * -----------------------------------------------------------------
 * NOTE : There is two routes has a name (user & group),
 * any change in these two route's name may cause an issue
 * if not modified in all places that used in (e.g Chatify class,
 * Controllers, chatify javascript file...).
 * -----------------------------------------------------------------
 */

use Illuminate\Support\Facades\Route;
use Admin\Controllers\ChargeTypeController;
use Admin\Controllers\FiscalYearController;
use Admin\Controllers\NoticeTypeController;
use Admin\Controllers\VendorTypeController;
use Admin\Controllers\DocumentTypeController;
use Admin\Controllers\InterestHeadController;
use Admin\Controllers\CommitteeLevelController;
use Admin\Controllers\VendorCategoryController;
use Admin\Controllers\SubDocumentTypeController;
use Admin\Controllers\SubCommitteeLevelController;
use Admin\Controllers\StandardTerrifHeadController;

Route::middleware(['web', 'auth'])
    ->group(function () {
        Route::resource('interesthead', InterestHeadController::class)->except('create');
        Route::resource('standardterrifhead', StandardTerrifHeadController::class)->except('create');
        Route::resource('vendortype', VendorTypeController::class)->except('create');
        Route::resource('vendorcategory', VendorCategoryController::class)->except('create');
        Route::resource('documenttype', DocumentTypeController::class)->except('create');
        Route::resource('subdocumenttype', SubDocumentTypeController::class)->except('create');
        Route::resource('chargetype', ChargeTypeController::class)->except('create');
        Route::resource('noticetype', NoticeTypeController::class)->except('create');
        Route::resource('committeelevel', CommitteeLevelController::class)->except('create');
        Route::resource('subcommitteelevel', SubCommitteeLevelController::class)->except('create');
        Route::resource('fiscalyear', FiscalYearController::class)->except('create');
    });
