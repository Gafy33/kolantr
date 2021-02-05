@extends('layouts.home', ['title' => 'Création Campagne Mesure'])


@section('style')
  <link href="{{ asset('/bootstrap/form-validation.css')}}" rel="stylesheet">
@stop

@section('content')
<div class="containerForm-Validation">
  <main>
    <div class="py-5 text-center">
      <h2 class="mx-auto mb-1 py-5 featurette-heading"><span class="text-muted"> <i class="fas fa-user"  width="75" height="75" fill="currentColor" ></i>  Création Campagne Mesure <i class="fas fa-user"  width="75" height="75" fill="currentColor"></i> </span></h2>

    </div>
    <div class="row g-3   shadow p-3">
      <div class="col-md-7 col-lg-8 mx-auto ">
        <form class="needs-validation" novalidate method="POST" action="{{ route('creationCampagneMesure_path')}}">
           @csrf


        <!--'latitudecampagne',
        'longitudeCampagne',-->
        	<hr class="my-4 text-muted">
          <div class="row g-3">
            <div class="col-sm-12">
              <label for="firstName" class="form-label text-muted">Adresse de la campagne</label>
              <input type="text" class="form-control" id="prenom" name="adresseCampagne" placeholder="Lycée Alfred Klaster" value="" required>
              <div class="invalid-feedback">
                Un prénom nom valide est requis.
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label text-muted">Direction ( information ) </label>
              <input type="text" class="form-control" id="email" name="Direction" placeholder="Vers le Nord" required>
              <div class="invalid-feedback">
                Veuillez saisir une adresse e-mail valide.
              </div>
            </div>

            <div class="col-md-4">
              <label for="country" class="form-label text-muted">N° de la route</label>
              <input type="text" class="form-control" id="region" name="numeroRoute"  placeholder="Ex: D15" required>
              <div class="invalid-feedback">
                Veuillez saisir une région valide.
              </div>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label text-muted">Ville</label>
              <input type="text" class="form-control" id="ville" name="ville" placeholder="Ex: Talence" required>
              <div class="invalid-feedback">
                Veuillez saisir une ville valide.
              </div>
            </div>

            <div class="col-md-4">
              <label for="zip" class="form-label text-muted">Code Postal</label>
              <input type="text" class="form-control" id="CP" name="codePostal" placeholder="Ex: 33522" required>
              <div class="invalid-feedback">
                Veuillez saisir un N° de code postal valide.
              </div>
            </div>
            </div>
          
            

            <hr class="my-4  text-muted">

            <div class="col-12">
              <label for="email" class="form-label text-muted">Date Début</label>
              <input type="date" class="form-control" id="telephone" name="DebutCampagne" placeholder="" required>
              <div class="invalid-feedback">
                Veuillez saisir un numéro de téléphone valide.
              </div>
            </div>
            <br>
            <div class="col-12">
              <label  class="form-label text-muted">Date Fin ( laisser vide si en cours ) </label>
              <input type="date" class="form-control" id="address" name="FinCampagne" placeholder="">
            </div>

            <hr class="my-4  text-muted">
            
            <label for="state" class="form-label text-muted">Statut</label>

            <div class="my-3">
                <div class="form-check">
                <input  name="statut" type="radio" class="form-check-input"  value="en cours" required> <span class="tx-white"> En cours </span>
                </div>
                <div class="form-check">
                <input  name="statut" type="radio" class="form-check-input"  value="fini" required> <span class="tx-white"> Fini </span>
                </div>
            </div>


          <hr class="my-4  text-muted">

          <label for="state" class="form-label text-muted">Limitation Vitesse</label>

          <div class="my-3">
            <div class="form-check">
              <input  name="limitationvitesse" type="radio" class="form-check-input" value="30" required> <span class="tx-white"> 30 </span>
            </div>
            <div class="form-check">
              <input  name="limitationvitesse" type="radio" class="form-check-input" value="50" required> <span class="tx-white"> 50 </span>
            </div>
            <div class="form-check">
              <input  name="limitationvitesse" type="radio" class="form-check-input" value="70" required> <span class="tx-white"> 70 </span>
            </div>
            <div class="form-check">
              <input  name="limitationvitesse" type="radio" class="form-check-input" value="80" required> <span class="tx-white"> 80 </span>
            </div>
            <div class="form-check">
              <input  name="limitationvitesse" type="radio" class="form-check-input" value="90" required> <span class="tx-white"> 90 </span>
            </div>
            <div class="form-check">
              <input  name="limitationvitesse" type="radio" class="form-check-input" value="110" required> <span class="tx-white"> 110 </span>
            </div>
            <div class="form-check">
              <input  name="limitationvitesse" type="radio" class="form-check-input" value="130" required> <span class="tx-white"> 130 </span>
            </div>
          </div>

            <hr class="my-4  text-muted">

         	<div class="col-12">
              <label for="address" class="form-label text-muted">Associer client ( rien choisir si client introuvable )</label>
                <select name="id_user" id="user" class="form-control">
                <option value="0">Défault</option>
                @foreach ($client as $client)
                @if($client->role->name == "user")
                <option value="{{ $client->id }}"> {{ $client->name }} {{ $client->prenom }}</option>
                @endif
                @endforeach
                </select> 
              <!--<input type="option" class="form-control" id="address" name="nomEntreprise" placeholder="">-->
              <div class="invalid-feedback">
                Veuillez saisir un nom d'entreprise valide.
              </div>
            </div>

          <hr class="my-4 text-muted">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Crée la campagne de mesure</button>
        </form>
        <hr class="my-4 text-muted">
      </div>
    </div>
    
  </main>
</div>
@stop

@section('script')
	<script src="{{ asset('/js/form-validation.js')}}"></script>
@stop
