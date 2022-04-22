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
    <div class="container-fluid">
        @foreach($produits as $produit)
        <div class="produit col-lg-2 col-md-4 margin-left">
            <div class="card">
                <img :src="pic" class="card-img-top" alt="...">
                <div class="card-header">
                    <h1 class="card-title">{{$produit->nom}}</h1>
                </div>
                <div class="card-body">
                    <p class="card-text">Prix : {{$produit->prix}} $</p>
                    <p class="card-text">Quantité : {{$produit->quantite}}</p>
                    <p class="card-text">Fournisseur : {{$produit->fournisseur}}</p>
                    <p class="card-text">Description : {{$produit->description}}</p>
                </div>
                <div class="card-footer">
                    <a href="/modification/{{$produit->id}}" class="btn btn-primary" >Modifier</a>
                    <a href="/details/{{$produit->id}}" class="btn btn-outline-dark" >Détails</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</body>

</html>