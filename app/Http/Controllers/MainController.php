<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produit;
use App\Models\Commande;
use App\Mail\Produit_mail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;
use App\Exports\ProduitsExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Nouveauproduitnotification;

class MainController extends Controller
{
    public function afficheAcceuil()

    {
       // dd(Auth::user()->role->role);
        return view('pages.front-office.welcome',
    [

        'nom' => 'MAAH',
        'formation'=>'Formation en LARAVEL'
    ]);
    }
    public function afficheProcedure($param)
    {
        return view('pages.front-office.procedure', 
        [ 'affiche'=> $param

        ]);
    }
    // fonction pour creer un nouveau produit premiere approche
    public function ajoutProduit()
    {

     $produit = New produit();
    $produit->uuid= Str::uuid();
    $produit->designation='pomme';
    $produit->description='passable';
    $produit->prix='300';
    $produit->like='500';
    $produit->pays_source='france';
    $produit->poids='450.10';
    $produit->save();

    }
    // fonction pour creer un nouveau produit deuxieme approche
    public function ajoutProduitEncore()
    {
        Produit::create(

          [
              'uuid'=>Str::uuid(),
              'designation'=>'Mangue',
              'description'=>'dsflkjsùfn!ksùfjmosfl',
              'prix'=>'65000',
              'like'=>89,
              'pays_source'=>'TOGO',
              'poids'=> 98.5
          ]
        );
    }
// relation plusieurs à plusieurs
   public function produitsListe()
  {
    $produit=Produit::first();
    $user=User::first();
    //$users=$produit->users;
    $produit->users()->attach($user->id); // permet de lier produit à users et inserer les données dans la table produit_user
    $users=$produit->users;
    dd($produit, $users); 
    //$produit= Produit::all();
      return view("pages.front-office.liste_produits",[
           "lesproduits"=>Produit:: paginate(10),
           "lescommandes"=>Commande:: paginate(10),
      ]);
  }

  public function afficherProduit()
  {
    //$produit= Produit::all();
    return view("pages.front-office.liste_produits",[
        "lesproduits"=>Produit:: paginate(10),
        "lescommandes"=>Commande:: paginate(10),
   ]);
  }

      public function getList()
   {
      $produit= Produit::all();
      // dump($produit); // ou dd($produit)
   }

   public function modifierProduit($id)
   {
       $modif_produit=Produit :: where("id", $id)->update([
           "designation"=>"bonbon58",
           "description"=>"interressant5446556",
       ]);
       //dd($modif_produit);
   }
   public function supprimer($id)
   {
       //$produit= Produit::find($id);
      // dd($produit);
      // $produit->delete();
      // seconde methode
      Produit::destroy($id); // ici on peut mettre plusieurs parametres
      return redirect()->back()->with('statut','Suppimer avec succès'); 
   }
   public function ajoutcommande($id)
   {
       $commande=new Commande();
       $commande->produit_id=$id;
       $commande->uuid=Str::uuid();
       $commande->save();
       //dd( $commande);
       return redirect()->back()->with('commandeEffectuee','commande ajoutée avec succès'); 
   }

public function ajouterProduit()
{
    //dd('ok');
    return view('pages.front-office.ajouter_produit');
}

public function enregistrerProduit(Request $request)
{
   $image=$request->file("image")->store("images");
   $produit= Produit::create([
       'uuid'=>Str::uuid(),
       'designation'=>$request->designation,
       'description'=>$request->description,
       'prix'=>$request->prix,
       'like'=>$request->like,
       'pays_source'=>$request->pays_source,
       'poids'=>$request->poids,
       'image'=>$image
      
   ]);
   $user=User::first();
  // Mail::to($user)->send(new Produit_mail($produit));
  // Notification::send($user, new Nouveauproduitnotification($produit));
//dd($produit);
return redirect()->back()->with('produitajout','commande ajoutée avec succès'); 
}

public function editerProduit($id)
{
    $produit=Produit::find($id);
    return view('pages.front-office.editer_produit',[

       "produit" => $produit,
]);
}
public function update(Request $request, $id)
{
 Produit::find($id)->update([

    'designation'=>$request->designation,
    'description'=>$request->description,
    'prix'=>$request->prix,
    'like'=>$request->like,
    'pays_source'=>$request->pays_source,
    'poids'=>$request->poids,

 ]);
}
public function excelExport()
{
    return Excel::download(new ProduitsExport, "Produits.xls");
}
/**public function sendMail()
{
   $user = User::first();
   Mail :: to($user)->send(new Produit_mail);
   dd("Le mail a bien été envoyé");
}**/

}
