@extends('layouts.home', ['title' => 'Création Campagne Mesure'])


@section('style')
  <link href="{{ asset('/bootstrap/form-validation.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
@stop

@section('content')
<div class="containerForm-Validation">
  <main>
    <div class="py-5 text-center">
      <h2 class="mx-auto mb-1 py-5 featurette-heading"><span class="text-muted"> <i class="fas fa-user"  width="75" height="75" fill="currentColor" ></i>  Création Campagne Mesure <i class="fas fa-user"  width="75" height="75" fill="currentColor"></i> </span></h2>

    </div>
    <div class="row g-3   shadow p-3">
      <div class="col-md-7 col-lg-8 mx-auto ">
        <form class="needs-validation" novalidate method="POST" action="{{ route('modifierCampagneMesure_path' , ['id' => $campagne->id ])}}">
           @csrf


        <!--'latitudecampagne',
        'longitudeCampagne',-->
        	<hr class="my-4 text-muted">
          <div class="row g-3">
            <div class="col-sm-12">
              <label for="firstName" class="form-label text-muted">Adresse de la campagne</label>
              <input type="text" class="form-control" id="prenom" name="adresseCampagne" placeholder="Lycée Alfred Klaster" value="{{ $campagne->adresseCampagne }}">
              <div class="invalid-feedback">
                Un prénom nom valide est requis.
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label text-muted">Direction ( information ) </label>
              <input type="text" class="form-control" id="email" name="Direction" placeholder="Vers le Nord" value="{{ $campagne->Direction }}">
              <div class="invalid-feedback">
                Veuillez saisir une adresse e-mail valide.
              </div>
            </div>

            <div class="col-md-4">
              <label for="country" class="form-label text-muted">N° de la route</label>
              <input type="text" class="form-control" id="region" name="numeroRoute"  placeholder="Ex: D15" value="{{ $campagne->numeroRoute }}">
              <div class="invalid-feedback">
                Veuillez saisir une région valide.
              </div>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label text-muted">Ville</label>
              <input type="text" class="form-control" id="ville" name="ville" placeholder="Ex: Talence" value="{{ $campagne->ville }}">
              <div class="invalid-feedback">
                Veuillez saisir une ville valide.
              </div>
            </div>

            <div class="col-md-4">
              <label for="zip" class="form-label text-muted">Code Postal</label>
              <input type="text" class="form-control" id="CP" name="codePostal" placeholder="Ex: 33522" value="{{ $campagne->codePostal }}">
              <div class="invalid-feedback">
                Veuillez saisir un N° de code postal valide.
              </div>
            </div>
            </div>
          
            

            <hr class="my-4  text-muted">

            <div class="col-12">
              <label for="email" class="form-label text-muted">Date Début</label>
              <input type="date" class="form-control" id="telephone" name="DebutCampagne" placeholder="" value="{{ $campagne->DebutCampagne }}">
              <div class="invalid-feedback">
                Veuillez saisir un numéro de téléphone valide.
              </div>
            </div>
            <br>
            <div class="col-12">
              <label  class="form-label text-muted">Date Fin ( laisser vide si en cours ) </label>
              <input type="date" class="form-control" id="address" name="FinCampagne" placeholder="" value="{{ $campagne->FinCampagne }}">
            </div>

            <hr class="my-4  text-muted">
            
            <label for="state" class="form-label text-muted">Statut</label>

            <div class="my-3">
                <div class="form-check">
                <input  name="statut" type="radio" class="form-check-input"  value="en cours" @if($campagne->statut == "en cours") checked @endif> <span class="tx-white"> En cours </span>
                </div>
                <div class="form-check">
                <input  name="statut" type="radio" class="form-check-input"  value="fini" @if($campagne->statut == "fini") checked @endif> <span class="tx-white"> Fini </span>
                </div>
            </div>


          <hr class="my-4  text-muted">

          <label for="state" class="form-label text-muted">Limitation Vitesse</label>

          <div class="my-3">
            <div class="form-check">
              <input  name="limitationvitesse" type="radio" class="form-check-input" value="30" @if($campagne->limitationvitesse == "30") checked @endif> <span class="tx-white"> 30 </span>
            </div>
            <div class="form-check">
              <input  name="limitationvitesse" type="radio" class="form-check-input" value="50" @if($campagne->limitationvitesse == "50") checked @endif> <span class="tx-white"> 50 </span>
            </div>
            <div class="form-check">
              <input  name="limitationvitesse" type="radio" class="form-check-input" value="70" @if($campagne->limitationvitesse == "70") checked @endif> <span class="tx-white"> 70 </span>
            </div>
            <div class="form-check">
              <input  name="limitationvitesse" type="radio" class="form-check-input" value="80" @if($campagne->limitationvitesse == "80") checked @endif> <span class="tx-white"> 80 </span>
            </div>
            <div class="form-check">
              <input  name="limitationvitesse" type="radio" class="form-check-input" value="90" @if($campagne->limitationvitesse == "90") checked @endif> <span class="tx-white"> 90 </span>
            </div>
            <div class="form-check">
              <input  name="limitationvitesse" type="radio" class="form-check-input" value="110" @if($campagne->limitationvitesse == "110") checked @endif> <span class="tx-white"> 110 </span>
            </div>
            <div class="form-check">
              <input  name="limitationvitesse" type="radio" class="form-check-input" value="130" @if($campagne->limitationvitesse == "130") checked @endif> <span class="tx-white"> 130 </span>
            </div>
          </div>

            <hr class="my-4  text-muted">

         	<div class="col-12">
              <label for="address" class="form-label text-muted">Associer client</label>
                <select name="id_user" id="user" class="form-control">
                <option value="{{ $clientdefault->id }}">{{ $clientdefault->name }} {{$clientdefault->prenom }}</option>
                @foreach ($client as $client)
                @if($client->role->name == "user")
                @if($client->name != $clientdefault->name)
                <option value="{{ $client->id }}"> {{ $client->name }} {{ $client->prenom }}</option>
                @endif
                @endif
                @endforeach
                </select> 
              <!--<input type="option" class="form-control" id="address" name="nomEntreprise" placeholder="">-->
              <div class="invalid-feedback">
                Veuillez saisir un nom d'entreprise valide.
              </div>
            </div>

          <hr class="my-4 text-muted">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Modifier la campagne de mesure</button>
        </form>
        <hr class="my-4 text-muted">

        <div class="border border-dark">
        <div id="map">

        <!-- Ici s'affichera la carte -->
        </div>
        </div>
      </div>
    </div>

  </main>
</div>
@stop

@section('script')
	<script src="{{ asset('/js/form-validation.js')}}"></script>
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>

    <script type="text/javascript">
    // On initialise la latitude et la longitude du centre de la France
    var lat = 47;
    var lon = 2.349903;
    var macarte = null;
    var zoom =  8;

    // Fonction d'initialisation de la carte
    function initMap() {
        // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
        macarte = L.map('map').setView([lat, lon], zoom);
        // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
        L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
            // Il est toujours bien de laisser le lien vers la source des données
            attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
            minZoom: 1,
            maxZoom: 20
        }).addTo(macarte);

        var marker = L.marker([47, 2.34]).addTo(macarte);
        //marker.bindPopup(balise);

    }
    window.onload = function(){
        // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
        initMap();
    };

    </script>

@stop
