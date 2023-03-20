<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DepartmentController;
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
    Route::get('/', function () {
        return view('dashboard');
    });
    Route::resources([
        'departments'       => DepartmentController::class,
        'parent-machines'   => ParentMachineController::class,
        'machines'          => MachineController::class,
        'part-machines'     => PartMachineController::class,
        'hour-meters'       => HourMeterController::class,
        'replacements'      => ReplacementController::class,
    ]);
    Route::get('logout', LogoutController::class)->name('logout');
});


Route::resources([
    'register'  => RegisterController::class,
    'login'     => LoginController::class,
]);
