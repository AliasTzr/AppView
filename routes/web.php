<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AllProducts;

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

Route::get('/produits', [AllProducts::class, 'produits'])->name('produits.index');

Route::get('/produits/{id}', [AllProducts::class, 'produits'])->name('produits.edit');
Route::post('/produits/{id}', [AllProducts::class, 'updateProduit'])->name('produits.update');

Route::get('/produits/{id}/delete', [AllProducts::class, 'deleteProduit'])->name('produits.delete');
//Ajouter produits get et post
Route::get('/ajout', [AllProducts::class, 'ajouter'])->name('produits.ajout');
Route::post('/ajout-produits', [AllProducts::class, 'ajouterProduits'])->name('produits.addproduits');
