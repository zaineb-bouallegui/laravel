<?php
use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitsController;
use App\Http\Controllers\CategoriesController;
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


Route::resource('/admin/produit', ProduitsController::class);

Route::get('/front/produit', function () {
    $produits = produit::all();
    return view('front.produit.index', compact('produits'));
})->name('front.produit.index');

 Route::get('front/produit/details/{id}', function ($id) {
    $produit = Produit::find($id);
    return view('front.produit.details', compact('produit'));
})->name('front.produit.details'); 

Route::get('/generatepdf', [ProduitsController::class,'generatePdf'])->name('generatepdf');

Route::resource('/admin/categorie', CategoriesController::class);


