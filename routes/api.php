<?php

use App\Http\Controllers\APIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(APIController::class)->group(function() {
    // GET 
    Route::get('/produits', 'show'); //Lister les produits
    Route::get('/produits/{id}', 'details'); //Voir details d'un produit
    
    // POST
    Route::post('/produits/ajout', 'add'); //Ajouter un produit

    // PUT
    Route::put('/produits/{id}', 'update'); //Modifier un produit
    Route::put('/produits/{id}/{newQuantity}', 'updateQuantity'); //Modifier la quantité

    //DELETE
    Route::delete('/produits/{id}', 'delete'); //Supprimer un produit
});