<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use Exception;
use App;

class APIController extends Controller
{
    // Lister les produits
    public function show()
    {
        return Produit::all();
    }

    // Ajouter un produit
    // Demande un query parameter nommé object
    // L'objet demande les champs suivants : nom, fournisseur, description, quantite, prix
    // {"id":3,"nom":"Air Heads","fournisseur":"Amazon","description":"Boite de 60 barres avec plusieurs saveurs","image_produit":null,"prix":"10.00","quantite":1}
    public function add(Request $req)
    {
        $response = "";
        if($this->isJson($req->query("object"))){
            $queryObject = json_decode($req->query("object"));
            
            $newProduct = new Produit();
            $newProduct->nom = $queryObject->nom;
            $newProduct->quantite = $queryObject->quantite ;
            $newProduct->description = $queryObject->description;
            $newProduct->prix = $queryObject->prix;
            $newProduct->fournisseur = $queryObject->fournisseur;
            $saved = $newProduct->save();

            if(!$saved){
                $response = "Erreur lors de l'enregistrement, veuillez réessayer (Les champs sont-ils tous remplis?)";
            }
            $response = "Ajout effectué";
        }
        else{
            $response =  "Le paramètre 'object' est mal remplis ou inexistant";
        } 
        return $response;
    }

    // Vue détaillé d'un produit
    public function details($id)
    {
        $response = Produit::find($id);
        if($response==NULL){
            $response = "Produit inexistant";
        }
        return $response;
    }

    // Modifier un produit
    public function update($id, Request $req)
    {
        $response = "";
        if($this->isJson($req->query("object"))){
            $queryObject = json_decode($req->query("object"));
            
            $productUpdate = Produit::find($id);

            if($productUpdate==NULL){
                $response = "Produit inexistant";
            }

            $productUpdate->nom = $queryObject->nom;
            $productUpdate->quantite = $queryObject->quantite ;
            $productUpdate->description = $queryObject->description;
            $productUpdate->prix = $queryObject->prix;
            $productUpdate->fournisseur = $queryObject->fournisseur;
            $saved = $productUpdate->save();

            if(!$saved){
                $response = "Erreur lors de l'enregistrement, veuillez réessayer (Les champs sont-ils tous remplis?)";
            }

            $response = "Update effectué";
        }
        else{
            $response =  "Le paramètre 'object' est mal remplis ou inexistant";
        } 
        return $response;

    }

    // Modifier la quantité d'un produit
    public function updateQuantity($id, $newQuantity)
    {
        $response = "Changement de quantité effectué";
        $productUpdate = Produit::find($id);

        if($productUpdate==NULL){
            $response = "Produit inexistant";
        }

        $productUpdate->quantite = $newQuantity;
        $saved = $productUpdate->save();

        if(!$saved){
            $response = "Erreur lors de l'enregistrement, veuillez réessayer (Les champs sont-ils tous remplis?)";
        }

        return $response;
    }

    // Supprimer un produit
    public function delete($id)
    {
        $response = "Produit supprimé";
        $productDelete = Produit::find($id);
        if($productDelete==NULL){
            $response = "Produit inexistant";
        }
        $productDelete->delete();
        return $response;
    }

    private function isJson($string)
    {
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
    }
}
// {"id":3,"nom":"Air Heads","fournisseur":"Amazon","description":"Boite de 60 barres avec plusieurs saveurs","image_produit":null,"prix":"10.00","quantite":1}


