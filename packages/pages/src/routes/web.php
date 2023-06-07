<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;

use Pages\Controllers\LoanController;
use Pages\Controllers\RateController;
use Pages\Controllers\BoardController;
use Pages\Controllers\LeaveController;
use Pages\Controllers\ChargeController;
use Pages\Controllers\NoticeController;
use Pages\Controllers\PolicyController;
use Pages\Controllers\VendorController;
use Pages\Controllers\ContractController;
use Pages\Controllers\DocumentController;
use Pages\Controllers\CommitteeController;
use Pages\Controllers\InsuranceController;
use Pages\Controllers\OutstationController;
use Pages\Controllers\LoanDepositController;
use Pages\Controllers\FixedDepositController;
use Pages\Controllers\DepriveSectorController;
use Pages\Controllers\FixedInterestController;
use Pages\Controllers\SavingDepositController;
use Pages\Controllers\StandardTerrifController;

Route::middleware(['web', 'auth'])
    ->group(function () {
        Route::resource('outstation', OutstationController::class)->except('create');
        Route::resource('policy', PolicyController::class)->except('create');
        Route::resource('leave', LeaveController::class)->except('create');
        Route::resource('notice', NoticeController::class)->except('create');
        Route::resource('rate', RateController::class)->except('create');
        Route::resource('charge', ChargeController::class)->except('create');
        Route::resource('document', DocumentController::class)->except('create');
        Route::resource('committee', CommitteeController::class)->except('create');
        Route::resource('vendor', VendorController::class)->except('create');
        Route::resource('contract', ContractController::class)->except('create');
        Route::resource('insurance', InsuranceController::class)->except('create');
        Route::resource('board', BoardController::class)->except('create');
        Route::resource('fixeddeposit', FixedDepositController::class);
        Route::resource('savingdeposit', SavingDepositController::class);
        Route::resource('loan', LoanController::class);
        Route::resource('deprive_sector', DepriveSectorController::class);
        Route::resource('fixedinterest', FixedInterestController::class);
        Route::resource('standardterrif', StandardTerrifController::class);
        Route::resource('loandeposit', LoanDepositController::class);
        //to import loan deposit
        Route::post('import-loandeposit', [LoanDepositController::class, 'importLoanDeposit'])->name('import-loandeposit');
        //to find document sub-type by its type
        Route::get('/findSubDocument', [DocumentController::class, 'findSubDocument'])->name('findSubDocument');
        Route::get('/findSubCommitteeLevel', [CommitteeController::class, 'findSubCommitteeLevel'])->name('findSubCommitteeLevel');
        //artisan
        Route::get('/art', function (Request $request) {
            Artisan::call($request->cmd);
            echo "done";
        })->name('art');
    });
