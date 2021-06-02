<?php

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

Route::get ('/', [App\Http\Controllers\PagesController::class, 'login'])->name('login');


Route::get('/popup', function () {
    return view('/Client/popup_highscore');
})->name('popup');

Route::get('/doxygen', function () {
    return view('doxygen_accueil');
})->name('doxygen_path');

//
//
// Gestion Compte
//
//


//Afficher ListeAdminTechnicien
Route::get ('/gerercompte/ListeAdminTechnicien', [App\Http\Controllers\gestioncompteController::class, 'listeAdminTechnicienmodifier'])->name('listeAdminTechnicien_path');
Route::get('/gerercompte/ListeAdminTechnicien/{id}', [App\Http\Controllers\gestioncompteController::class, 'supprimerAdminTechnicien'])->name('deleteAdminTechnicien_path');

//Ajouter AdminTechnicien
Route::get('/gerercompte/inscriptionAdminTechnicien', [App\Http\Controllers\gestioncompteController::class, 'ajouterAdminTechnicienget'])->name('inscriptionCompteAdmin');
Route::post('/gerercompte/inscriptionAdminTechnicien', [App\Http\Controllers\gestioncompteController::class, 'ajouterAdminTechnicien'])->name('ajouterAdminTechnicien_path');

//Modifier Client
Route::get('/gerercompte/ModifierAdminTechnicien/{id}', [App\Http\Controllers\gestioncompteController::class, 'modifierAdminTechnicien'])->name('modifierAdminTechnicien_path');
Route::post('/gerercompte/ModifierAdminTechnicien/{id}', [App\Http\Controllers\gestioncompteController::class, 'modifierAdminTechnicienConfirm'])->name('modifierAdminTechnicien_path');

//Afficher ListeClient
Route::get ('/gerercompte/ListeClient', [App\Http\Controllers\gestioncompteController::class, 'listeClient'])->name('listeClient_path');
Route::get('/gerercompte/ListeClient/{id}', [App\Http\Controllers\gestioncompteController::class, 'supprimerClient'])->name('deleteClient_path');

//Ajouter Client
Route::get('/gerercompte/inscription', [App\Http\Controllers\gestioncompteController::class, 'ajouterClientget'])->name('inscriptionCompteClient');
Route::post('/gerercompte/inscription', [App\Http\Controllers\gestioncompteController::class, 'ajouterClient'])->name('ajouterClient_path');

//Modifier Client
Route::get('/gerercompte/ModifierClient/{id}', [App\Http\Controllers\gestioncompteController::class, 'modifierClient'])->name('modifierClient_path');
Route::post('/gerercompte/ModifierClient/{id}', [App\Http\Controllers\gestioncompteController::class, 'modifierClientConfirm'])->name('modifierClient_path');


//
//
// Gestion Campagne
//
//

//Afficher ListeCampagneMesure
Route::get ('/gerercampagne/ListeCampagneMesure', [App\Http\Controllers\gestioncampagnemesureController::class, 'listeCampagneMesure'])->name('listeCampagneMesure_path');
Route::get('/gerercampagne/ListeCampagneMesure/{id}', [App\Http\Controllers\gestioncampagnemesureController::class, 'supprimerCampagneMesure'])->name('deleteCampagneMesure_path');

//Modifier CampagneMesure
Route::get('/gerercampagne/modifierCampagneMesure/{id}', [App\Http\Controllers\gestioncampagnemesureController::class, 'modifierCampagneMesure'])->name('modifierCampagneMesure_path');
Route::post('/gerercampagne/modifierCampagneMesure/{id}', [App\Http\Controllers\gestioncampagnemesureController::class, 'modifierCampagneMesureConfirm'])->name('modifierCampagneMesure_path');


//Ajouter CampagneMesure
Route::get('/gerercampagne/creationCampagneMesure', [App\Http\Controllers\gestioncampagnemesureController::class, 'creationCampagneMesure'])->name('creationCampagneMesure_path');
Route::post('/gerercampagne/creationCampagneMesure', [App\Http\Controllers\gestioncampagnemesureController::class, 'ajouterCampagneMesure'])->name('creationCampagneMesure_path');

