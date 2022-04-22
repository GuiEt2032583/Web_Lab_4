<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Controllers\InventaireController;

class AjoutController extends Controller
{
    public function show()
    {
        return view('Ajout');
    }

    public function add(Request $req)
    {
        $nouveauProduit = new Produit();

        $nouveauProduit->nom = $req->input("nom");
        $nouveauProduit->quantite = $req->input("quantite");
        $nouveauProduit->description = $req->input("description");
        $nouveauProduit->prix = $req->input("prix");
        $nouveauProduit->fournisseur = $req->input("fournisseur");
        $nouveauProduit->save();
        return redirect()->action(InventaireController::class);
    }
}
