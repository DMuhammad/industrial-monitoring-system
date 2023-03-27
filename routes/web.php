<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DropdownController;
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

    // Route::get('parentmachine/{id}', [DropdownController::class, 'getParentMachine']);
    Route::get('parentmachine/{id}', [DropdownController::class, 'getParentMachine']);
    Route::get('machine/{id}', [DropdownController::class, 'getMachine']);
    Route::get('partmachine/{id}', [DropdownController::class, 'getPartMachine']);

    Route::get('logout', LogoutController::class)->name('logout');
});

Route::resources([
    'register'  => RegisterController::class,
    'login'     => LoginController::class,
]);