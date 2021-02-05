<?php

//use Illuminate\Support\Facades\Route;
use App\Models\User;

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
    return view('/auth/login');
})->name('login');

Route::get('/Compte', function () {
    return view('/Compte');
})->name('informationCompte');

Route::get('/gerercompte/inscription', function () {
    return view('/gerercompte/inscription');
})->name('inscriptionCompteClient');


//
//
// Gestion Compte
//
//


//Afficher ListeAdminTechnicien
Route::get ('/gerercompte/ListeAdminTechnicien', [App\Http\Controllers\HomeController::class, 'listeAdminTechnicienmodifier'])->name('listeAdminTechnicien_path');
Route::get('/gerercompte/ListeAdminTechnicien/{id}', [App\Http\Controllers\HomeController::class, 'supprimerAdminTechnicien'])->name('deleteAdminTechnicien_path');

//Ajouter AdminTechnicien
Route::post('/gerercompte/inscriptionAdminTechnicien', [App\Http\Controllers\HomeController::class, 'ajouterAdminTechnicien'])->name('ajouterAdminTechnicien_path');

//Modifier Client
Route::get('/gerercompte/ModifierAdminTechnicien/{id}', [App\Http\Controllers\HomeController::class, 'modifierAdminTechnicien'])->name('modifierAdminTechnicien_path');
Route::post('/gerercompte/ModifierAdminTechnicien/{id}', [App\Http\Controllers\HomeController::class, 'modifierAdminTechnicienConfirm'])->name('modifierAdminTechnicien_path');

//Afficher ListeClient
Route::get ('/gerercompte/ListeClient', [App\Http\Controllers\HomeController::class, 'listeClientmodifier'])->name('listeClient_path');

Route::get('/gerercompte/ListeClient/{id}', [App\Http\Controllers\HomeController::class, 'supprimerClient'])->name('deleteClient_path');

//Ajouter Client
Route::post('/gerercompte/inscription', [App\Http\Controllers\HomeController::class, 'ajouterClient'])->name('ajouterClient_path');

//Modifier Client
Route::get('/gerercompte/ModifierClient/{id}', [App\Http\Controllers\HomeController::class, 'modifierClient'])->name('modifierClient_path');
Route::post('/gerercompte/ModifierClient/{id}', [App\Http\Controllers\HomeController::class, 'modifierClientConfirm'])->name('modifierClient_path');


//
//
// Gestion Campagne
//
//

//Afficher ListeCampagneMesure
Route::get ('/gerercampagne/ListeCampagneMesure', [App\Http\Controllers\HomeController::class, 'listeCampagneMesure'])->name('listeCampagneMesure_path');
Route::get('/gerercampagne/ListeCampagneMesure/{id}', [App\Http\Controllers\HomeController::class, 'supprimerCampagneMesure'])->name('deleteCampagneMesure_path');
//Route::get('/ListeClient/{id}', [App\Http\Controllers\HomeController::class, 'supprimerClient'])->name('deleteClient_path');

//Modifier CampagneMesure
Route::get('/gerercampagne/modifierCampagneMesure/{id}', [App\Http\Controllers\HomeController::class, 'modifierCampagneMesure'])->name('modifierCampagneMesure_path');
Route::post('/gerercampagne/modifierCampagneMesure/{id}', [App\Http\Controllers\HomeController::class, 'modifierCampagneMesureConfirm'])->name('modifierCampagneMesure_path');


//Ajouter CampagneMesure
Route::get('/gerercampagne/creationCampagneMesure', [App\Http\Controllers\HomeController::class, 'creationCampagneMesure'])->name('creationCampagneMesure_path');
Route::post('/gerercampagne/creationCampagneMesure', [App\Http\Controllers\HomeController::class, 'ajouterCampagneMesure'])->name('creationCampagneMesure_path');



//
//
// Gestion Boitier
//
//

//Afficher ListeCampagneMesure
Route::get ('/gererboitier/ListeBoitier', [App\Http\Controllers\HomeController::class, 'listeBoitier'])->name('listeBoitier_path');
Route::get('/gererboitier/ListeBoitier/{id}', [App\Http\Controllers\HomeController::class, 'supprimerBoitier'])->name('deleteBoitier_path');
//Route::get('/ListeClient/{id}', [App\Http\Controllers\HomeController::class, 'supprimerClient'])->name('deleteClient_path');

//Modifier CampagneMesure
Route::get('/gererboitier/modifierBoitier/{id}', [App\Http\Controllers\HomeController::class, 'modifierBoitier'])->name('modifierBoitier_path');
Route::post('/gererboitier/modifierBoitier/{id}', [App\Http\Controllers\HomeController::class, 'modifierBoitierConfirm'])->name('modifierBoitier_path');


//Ajouter CampagneMesure
Route::get('/gererboitier/creationBoitier', [App\Http\Controllers\HomeController::class, 'creationBoitier'])->name('creationBoitier_path');
Route::post('/gererboitier/creationBoitier', [App\Http\Controllers\HomeController::class, 'ajouterBoitier'])->name('creationBoitier_path');


//
//
// Gestion Alert
//
//

Route::get ('/gerercompte/ListeClient/alert/{alert}', [App\Http\Controllers\HomeController::class, 'listeClientalert'])->name('listeClientalert_path');


Route::post('/Compte', function () {

	$client = User::find(request('id_user'));
    $client->preference = request('preference');
    $client->update();

    return view('/Compte');
})->name('informationCompte');


Route::get('/gerercompte/inscriptionAdmin', function () {
    return view('/gerercompte/inscriptionAdmin');
})->name('inscriptionCompteAdmin');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/accueil', [App\Http\Controllers\HomeController::class, 'index'])->name('accueil');
