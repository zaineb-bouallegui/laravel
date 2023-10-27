<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ParticipationController;

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
Route::resource("event",EventController::class);

Route::get('/event-list', [EventController::class, 'indexFront'])->name('event-list');
Route::get('/indexBack', [ParticipationController::class, 'indexBack'])->name('index');
Route::resource("participation",ParticipationController::class);
Route::get('/events/filter', 'EventController@filterByLocation')->name('events.filter');
Route::get('/participations/export', [ParticipationController::class,'exportToCSV'])->name('participations.export');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('front.about');
})->name('about');

Route::get('/contact', function () {
    return view('front.contact');
})->name('contact');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
