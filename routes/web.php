<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ProduitsController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SlidersController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::resource('categories', CategoriesController::class);
Route::resource('produits', ProduitsController::class);
Route::resource('sliders',SlidersController::class);

/******************** les Routes pour le client *********************/
Route::get('/', [HomePageController::class, 'home']);
Route::get('/client',[ClientController::class,'dashboard']);
Route::get('/addPanier/{id}',[ShopController::class, 'addPanier'])->name('shop.addPanier');
Route::resource('shops',ShopController::class);
Route::resource('paniers',PanierController::class);
Route::post('/checkout', [PanierController::class, 'paiement'])->name('paniers.paiement');





/******************** les Routes pour l'Admin *********************/

Route::get('/admin',[AdminController::class, 'dashboard']);


      /**************** Route activer et desactiver slider/produit *****************/

Route::get('/activerp/{id}',[ProduitsController::class, 'activer'])->name('produits.activer');
Route::get('/desactivep/{id}',[ProduitsController::class, 'desactiver'])->name('produits.desactiver');

Route::get('/activers/{id}',[SlidersController::class, 'activer'])->name('sliders.activer');
Route::get('/desactivers/{id}',[SlidersController::class, 'desactiver'])->name('sliders.desactiver');

