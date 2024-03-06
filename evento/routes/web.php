<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\RestricteController;

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

// Apply the 'checkIfRestricted' middleware to the dashboard route as an example
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'checkIfRestricted'])->name('dashboard');

// Apply the middleware to all routes within this group
Route::middleware(['auth', 'checkIfRestricted'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Apply the middleware to all admin routes, ensuring restricted users can't access admin functionalities
Route::middleware(['auth', 'role:admin', 'checkIfRestricted'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::post('/roles/assign', [RoleController::class, 'assign'])->name('roles.assign');
    Route::get('/restricte', [RestricteController::class, 'index'])->name('restricte.index');
    Route::post('/restricte/{user}/restrict', [RestricteController::class, 'restrict'])->name('restricte.restrict');
});

require __DIR__.'/auth.php';