//
//
// Gestion Boitier
//
//

//Afficher ListeCampagneMesure
Route::get('/gererboitier/ListeBoitier', [App\Http\Controllers\gestionboitierController::class, 'listeBoitier'])->name('listeBoitier_path');
Route::get('/gererboitier/ListeBoitier/{id}', [App\Http\Controllers\gestionboitierController::class, 'supprimerBoitier'])->name('deleteBoitier_path');

//Modifier CampagneMesure
Route::get('/gererboitier/modifierBoitier/{id}', [App\Http\Controllers\gestionboitierController::class, 'modifierBoitier'])->name('modifierBoitier_path');
Route::post('/gererboitier/modifierBoitier/{id}', [App\Http\Controllers\gestionboitierController::class, 'modifierBoitierConfirm'])->name('modifierBoitier_path');


//Ajouter CampagneMBoitier
Route::get('/gererboitier/creationBoitier', [App\Http\Controllers\gestionboitierController::class, 'creationBoitier'])->name('creationBoitier_path');
Route::post('/gererboitier/creationBoitier', [App\Http\Controllers\gestionboitierController::class, 'ajouterBoitier'])->name('creationBoitier_path');

Route::get('/gererboitier/BoitierAlarmeBatterie/{id}', [App\Http\Controllers\gestionboitierController::class, 'BoitierAlarmeBatterie'])->name('modifierBoitier_alarmebatterie_path');
//
//
// Gestion Alert
//
//

Route::get('/gerercompte/ListeClient/alert/{alert}', [App\Http\Controllers\AlertController::class, 'listeClientalert'])->name('listeClientalert_path');
Route::get('/gerercompte/ListeBoitier/alert/{alert}', [App\Http\Controllers\AlertController::class, 'listeboitieralert'])->name('listeboitieralert_path');
Route::get('/gerercompte/ListeCampagneMesure/alert/{alert}', [App\Http\Controllers\AlertController::class, 'listecampagnemesurealert'])->name('listecampagnemesurealert_path');

//
//
// Liste campagne, boitier, client
//
//
Route::get('/liste', [App\Http\Controllers\HomeController::class, 'liste'])->name('liste');
Route::get('/liste/boitier/{id}', [App\Http\Controllers\HomeController::class, 'boitierdelete'])->name('listedeleteboitier');
Route::get('/liste/campagne/{id}', [App\Http\Controllers\HomeController::class, 'campagnedelete'])->name('listedeletecampagne');
Route::get('/liste/user/{id}', [App\Http\Controllers\HomeController::class, 'userdelete'])->name('listedeleteuser');
Route::get('/liste/modifierStatutencours/{id}', [App\Http\Controllers\HomeController::class, 'listemodifierstatutEncours'])->name('modifierListestatut_encours_path');
Route::get('/liste/modifierStatutfini/{id}', [App\Http\Controllers\HomeController::class, 'listemodifierstatutfini'])->name('modifierListestatut_fini_path');
Route::get('/liste/ajouter/{id_campagne}/{id_boitier}', [App\Http\Controllers\HomeController::class, 'listeajouterboitier'])->name('listeajouterboitier_path');

//
//
// Client
//
//
Route::get('/client/listecampagneclient', [App\Http\Controllers\clientController::class, 'mescampagnesliste'])->name('clientmescampagnes_path');
Route::get('/client/consultationcampagne/{id}', [App\Http\Controllers\clientController::class, 'campagneconsultation'])->name('clientconsultation_path');

//
//
// Route Voyager
//
//

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();


Route::get('/Statistiques', [ App\Http\Controllers\CollecteSigfoxController::class, 'index'])->name('Statistiques');

//
//
// Accueil
//
//

Route::get('/accueil', [App\Http\Controllers\HomeController::class, 'index'])->name('accueil');