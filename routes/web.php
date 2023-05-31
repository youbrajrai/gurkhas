<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
// use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('home');
Route::get('/team',[HomeController::class, 'team'])->name('team');
Route::get('/boards',[HomeController::class, 'board'])->name('board');
Route::get('/branches',[HomeController::class, 'branches'])->name('branches');
Route::get('/SOC',[HomeController::class, 'SOC'])->name('SOC');
Route::get('/SOC_archive',[HomeController::class, 'SOC_archive'])->name('SOC_archive');
Route::get('/interest_rate',[HomeController::class, 'interest_rate'])->name('interest_rate');
Route::get('/vendor_contacts_index',[HomeController::class, 'vendor_contacts_index'])->name('vendor_contacts_index');
Route::get('/documents',[HomeController::class, 'documents'])->name('documents');
Route::get('/circulars',[HomeController::class, 'circulars'])->name('circulars');
Route::get('/hr_circulars',[HomeController::class, 'hr_circulars'])->name('hr_circulars');
Route::get('/admin_circulars',[HomeController::class, 'admin_circulars'])->name('admin_circulars');
Route::get('/finance_circulars',[HomeController::class, 'finance_circulars'])->name('finance_circulars');
Route::get('/rates_archive',[HomeController::class, 'rates_archive'])->name('rates_archive');
Route::get('/comittee_aml_cft',[HomeController::class, 'comittee_aml_cft'])->name('comittee_aml_cft');
Route::get('/comittee_audit',[HomeController::class, 'comittee_audit'])->name('comittee_audit');
Route::get('/comittee_executive_level',[HomeController::class, 'comittee_executive_level'])->name('comittee_executive_level');
Route::get('/comittee_financial_administration',[HomeController::class, 'comittee_financial_administration'])->name('comittee_financial_administration');
Route::get('/comittee_head_of_department',[HomeController::class, 'comittee_head_of_department'])->name('comittee_head_of_department');
Route::get('/comittee_hr_facility',[HomeController::class, 'comittee_hr_facility'])->name('comittee_hr_facility');
Route::get('/comittee_risk_management',[HomeController::class, 'comittee_risk_management'])->name('comittee_risk_management');



Route::get('/dashboard', function () {
    return view('themes.gurkhas.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
