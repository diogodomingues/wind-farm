<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TurbineController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\InspectionController;
use App\Models\Turbine;
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
    return view('welcome-custom');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('turbines', [TurbineController::class, 'show'])->name('turbine.get');
    Route::get('turbine/{id}', [TurbineController::class, 'edit'])->name('turbine.edit');
    Route::get('turbines/new', function () {
        return view('turbine.new');
    })->name('turbine.new');
    Route::post('turbines', [TurbineController::class, 'create'])->name('turbine.create');
    Route::put('turbine/{id}', [TurbineController::class, 'update'])->name('turbine.update');
    Route::delete('turbine/{id}', [TurbineController::class, 'delete'])->name('turbine.delete');

    Route::get('components', [ComponentController::class, 'show'])->name('component.get');
    Route::get('component/{id}', [ComponentController::class, 'edit'])->name('components.edit');
    Route::get('components/new', [ComponentController::class, 'new'])->name('component.new');
    Route::post('components', [ComponentController::class, 'create'])->name('component.create');
    Route::put('component/{id}', [ComponentController::class, 'update'])->name('component.edit');
    Route::delete('component/{id}', [ComponentController::class, 'delete'])->name('component.delete');

    Route::get('inspections', [InspectionController::class, 'show'])->name('inspection.get');
    Route::post('inspections', [InspectionController::class, 'create'])->name('inspection.create');
    Route::put('inspection/{id}', [InspectionController::class, 'edit'])->name('inspection.edit');
    Route::delete('inspection/{id}', [InspectionController::class, 'delete'])->name('inspection.delete');
});

require __DIR__ . '/auth.php';
