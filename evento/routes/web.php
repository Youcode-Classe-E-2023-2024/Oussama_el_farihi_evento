<?php

use App\Http\Controllers\Organizer\BookingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Console\Scheduling\Event;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\CategorieController;
use App\Http\Controllers\Admin\RestricteController;
use App\Http\Controllers\Organizer\EventController;
use App\Http\Controllers\Admin\EventController as EventAController;
use App\Http\Controllers\Organizer\IndexController as IndexxController;

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


Route::get('/', [CategorieController::class, 'indexWelcome'])->name('welcome');
Route::get('/search-events', [CategorieController::class, 'searchEvents'])->name('search-events');

Route::get('/events/{event}', [EventController::class, 'show'])->name('events.index');

Route::get('/categories/{id}/events', [EventController::class, 'showByCategory'])->name('events.events_by_categ');

//booking routes
Route::post('/events/{event}/book', [BookingController::class, 'bookEvent'])->name('events.book')->middleware('auth');
Route::get('/bookings', [BookingController::class, 'showBookings'])->name('user.bookings')->middleware('auth');
Route::get('/bookings/{booking}/download-ticket', [BookingController::class, 'downloadTicket'])->name('bookings.download-ticket')->middleware('auth');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'checkIfRestricted'])->name('dashboard');


Route::middleware(['auth', 'checkIfRestricted'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'role:admin', 'checkIfRestricted'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::get('/', [IndexController::class, 'getStats'])->name('index');

    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::post('/roles/assign', [RoleController::class, 'assign'])->name('roles.assign');
    Route::get('/restricte', [RestricteController::class, 'index'])->name('restricte.index');
    Route::post('/restricte/{user}/restrict', [RestricteController::class, 'restrict'])->name('restricte.restrict');
    Route::get('/categories', [CategorieController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategorieController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategorieController::class, 'store'])->name('categories.store');
    Route::get('categories/{category}/edit', [CategorieController::class, 'edit'])->name('categories.edit');
    Route::delete('/categories/{category}', [CategorieController::class, 'destroy'])->name('categories.destroy');
    Route::patch('/categories/{category}', [CategorieController::class, 'update'])->name('categories.update');

    Route::get('/events/index', [EventAController::class, 'approvalIndex'])->name('events.index');
    Route::post('/events/{event}/approve', [EventAController::class, 'approve'])->name('events.approve');


});

Route::middleware(['auth', 'role:organizer', 'checkIfRestricted'])->name('organizer.')->prefix('organizer')->group(function () {
    Route::get('/', [IndexxController::class, 'index'])->name('index');
    Route::get('/', [IndexxController::class, 'eventStatistics'])->name('index');


    Route::get('/events/create', [EventController::class, 'index'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events', [EventController::class, 'index2'])->name('events.index');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');


    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');

    Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
    Route::get('/bookings/{booking}/approve', [BookingController::class, 'approveBooking'])->name('bookings.approve');



});

require __DIR__ . '/auth.php';
