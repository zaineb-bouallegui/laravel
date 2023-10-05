<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;


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
    return view('welcome');
});

Route::get('/register', function () {
    return view('form');
});

Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin');

Route::get('/tables', function () {
    return view('admin.tables');
})->name('tables');

Route::get('/profile', function () {
    return view('admin.profile');
})->name('profile');

Route::get('/signin', function () {
    return view('admin.signin');
})->name('signin');

Route::get('/signup', function () {
    return view('admin.signup');
})->name('signup');

Route::get('/notification', function () {
    return view('admin.notification');
})->name('notification');

Route::get('/details', function () {
    return view('front.details');
})->name('details');

Route::get('/index', function () {
    return view('front.index');
})->name('index');


Route::get('/services', function () {
    return view('front.services');
})->name('services');

Route::get('/sample', function () {
    return view('front.sample');
})->name('sample');

Route::get('/contact', function () {
    return view('front.contact');
})->name('contact');

Route::get('/login', function () {
    return view('front.login');
})->name('login');

Route::get('/register', function () {
    return view('front.register');
})->name('register');

Route::get('/about', function () {
    return view('front.about');
})->name('about');



// Route::get('/index',[ReviewController::class,'index']);
Route::get('/reviews', [ReviewController::class, 'index'])->name('Review.index');

Route::get('/reviews/{review}', [ReviewController::class, 'show'])->name('Review.show');


Route::get('/reviews/create', [ReviewController::class, 'create'])->name('Review.create');
Route::post('/reviews', [ReviewController::class, 'store'])->name('Review.store');


Route::get('/reviews/{review}/delete', [ReviewController::class, 'delete'])->name('Review.delete');
Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('Review.destroy');

Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit'])->name('Review.edit');
Route::patch('/reviews/{review}', [ReviewController::class, 'update'])->name('Review.update');





// Route::get('/create',[ReviewController::class,'create']);
// Route::get('/update',[ReviewController::class,'update']);
// Route::get('/delete',[ReviewController::class,'delete']);
// Route::get('/show/{id}',[ReviewController::class,'show']);


