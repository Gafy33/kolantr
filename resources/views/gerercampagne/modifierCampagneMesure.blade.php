@extends('layouts.home', ['title' => 'Modifier Campagne Mesure'])


@section('style')
  <link href="{{ asset('/bootstrap/form-validation.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
@stop

@section('content')
<div class="containerForm-Validation">
  <main>
    <div class="py-5 text-center">
      <h2 class="mx-auto mb-1 py-5 featurette-heading"><span class="text-muted"> <i class="fas fa-user"  width="75" height="75" fill="currentColor" ></i>  Modifier Campagne Mesure <i class="fas fa-user"  width="75" height="75" fill="currentColor"></i> </span></h2>

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
              <input type="date" class="form-control" id="telephone" name="DebutCampagne" placeholder="" value="{{ $campagne->DébutCampagne }}">
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
                <input  name="statut" type="radio" class="form-check-input"  value="en cours" @if($campagne->statut == "en cours") checked @endif> <span class="tx-black"> En cours </span>
                </div>
                <div class="form-check">
                <input  name="statut" type="radio" class="form-check-input"  value="fini" @if($campagne->statut == "fini") checked @endif> <span class="tx-black"> Fini </span>
                </div>
            </div>


          <hr class="my-4  text-muted">

          <label for="state" class="form-label text-muted">Limitation Vitesse</label>

          <div class="my-3">
            <div class="form-check">
              <input  name="limitationvitesse" type="radio" class="form-check-input" value="30" @if($campagne->limitationvitesse == "30") checked @endif> <span class="tx-black"> 30 </span>
            </div>
            <div class="form-check">
              <input  name="limitationvitesse" type="radio" class="form-check-input" value="50" @if($campagne->limitationvitesse == "50") checked @endif> <span class="tx-black"> 50 </span>
            </div>
            <div class="form-check">
              <input  name="limitationvitesse" type="radio" class="form-check-input" value="70" @if($campagne->limitationvitesse == "70") checked @endif> <span class="tx-black"> 70 </span>
            </div>
            <div class="form-check">
              <input  name="limitationvitesse" type="radio" class="form-check-input" value="80" @if($campagne->limitationvitesse == "80") checked @endif> <span class="tx-black"> 80 </span>
            </div>
            <div class="form-check">
              <input  name="limitationvitesse" type="radio" class="form-check-input" value="90" @if($campagne->limitationvitesse == "90") checked @endif> <span class="tx-black"> 90 </span>
            </div>
            <div class="form-check">
              <input  name="limitationvitesse" type="radio" class="form-check-input" value="110" @if($campagne->limitationvitesse == "110") checked @endif> <span class="tx-black"> 110 </span>
            </div>
            <div class="form-check">
              <input  name="limitationvitesse" type="radio" class="form-check-input" value="130" @if($campagne->limitationvitesse == "130") checked @endif> <span class="tx-black"> 130 </span>
            </div>
          </div>

          <hr class="my-4  text-muted">

         	<div class="col-12">
              <label for="address" class="form-label text-muted">Associer client</label>
                <select name="id_user" id="user" class="form-control">
                @if(!empty($clientdefault->id)) <option value="{{ $clientdefault->id }}">{{ $clientdefault->name }} {{$clientdefault->prenom }}</option> @endif
                <option value=""> Aucun client </option>
                
                @foreach ($client as $client)

                @if(!empty($client))
                @if($client->role->name == "user")
                <option value="{{ $client->id }}"> {{ $client->name }} {{ $client->prenom }}</option>
                @endif
                @else
                @if($client->role->name == "user")
                @if($client->name != $clientdefault->name)
                <option value="{{ $client->id }}"> {{ $client->name }} {{ $client->prenom }}</option>
                @endif
                @endif
                @endif
                @endforeach
                </select> 
              <!--<input type="option" class="form-control" id="address" name="nomEntreprise" placeholder="">-->
              <div class="invalid-feedback">
                Veuillez saisir un nom d'entreprise valide.
              </div>
            </div>

          <hr class="my-4  text-muted">

          <div class="col-12">
              <label for="address" class="form-label text-muted">Associer Boitier</label>
                <select name="id_boitier" id="boitier" class="form-control">

                @if(!empty($boitierdefault))
                <option value="{{ $boitierdefault->id }}">{{ $boitierdefault->adrSigfox }}</option>
                @endif

                <option value=""> Aucun boitier </option>

                @foreach ($boitier as $boitier)

                @if(!empty($boitierdefault))
                  @if($boitier->adrSigfox != $boitierdefault->adrSigfox)
                  @if($boitier->statut == "non utilisé")
                    <option value="{{ $boitier->id }}"> {{ $boitier->adrSigfox }}</option>
                  @endif
                  @endif
                @else
                  @if($boitier->statut == "non utilisé")
                    <option value="{{ $boitier->id }}"> {{ $boitier->adrSigfox }}</option>
                  @endif
                @endif

                @endforeach
                </select> 
            </div>

          <hr class="my-4 text-muted">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Modifier la campagne de mesure</button>
        </form>
        <hr class="my-4 text-muted">

        <div class="row featurette shadow p-3 mb-5">
            <div class="col-md-13">
              <h2 class="featurette-heading">Googles Maps</h2>
              <br>
              <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q={{$campagne->adresseCampagne}}{{$campagne->ville}}{{$campagne->codePostal}}&t=&z=9&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div></div>
              </div>
          </div>
        </div>

  </main>

  @if(Auth::user()->hasRole('admin') or Auth::user()->hasRole('technicien') or $title != "Home" )

@include('layouts.partials.footer') 
    
@endif
</div>
@stop

@section('script')
	<script src="{{ asset('/js/form-validation.js')}}"></script>

@stop
