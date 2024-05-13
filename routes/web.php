<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\OrderController;
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

Route::middleware(['auth', 'role:admin,akseptor'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('admin/dashboard');
    })->name('dashboard');

    // Vehicles
    Route::prefix('vehicles')->name('vehicles.')->group(function () {
        Route::get('/', [VehicleController::class, 'index'])->name('index');
        Route::post('/save', [VehicleController::class, 'store'])->name('store');
        Route::delete('/delete/{vehicle}', [VehicleController::class, 'destroy'])->name('destroy');
    });

    // Driver
    Route::prefix('driver')->name('driver.')->group(function () {
        Route::get('/', [DriverController::class, 'index'])->name('index');
        Route::post('/save', [DriverController::class, 'store'])->name('store');
        Route::get('/update/{driver}', [DriverController::class, 'detailEdit'])->name('edit');
        Route::post('/update/{driver}', [DriverController::class, 'update'])->name('update');
        Route::delete('/delete/{driver}', [DriverController::class, 'destroy'])->name('destroy');
    });

    // Order
    Route::prefix('order')->name('order.')->group(function() {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::post('/save', [OrderController::class, 'store'])->name('store');
        Route::get('/detail/{order}', [OrderController::class, 'detail'])->name('detail');
        Route::get('/respon-akseptor/{order}', [OrderController::class, 'edit'])->name('edit');
        Route::post('/respon-akseptor/{order}', [OrderController::class, 'update'])->name('update');
        Route::delete('/delete/{order}', [OrderController::class, 'destroy'])->name('destroy');
        Route::patch('/check-vehicle', [OrderController::class, 'checkVehicleAvailability'])->name('check-vehicle');
        Route::patch('/check-driver', [OrderController::class, 'checkDriverAvailability'])->name('check-driver');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
