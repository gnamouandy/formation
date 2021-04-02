<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Produit;
use App\Mail\Produit_mail;
use Illuminate\Support\Facades\Route;
use App\Notifications\Nouveauproduitnotification;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('welcome');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';




Route::get('/', [MainController::class, 'afficheAcceuil'] ) ->name('accueil');
Route::get('procedure/{param}', [MainController::class, 'afficheProcedure']) ->name('procedure');
Route::get('ajouter-produit', [MainController::class, 'ajoutProduit']) ->name('a.produit');
Route::get('ajouter2', [MainController::class, 'ajoutProduitEncore']) ->name('b.produit');
Route::get('liste_produit', [MainController::class, 'getList']) ->name('c.produit');
Route::get('modification/{id}', [MainController::class, 'modifierProduit']) ->name('g.produit');
Route::get('supprimer/{id}', [MainController::class, 'supprimer']) ->name('delete');
Route::get('produits/liste', [MainController::class, 'afficherProduit']) ->name('procedure.liste');
Route::get('ajouter_commande/{id}', [MainController::class, 'ajoutcommande']) ->name('commande');
Route::get('produits/ajouter', [MainController::class, 'ajouterProduit'])->middleware('auth','isAdmin')->name('ajoutproduit');
Route::post('produits/enregistrer', [MainController::class, 'enregistrerProduit']) ->name('produit.enregistrer');
Route::get('produits/editer/{id}', [MainController::class, 'editerProduit']) ->name('produit.editer');
Route::put('produits/update/{id}', [MainController::class, 'update']) ->name('produit.update');
Route::get('export-excel', [MainController::class, 'excelExport']) ->name('excel.export');
Route::get('send-mail', [MainController::class, 'sendMail']) ->name('mail_envoi');
Route::get('test-mail', function(){
    $produit = Produit::first();
    // $produit = produit::orderByDesc('created_at')->first();
    return new Produit_mail($produit);
});
Route::get('test-notification', function(){
    $user = User::first();
    $produit=produit::first();
  $user->notify(new Nouveauproduitnotification($produit));
  // dd("Notification envoyée");

  // envoi à plusieurs personnes
 /* $users=User::all();
  Notification:: send($users, new Nouveauproduitnotification($produit));*/
});


