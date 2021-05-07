@extends('layouts.home', ['title' => 'Création Compte Admin / Technicien'])


@section('style')
  <link href="{{ asset('/bootstrap/form-validation.css')}}" rel="stylesheet">
@stop

@section('content')
<div class="containerForm-Validation">
  <main>
    <div class="py-5 text-center">
      <h2 class="mx-auto mb-1 py-5 featurette-heading"><span class="text-muted"> <i class="fas fa-user"  width="75" height="75" fill="currentColor" ></i>  Création Compte Admin / Technicien <i class="fas fa-user"  width="75" height="75" fill="currentColor"></i> </span></h2>

    </div>
    <div class="row g-3   shadow p-3">
      <div class="col-md-7 col-lg-8 mx-auto ">
        <form class="needs-validation" novalidate method="POST" action="{{ route('ajouterAdminTechnicien_path')}}">
           @csrf
        	<hr class="my-4 text-muted">
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label text-muted">Prénom</label>
              <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom Client" value="" required>
              <div class="invalid-feedback">
                Un prénom valide est requis.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="firstName" class="form-label text-muted">Nom</label>
              <input type="text" class="form-control" id="prenom" name="name" placeholder="Prénom Client" value="" required>
              <div class="invalid-feedback">
                Un prénom valide est requis.
              </div>
            </div>

            <div class="col-12">
              <label for="username" class="form-label text-muted">Identifiant</label>
                <input type="text" class="form-control" id="Identifiant" name="identifiant" placeholder="Identifiant" required>
              <div class="invalid-feedback">
                  Un identifiant valide est requis.
              </div>
            </div>

            <div class="col-12">
              <label for="username" class="form-label text-muted">Mot de passe</label>
                <input type="text" class="form-control" id="mdp" name="password" placeholder="Mot de passe" required>
              <div class="invalid-feedback">
                  Un mot de passe valide est requis.
              </div>
            </div>

            <div class="col-12">
              <label for="username" class="form-label text-muted">Mot de passe</label>
                <input type="text" class="form-control" id="mdp2" name="password_confirmed" placeholder="Mot de passe" required>
              <div class="invalid-feedback">
                  Un mot de passe valide est requis.
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label text-muted">Adresse Mail</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
              <div class="invalid-feedback">
                Veuillez saisir une adresse e-mail valide.
              </div>
            </div>

          <hr class="my-4  text-muted">
          <label for="state" class="form-label text-muted">Role</label>

          <div class="my-3">
            <div class="form-check">
              <input name="role" type="radio" class="form-check-input" value="1" required checked> <span class="@if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif"> Admin </span>
            </div>
            <div class="form-check">
              <input name="role" type="radio" class="form-check-input" value="3" required> <span class="@if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif"> Technicien </span>
            </div>
          </div>


          <hr class="my-4 text-muted">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Crée le compte</button>
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
	<script type="text/javascript">
			         var ID = function () {
					  // Math.random should be unique because of its seeding algorithm.
					  // Convert it to base 36 (numbers + letters), and grab the first 9 characters
					  // after the decimal.
					  var ladate=new Date()
					  return 'a/t' + ladate.getHours() + Math.random().toString(36).substr(2, 9) + ladate.getDate()+(ladate.getMonth()+1)+ ladate.getMinutes();
					   };
			          document.getElementById("Identifiant").value = ID();

					var MDP = function () {
					  // Math.random should be unique because of its seeding algorithm.
					  // Convert it to base 36 (numbers + letters), and grab the first 9 characters
					  // after the decimal.
					  var ladate=new Date()
					  return ladate.getHours() + Math.random().toString(36).substr(2, 9) +   ladate.getHours() + Math.random().toString(36).substr(2, 9);
					};
            var motdepasse = MDP();
						document.getElementById("mdp").value = motdepasse;
            document.getElementById("mdp2").value = motdepasse;

				
	</script>
	<script src="{{ asset('/js/form-validation.js')}}"></script>
@stop
