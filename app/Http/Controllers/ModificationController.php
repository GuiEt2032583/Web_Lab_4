<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class ModificationController extends Controller
{
    public function show($id)
    {
        return view('Modification', ["produit"=>Produit::where('id', $id)->firstOrFail()]);
    }

    public function modify($id, Request $req)
    {
        $produit = Produit::find($id);

        $produit->nom = $req->input("nom");
        $produit->quantite = $req->input("quantite");
        $produit->description = $req->input("description");
        $produit->prix = $req->input("prix");
        $produit->fournisseur = $req->input("fournisseur");
        $produit->save();

        echo $produit;
        return redirect()->action(InventaireController::class);
    }
}
