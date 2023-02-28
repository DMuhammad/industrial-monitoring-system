<?php

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
    return view('welcome');
});

Route::resource('/department', App\Http\Controllers\DepartmentController::class);
Route::resource('/parentmachine', App\Http\Controllers\ParentMachineController::class);
Route::resource('/machine', App\Http\Controllers\MachineController::class);
Route::resource('/partmachine', App\Http\Controllers\PartMachineController::class);
Route::resource('/hourmeter', App\Http\Controllers\HourMeterController::class);
Route::resource('/replacement', App\Http\Controllers\ReplacementController::class);