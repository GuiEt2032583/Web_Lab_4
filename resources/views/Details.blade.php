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
    <div class="container-fluid container-details">
        <div class="details-produit">
            <div class="border-bottom pb-3 mb-3">
                <h2 class="mb-3">Produit : {{$produit->nom}}</h2>
                <h3 class="mb-0 text-primary">Prix : ${{$produit->prix}}</h3>
            </div>
            <div class="product-size border-bottom">
                <h4>Fournisseur</h4>
                {{$produit->fournisseur}}
                <div >
                    <h4>Quantité</h4>
                    <div>
                        {{$produit->quantite}}
                    </div>
                </div>
            </div>
            <div>
                <h4 class="mb-1">Description</h4>
                <p>{{$produit->description}}</p>
                <a href="/modification/{{$produit->id}}" class="btn btn-primary">Modifier</a>
            </div>
        </div>
    </div>
</body>

</html>