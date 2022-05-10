<?php

use App\Http\Controllers\APIController;
use App\Http\Controllers\AuthenticationController;
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

//La requete http doit avoir un header Accept application/json pour fonctionner
//L'utilisateur doit être connecté pour avoir accès aux pages

Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);


Route::group(["middleware" => ['auth:sanctum']], function(){
    Route::controller(APIController::class)->group(function() {
        // GET 
        Route::get('/produits', 'show')->middleware(['auth:sanctum']); //Lister les produits
        Route::get('/produits/{id}', 'details'); //Voir details d'un produit
        
        // POST
        Route::post('/produits/ajout', 'add'); //Ajouter un produit
    
        // PUT
        Route::put('/produits/{id}', 'update'); //Modifier un produit
        Route::put('/produits/{id}/{newQuantity}', 'updateQuantity'); //Modifier la quantité
    
        //DELETE
        Route::delete('/produits/{id}', 'delete'); //Supprimer un produit
    });

    Route::post('/logout', [AuthenticationController::class, 'logout']);
});

