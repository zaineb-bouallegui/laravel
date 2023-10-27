<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\StockController;


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
    return view('Tool.services');
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



////////////////////ala-tools////////
Route::get('/tool/create', [ToolController::class, 'create'])->name('tools.create');
Route::post('/tool/store', [ToolController::class, 'store'])->name('tools.store');
Route::get('/tool/index', [ToolController::class, 'index'])->name('Tool.index');

Route::get('/tool/{tool}/delete', [ToolController::class, 'delete'])->name('tools.delete');
Route::delete('/tools/{tool}', [ToolController::class, 'destroy'])->name('tools.destroy');


Route::get('/tool/{tool}/edit', [ToolController::class, 'edit'])->name('tools.edit');
Route::patch('/toolsUp/{tool}', [ToolController::class, 'update'])->name('tools.update');
Route::get('/tool/front', [ToolController::class, 'index2'])->name('tool');
//////////////////////stock ala /////////////////
Route::get('/stock/create', [StockController::class, 'create'])->name('stocks.create');
Route::post('/stock/store', [StockController::class, 'store'])->name('stocks.store');
Route::get('/stock/index', [StockController::class, 'index'])->name('Stock.index');

Route::get('/stock/{stock}/delete', [StockController::class, 'delete'])->name('stocks.delete');
Route::delete('/stocks/{stock}', [StockController::class, 'destroy'])->name('stocks.destroy');

Route::get('/stock/{stock}/edit', [StockController::class, 'edit'])->name('stocks.edit');
Route::patch('/stocksUp/{stock}', [StockController::class, 'update'])->name('stocks.update');
///////////////////stripe ala//////////////////////////////////////
Route::get('/aaa', 'App\Http\Controllers\StripeController@checkout')->name('checkout');
Route::post('/session', 'App\Http\Controllers\StripeController@session')->name('session');
Route::get('/success', 'App\Http\Controllers\StripeController@success')->name('success');
//////////////////////////////////////////////////////////////////////


