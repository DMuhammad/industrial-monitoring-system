<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login', ['title' => 'Login']);
});

Route::get('/register', function () {
    return view('auth.register', ['title' => 'Register']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::resource('/dashboard/departments', DepartmentController::class);
Route::resource('/dashboard/parent-machines', ParentMachineController::class);
Route::resource('/dashboard/machines', MachineController::class);
Route::resource('/dashboard/part-machines', PartMachineController::class);
Route::resource('/dashboard/hourmeters', HourMeterController::class);
Route::resource('/dashboard/replacements', ReplacementController::class);