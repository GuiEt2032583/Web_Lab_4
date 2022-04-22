<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class InventaireController extends Controller
{
    public function __invoke()
    {
        return view("Inventaire", ["produits"=>Produit::all()]);
    }
}
