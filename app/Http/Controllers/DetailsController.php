<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class DetailsController extends Controller
{
    public function __invoke($id)
    {
        $produit = Produit::where('id', $id)->firstOrFail();
        return view('Details', ['produit'=>$produit]);
    }
}
