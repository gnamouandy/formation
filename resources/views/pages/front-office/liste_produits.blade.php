<x-master-layout>
     {{--  une colonnes de deux lignes --}} 
     <br>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                 <h3> Liste des produits </h3>
                 @if (session('statut'))
               <div class="alert alert-primary alert-dismissible fade show" role="alert">
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                   </button>
                   {{session('statut')}}
               </div>
                 @endif 
                 @if ($lesproduits->count()>0)
                {{--  une colonnes de deux lignes --}} 
                     <table class="table table-hover">
                         <thead>
                             <tr>
                                 <td>Désignation</td>
                                 <td>Prix</td>
                                 <td>Pays source</td>
                                  </tr>
                         </thead>
                         <tbody>
                             @foreach ($lesproduits as $produit)
                             <tr>
                                <td>{{$produit->designation}}</td>
                                <td>{{$produit->prix}}</td>
                                <td>{{$produit->pays_source}}</td>
                                <td>
                                    <a href="{{route('delete',$produit->id)}}" class="btn btn-danger"><h6>SUPPRIMER</h6> <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                  </svg></a>
                                  <a href="{{route('commande',$produit->id)}}" class="btn btn-primary"> AJOUTER </a>
                                  <a href="{{route('produit.editer',$produit->id)}}" class="btn btn-primary"> editer </a>
                                </td>
                            </tr>
                             @endforeach
                            
                        </tbody>
                     </table>
                     {{$lesproduits->links()}}
                 @else
                     <p> 
                      aucun produit n'a été trouvé!
                     </p>
                 @endif
                </div>
            <div class="col-md-6">
                 <h3> Liste des commandes </h3>
                 @if (session('commandeEffectuee'))
               <div class="alert alert-primary alert-dismissible fade show" role="alert">
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                   </button>
                   {{session('commandeEffectuee')}}
               </div>
                 @endif 
                 @if ($lescommandes->count()>0)
                {{--  une colonnes de deux lignes --}} 
                     <table class="table table-hover">
                         <thead>
                             <tr>
                                 <td>Désignation</td>
                                 <td>Prix</td>
                                 <td>Pays source</td>
                                  </tr>
                         </thead>
                         <tbody>
                             @foreach ($lescommandes as $commande)
                             <tr>
                                 
                                <td>{{ $commande->produit->designation }}</td>
                                <td>{{$commande->produit->prix}}</td>
                                <td>{{$commande->produit->pays_source}}</td>
                                <td><a href="{{route('delete',$commande->id)}}" class="btn btn-danger"> <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                  </svg></td>
                            </tr>
                             @endforeach
                            
                        </tbody>
                     </table>
                     {{$lescommandes->links()}}
                 @else
                     <p> 
                      aucun produit n'a été trouvé!
                     </p>
                 @endif
                </div>
            </div>
        </div>
    </div>
        
</x-master-layout>
