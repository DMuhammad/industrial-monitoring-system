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

Route::resource('/department', DepartmentController::class);
Route::resource('/parentmachine', ParentMachineController::class);
Route::resource('/machine', MachineController::class);
Route::resource('/partmachine', PartMachineController::class);
Route::resource('/hourmeter', HourMeterController::class);
Route::resource('/replacement', ReplacementController::class);

Route::get('/login', function () {
    return view('auth.login', ['title' => 'Login']);
});

Route::get('/register', function () {
    return view('auth.register', ['title' => 'Register']);
});

Route::get('/dashboard', function () {
    return view('');
});