<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DropDownController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HourMeterController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\ParentMachineController;
use App\Http\Controllers\PartMachineController;
use App\Http\Controllers\ReplacementController;
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

Route::middleware('auth')->group(function () {
    Route::get('/', HomeController::class)->name('home');

    Route::resource('departments', DepartmentController::class)->middleware('isAdmin');
    Route::resource('parentmachines', ParentMachineController::class)->middleware('isAdmin');
    Route::resource('machines', MachineController::class)->middleware('isAdmin');
    Route::resource('partmachines', PartMachineController::class)->middleware('isAdmin');

    Route::resources([
        'hourmeters'       => HourMeterController::class,
        'replacements'      => ReplacementController::class,
    ]);

    Route::resource('account', AccountController::class);

    Route::get('parentmachine', [DropDownController::class, 'getParentMachine'])->name('parentmachine');
    Route::get('machine', [DropDownController::class, 'getMachine'])->name('machine');
    Route::get('partmachine', [DropDownController::class, 'getPartMachine'])->name('partmachine');

    Route::get('logout', LogoutController::class)->name('logout');
});

Route::resources([
    'register'  => RegisterController::class,
    'login'     => LoginController::class,
]);
