<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ArtController;
use App\Http\Controllers\StyleController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ParticipationController;
use App\Http\Controllers\ProduitsController;
use App\Http\Controllers\CategoriesController;
use App\Models\Produit;
use App\Models\Categorie;
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



//BackLocationsAymen
Route::get('/locations', [LocationController::class, 'index'])->name('locations');
Route::delete('/locations/{location}', [LocationController::class, 'destroy'])->name('locations.destroy');
Route::post('/locations', [LocationController::class, 'store'])->name('locations.store');
Route::get('/locations/{location}', [LocationController::class, 'edit'])->name('locations.edit');
Route::put('/locations/{id}', [LocationController::class, 'update'])->name('locations.update');
//BackPhotosAymen
Route::get('/photos', [PhotoController::class, 'index'])->name('photos.index');
Route::get('/photos', [PhotoController::class, 'index'])->name('photos'); 
Route::delete('/photos/{photo}', [PhotoController::class, 'destroy'])->name('photos.destroy');
Route::post('/photos', [PhotoController::class, 'store'])->name('photos.store');
Route::get('/photos/{photo}', [PhotoController::class, 'edit'])->name('photos.edit');
Route::put('/photos/{photo}', [PhotoController::class, 'update'])->name('photos.update');
//FrontLocationsAymen
Route::get('/locationsF', [LocationController::class, 'indexFront'])->name('locationsF');
Route::get('/location/{id}', [LocationController::class,'locationDetails'])->name('location.details');


//Nadhir
Route::get('/about', [ReviewController::class, 'indexFront'])->name('about');

Route::get('/reviews', [ReviewController::class, 'index'])->name('Review.index');

Route::get('/reviews/{review}', [ReviewController::class, 'show'])->name('Review.show');


Route::get('/create', [ReviewController::class, 'create'])->name('Review.create');
Route::post('/reviews', [ReviewController::class, 'store'])->name('Review.store');


Route::get('/reviews/{review}/delete', [ReviewController::class, 'delete'])->name('Review.delete');
Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('Review.destroy');

Route::get('/about/{review}/edit', [ReviewController::class, 'edit'])->name('Review.edit');
Route::patch('/about/{review}', [ReviewController::class, 'update'])->name('Review.update');
//

//Zainouba Lahlouba
Route::resource("/style",StyleController::class);
Route::resource("/art",ArtController::class);
Route::get('/art-list', [ArtController::class, 'indexFront'])->name('art-list');
Route::get('/art-detail/{id}', [ArtController::class, 'detailFront'])->name('art-detail');
Route::put('/art-update/{id}', [ArtController::class, 'update'])->name('arts.update');
//

//Ameni
Route::resource("event",EventController::class);
Route::get('/event-list', [EventController::class, 'indexFront'])->name('event-list');
Route::get('/indexBack', [ParticipationController::class, 'indexBack'])->name('index');
Route::resource("participation",ParticipationController::class);
Route::get('/events/filter', 'EventController@filterByLocation')->name('events.filter');
Route::get('/participations/export', [ParticipationController::class,'exportToCSV'])->name('participations.export');
//

//Nour
Route::resource('/admin/produit', ProduitsController::class);

Route::get('/front/produit', function () {
    $produits = Produit::all();
    return view('front.produit.index', compact('produits'));
})->name('front.produit.index');

 Route::get('front/produit/details/{id}', function ($id) {
    $produit = Produit::find($id);
    return view('front.produit.details', compact('produit'));
})->name('front.produit.details'); 

Route::get('/generatepdf', [ProduitsController::class,'generatePdf'])->name('generatepdf');

Route::resource('/admin/categorie', CategoriesController::class);