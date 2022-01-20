<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>Api test</title>
    </head>
    <body>
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-secondary mb-3 fixed-top">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link btn text-light btn-primary dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        MENU
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{route('produits.index')}}">Tout les produits</a>
                        <a class="dropdown-item" href="{{route('produits.ajout')}}">Ajouter produit</a>
                        </div>
                    </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="container mt-5 border border-2">
            <div class="mt-5 row ">
            @foreach($produits as $produit)
                <div class="card ml-3 mb-3" style="width: 16rem;">
                    <div class="card-body">
                        <p class="mb-0" style="font-size: 0.9em; text-align:right;">id: {{$produit['id']}}</p>
                        <h5 class="card-title text-center">{{$produit['name']}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted text-center">@if ($produit['instock']=="t")
                            en stock
                        @else
                            en rupture
                        @endif</h6>
                        <p class="card-text text-center">{{$produit['description']}}</p>
                        <p class="mb-0" style="font-size: 1.2em; text-align:left;">prix: {{$produit['price']}}</p>
                        <a href="{{ route('produits.edit', $produit['id']) }}" class="card-link btn btn-primary">modifier</a>
                        <a href="{{ route('produits.delete', $produit['id']) }}" class="card-link btn btn-danger mr-1">supprimer</a>

                    </div>
                </div>
            @endforeach
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
