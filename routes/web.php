<?php

use App\Http\Controllers\ProfileController;
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
use App\Http\Controllers\ToolController;
use App\Http\Controllers\StockController;
use App\Models\Produit;
use App\Models\Categorie;
use App\Http\Controllers\AymenSparqlController; 
use App\Http\Controllers\NourSparqlController;

use App\Http\Controllers\AmeniSparqlController;
use App\Http\Controllers\Art1SparqlController;
use App\Http\Controllers\Art2SparqlController;
use App\Http\Controllers\Art3SparqlController;
use App\Http\Controllers\Art4SparqlController;

/*
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


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



Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin');

Route::get('/tables', function () {
    return view('admin.tables');
})->name('tables');



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





Route::get('/about', function () {
    return view('front.about');
})->name('about');



//BackLocationsAymen
Route::get('/locations', [LocationController::class, 'index'])->name('locations');
Route::delete('/locations/{location}', [LocationController::class, 'destroy'])->name('locations.destroy');
Route::post('/locations', [LocationController::class, 'store'])->name('locations.store');
Route::get('/locations/{location}', [LocationController::class, 'edit'])->name('locations.edit');
Route::put('/locations/{id}', [LocationController::class, 'update'])->name('locations.update');
Route::get('/search-location', 'LocationController@searchLocation')->name('search.location');
Route::get('/exportLocationPdf', [LocationController::class, 'exportLocationPdf'])->name('exportLocationPdf');

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
//

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
Route::get('/export_tools_pdf', [ToolController::class, 'export_tools_pdf'])->name('export_tools_pdf');

/////////////////////////////////////////////////////////////////////////


Route::get('/monument', [AymenSparqlController::class,'monumentQuery']);
Route::get('/ville', [AymenSparqlController::class,'villeQuery']);
Route::get('/triParCateg', [AymenSparqlController::class,'trieParCategEndroit']);
Route::get('/endroitEvent', [AymenSparqlController::class,'endroitEvenement']);
Route::get('/listPhoto', [AymenSparqlController::class,'listPhotos']);
Route::get('/endroitPhoto', [AymenSparqlController::class,'endroitPhotos']);
Route::get('/allEndroits', [AymenSparqlController::class,'allEndroits']);

//NourSpark
Route::get('/categorie',[NourSparqlController::Class,'categorie']);
Route::get('/nbProduitCat',[NourSparqlController::Class,'nbProduit']);
Route::get('/produitCher',[NourSparqlController::Class,'maxPrix']);
Route::get('/produit', [NourSparqlController::Class,'querySparql']);


//AmeniSpark
Route::get('/event1-query-sparql', [AmeniSparqlController::class,'querySparql']);
Route::get('/event2-query-sparql', [AmeniSparqlController::class,'querySparql1']);
Route::get('/event3-query-sparql', [AmeniSparqlController::class,'querySparql2']);
Route::get('/event4-query-sparql', [AmeniSparqlController::class,'querySparql4']);
//SPARQL participation
Route::get('/part1-query-sparql', [AmeniSparqlController::class,'querySparql5']);
Route::get('/part2-query-sparql', [AmeniSparqlController::class,'querySparql6']);
Route::get('/part3-query-sparql', [AmeniSparqlController::class,'querySparql7']);
//SPARQL LES 2
Route::get('/partevent-sparql-results', [AmeniSparqlController::class,'querySparql8']);


//Zaineb
Route::get('/art', [Art1SparqlController::class,'querySparql']);
Route::get('/style', [Art2SparqlController::class,'querySparql']);
Route::get('/artstyle', [Art3SparqlController::class,'querySparql']);
Route::get('/artz', [Art4SparqlController::class,'querySparql']);