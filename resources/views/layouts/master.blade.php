<!doctype html>
<html lang="fr">
  <head>
    <title>formation DSi</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="monstyle.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
  <body>
      <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-success">
            <div class="container">
                <a class="navbar-brand" href="#">Formation DSI</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="{{ route('accueil')}}">Accueil<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('procedure',"Burkina")}}">La procédure</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('procedure.liste')}}">La liste des produits</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('ajoutproduit')}}">Enregistrer un nouveau produit</a>
                    </li>
                  </ul>
                  <ul class="navbar-nav ">
                    <li class="nav-item dropdown">
                      @auth
                        <form method="POST" action="{{ route('logout') }}">
                          @csrf

                          <x-dropdown-link :href="route('logout')"
                                  onclick="event.preventDefault();
                                              this.closest('form').submit();">
                              {{ __('Déconnexion') }}
                          </x-dropdown-link>
                      </form>
                       <li class="nav-item">
                        <a class="nav-link" href="#">l'utilisateur connecté est: {{Auth::user()->name}}</a>
                        
                      </li>  
                      @else
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Connexion
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" href="{{ route('login')}}">login</a>
                        <a class="dropdown-item" href="{{ route('register')}}">Créer votre compte</a>
                        {{-- <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a> --}}
                      </div>
                          
                      @endauth
                    {{-- </li>
                    <li class="nav-item">
                      <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li> --}}
                  </ul>
                  {{-- <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                  </form> --}}
                </div>
            </div>
           
          </nav>
      </header>
      <main>
         {{ $slot }}

      </main>
      <footer class="bg-success">
        <div class="container">
            <div class="row">
                <div class="col-md-6"> <br> <img src="https://www.presidencedufaso.bf/wp-content/uploads/2020/04/armoirie-735x735-1.jpg" style="width: 100px" alt="" ></div>
                <div class="col-md-6">Infos contac</div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center text-white ">
             @copyright
                </div>
            </div>
        </div>
        
      </footer>
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>