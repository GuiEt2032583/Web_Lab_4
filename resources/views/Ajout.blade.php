<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <title>Gestion d'inventaire PHP</title>
    </head>
   <body>
       <x-navbar></x-navbar>
        <form method="post" action="/ajout">
            @csrf
            <div class="ajout-produit">
                <h1 class="titre">Ajout de produit</h1>
                <div>
                    <h2>
                        <input name="nom" type="text" palceholder="Nom du produit" >
                    </h2>
                    <h3>
                        $<input name="prix" type="text" pladceholder="Prix">
                    </h3>
                </div>
                <div>
                    <h4>Fournisseur</h4>
                    <input name="fournisseur" type="text" placeholder="Fournisseur">
                    <div class="product-qty">
                        <h4>Quantité</h4>
                        <div class="quantity">
                            <input name="quantite" type="number" placeholder="Quantité">
                        </div>
                    </div>
                </div>
                <div>
                    <h4 class="mb-1">Description</h4>
                    <textarea name="description" rows="4" cols="50" placeholder="Courte description"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-lg">Sauvegarder</button>
            </div>
        </form>
   </body>
</html>
