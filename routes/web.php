<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::get('login', [AuthController::class, 'login'])->middleware('guest')->name('login');
Route::post('login', [AuthController::class, 'authenticate'])->middleware('guest')->name('login');
Route::middleware('auth')->prefix('dashboard')->group(function(){
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('patient', PatientController::class);
    Route::get('search-patient', [PatientController::class, 'search'])->name('patient.search');
    Route::get('print-result/{patient}', [PatientController::class, 'printResult'])->name('print-result');
    Route::get('create-barcode/{patient}', [PatientController::class, 'createBarcode'])->name('patient.create-barcode');
    Route::resource('doctor', DoctorController::class);
    Route::get('delete-doctor/{doctor}', [DoctorController::class, 'confirmDelete'])->name('doctor.confirm-delete');
});
