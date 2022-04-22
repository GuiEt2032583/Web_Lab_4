<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produit;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $produit = new Produit;
        $produit->nom = "Patate";
        $produit->fournisseur = "Pataterie";
        $produit->description = "Patate jaune";
        $produit->prix = 3.99;
        $produit->quantite = 5;
        $produit->save();
    }
}
