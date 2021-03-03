@extends('layouts.home', ['title' => 'Modifier Compte Client'])


@section('style')
  <link href="{{ asset('/bootstrap/form-validation.css')}}" rel="stylesheet">
@stop


@section('content')
<div class="containerForm-Validation">
  <main>
    <div class="py-5 text-center">
      <h2 class="mx-auto mb-1 py-5 featurette-heading"><span class="text-muted"> <i class="fas fa-user"  width="75" height="75" fill="currentColor" ></i>  Information Compte {{ $client->role->name }}  <i class="fas fa-user"  width="75" height="75" fill="currentColor"></i> </span></h2>

    </div>
    <div class="row g-3   shadow p-3">
      <div class="col-md-7 col-lg-8 mx-auto ">
        <form class="needs-validation" novalidate method="POST" action="{{ route('modifierClient_path', ['id' => $client->id ]) }}">
           @csrf
          <hr class="my-4 text-muted">
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label text-muted">Prénom</label>
              <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom Client" value="{{ $client->prenom }}" required>
              <div class="invalid-feedback">
                Un prénom valide est requis.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="firstName" class="form-label text-muted">Nom</label>
              <input type="text" class="form-control" id="prenom" name="name" placeholder="Prénom Client" value="{{ $client->name }}" required>
              <div class="invalid-feedback">
                Un prénom valide est requis.
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label text-muted">Adresse Mail</label>
              <input type="email" class="form-control" id="email" name="email" value="{{ $client->email }}" required>
              <div class="invalid-feedback">
                Veuillez saisir une adresse e-mail valide.
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label text-muted">Numéro Téléphone</label>
              <input type="text" class="form-control" id="telephone" placeholder="" value="{{ $client->numeroTel }}" required>
              <div class="invalid-feedback">
                Veuillez saisir un numéro de téléphone valide.
              </div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label text-muted">Adresse</label>
              <input type="text" class="form-control" id="address" name="adresseClient" value="{{ $client->adresseClient }}" required>
              <div class="invalid-feedback">
                Veuillez saisir une adresse valide.
              </div>
            </div>

            <div class="col-md-5">
              <label for="country" class="form-label text-muted">Région</label>
              <input type="text" class="form-control" id="region" name="region" value="{{ $client->region }}" required>
              <div class="invalid-feedback">
                Veuillez saisir une région valide.
              </div>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label text-muted">Ville</label>
              <input type="text" class="form-control" id="ville" name="ville" value="{{ $client->ville }}" required>
              <div class="invalid-feedback">
                Veuillez saisir une ville valide.
              </div>
            </div>

            <div class="col-md-3">
              <label for="zip" class="form-label text-muted">Code Postal</label>
              <input type="text" class="form-control" id="CP" name="codePostal" value="{{ $client->codePostal }}" required>
              <div class="invalid-feedback">
                Veuillez saisir un N° de code postal valide.
              </div>
            </div>
          </div>

          <hr class="my-4  text-muted">

          <div class="col-12">
              <label for="address" class="form-label text-muted">Nom Entreprise</label>
              <input type="text" class="form-control" id="address" name="nomEntreprise" value="{{ $client->nomEntreprise }}">
              <div class="invalid-feedback">
                Veuillez saisir un nom d'entreprise valide.
              </div>
            </div>
          <hr class="my-4 text-muted">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Modifier le compte</button>
        </form>
        <hr class="my-4 text-muted">
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
