<?php

use App\Http\Controllers\CalculatorController;
use App\Models\Calculation;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [CalculatorController::class, 'index'])->name('dashboard');

Route::post('/calculate', [CalculatorController::class, 'store'])->name('calculation.store');
Route::delete('/calculations/{calculation}', [CalculatorController::class, 'destroy'])->name('calculation.destroy');
Route::delete('/calculations', [CalculatorController::class, 'wipe'])->name('calculation.wipe');
