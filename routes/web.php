<?php

use App\Http\Controllers\InventaireController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\AjoutController;
use App\Http\Controllers\ModificationController;
use Illuminate\Support\Facades\Route;

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

//Routes GET
Route::get('/', InventaireController::class);
Route::get('/details/{id}', DetailsController::class);
Route::get('/ajout', [AjoutController::class, 'show']);
Route::get('/modification/{id}', [ModificationController::class, 'show']);

//Route POST
Route::post('/ajout', [AjoutController::class, 'add']);
Route::post('/modification/{id}', [ModificationController::class, 'modify']);

