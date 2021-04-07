@extends('layouts.home', ['title' => 'Compte'])


@section('style')
  <link href="{{ asset('/bootstrap/form-validation.css')}}" rel="stylesheet">
@stop

@section('content')
<div class="containerForm-Validation">
  <main>
    <div class="py-5 text-center">
      <h2 class="mx-auto mb-1 py-5 featurette-heading"><span class="text-muted"> <i class="fas fa-user"  width="75" height="75" fill="currentColor" ></i>  Information Compte {{ Auth::user()->role->name }} <i class="fas fa-user"  width="75" height="75" fill="currentColor"></i> </span></h2>

    </div>
    <div class="row g-3   shadow p-3">
      <div class="col-md-7 col-lg-8 mx-auto ">
        	<hr class="my-4 text-muted">
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label text-muted">Prénom</label><br>
              <label for="lastName" class="form-label @if(Auth::user()->preference == "theme_dark") tx-white @else tx-black @endif">{{ Auth::user()->prenom }}</label>
              <hr  class="my-4  text-muted">
              <div class="invalid-feedback">
                Un prénom nom valide est requis.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="firstName" class="form-label text-muted">Nom</label><br>
              <label for="lastName" class="form-label @if(Auth::user()->preference == "theme_dark") tx-white @else tx-black @endif">{{ Auth::user()->name }}</label>
              <hr  class="my-4  text-muted">
              <div class="invalid-feedback">
                Un prénom nom valide est requis.
              </div>
            </div>

            <div class="col-12">
              <label for="username" class="form-label text-muted">Identifiant</label><br>
              <label for="lastName" class="form-label @if(Auth::user()->preference == "theme_dark") tx-white @else tx-black @endif">{{ Auth::user()->identifiant }}</label>
              <hr  class="my-4  text-muted">
              <div class="invalid-feedback">
                  Un identifiant valide est requis.
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label text-muted">Adresse Mail</label><br>
              <label for="lastName" class="form-label @if(Auth::user()->preference == "theme_dark") tx-white @else tx-black @endif">{{ Auth::user()->email }}</label>
              <hr  class="my-4  text-muted">
              <div class="invalid-feedback">
                Veuillez saisir une adresse e-mail valide.
              </div>
            </div>

            @if( !empty(Auth::user()->numeroTel))
            <div class="col-12">
              <label for="email" class="form-label text-muted">Numéro Téléphone</label><br>
              <label for="lastName" class="form-label @if(Auth::user()->preference == "theme_dark") tx-white @else tx-black @endif">{{ Auth::user()->numeroTel }}</label>
              <hr  class="my-4  text-muted">
              <div class="invalid-feedback">
                Veuillez saisir un numéro de téléphone valide.
              </div>
            </div>
            @endif
            @if( !empty(Auth::user()->adresseClient))
            <div class="col-12">
              <label for="address" class="form-label text-muted">Adresse</label><br>
              <label for="lastName" class="form-label @if(Auth::user()->preference == "theme_dark") tx-white @else tx-black @endif">{{ Auth::user()->adresseClient }}</label>
              <hr  class="my-4  text-muted">
              <div class="invalid-feedback">
                Veuillez saisir une adresse valide.
              </div>
            </div>
            @endif
            @if( !empty(Auth::user()->region))
            <div class="col-md-5">
              <label for="country" class="form-label text-muted">Région</label><br>
              <label for="lastName" class="form-label @if(Auth::user()->preference == "theme_dark") tx-white @else tx-black @endif">{{ Auth::user()->region }}</label>
              <hr  class="my-4  text-muted">
              <div class="invalid-feedback">
                Veuillez saisir une région valide.
              </div>
            </div>
            @endif
            @if( !empty(Auth::user()->ville))
            <div class="col-md-4">
              <label for="state" class="form-label text-muted">Ville</label><br>
              <label for="lastName" class="form-label @if(Auth::user()->preference == "theme_dark") tx-white @else tx-black @endif">{{ Auth::user()->ville }}</label>
              <hr  class="my-4  text-muted">
              <div class="invalid-feedback">
                Veuillez saisir une ville valide.
              </div>
            </div>
            @endif

            @if( !empty(Auth::user()->codePostal))
            <div class="col-md-3">
              <label for="zip" class="form-label text-muted">Code Postal</label><br>
              <label for="lastName" class="form-label @if(Auth::user()->preference == "theme_dark") tx-white @else tx-black @endif">{{ Auth::user()->codePostal }}</label>
              <hr  class="my-4  text-muted">
              <div class="invalid-feedback">
                Veuillez saisir un N° de code postal valide.
              </div>
            </div>
            @endif
          </div>

          @if(Auth::user()->entreprise == "oui")

         	<div class="col-12">
              <label for="address" class="form-label text-muted">Nom Entreprise</label><br>
              <label for="lastName" class="form-label @if(Auth::user()->preference == "theme_dark") tx-white @else tx-black @endif">{{ Auth::user()->nomEntreprise }}</label>
              <div class="invalid-feedback">
                Veuillez saisir un nom d'entreprise valide.
              </div>
            </div>


          @endif

            <label for="state" class="form-label text-muted">Preference thème</label>

            <form class="needs-validation" novalidate method="POST" action="{{ route('informationCompte')}}">
              @csrf
            <div class="my-3">
              <div class="form-check">
                <input name="preference" type="radio" class="form-check-input" value="theme_white" required @if(Auth::user()->preference == "theme_white") checked @endif> <span class="@if(Auth::user()->preference == "theme_dark") tx-white @else tx-black @endif"> Jour </span>
              </div>
              <div class="form-check">
                <input name="preference" type="radio" class="form-check-input" value="theme_dark" required  @if(Auth::user()->preference == "theme_dark") checked @endif> <span class="@if(Auth::user()->preference == "theme_dark") tx-white @else tx-black @endif"> Nuit </span>
              </div>
              <input name="id_user" value="{{ Auth::user()->id }}" style="display:none;">
            </div>

            <hr class="my-4 text-muted">

            <button class="w-100 btn btn-primary btn-lg" type="submit">Changer thème</button>
            </form>
          <hr class="my-4 text-muted">

      </div>
    </div>
    
  </main>
</div>

@include('layouts.partials.footer')
@stop


@section('script')
	<script src="{{ asset('/js/form-validation.js')}}"></script>
@stop
