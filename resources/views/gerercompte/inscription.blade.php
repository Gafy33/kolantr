@extends('layouts.home', ['title' => 'Création Compte Client'])


@section('style')
  <link href="{{ asset('/bootstrap/form-validation.css')}}" rel="stylesheet">
@stop

@section('content')

@if(!empty($alert))
    <div class="alert error text-center" id="alert">
        <span class="closebtn">&times;</span>  
        <strong>Succés !</strong> 
        <hr>
        {!! $messagealert !!}
    </div>
@endif


<div class="containerForm-Validation">
  <main>
    <div class="py-5 text-center">
      <h2 class="mx-auto mb-1 py-5 featurette-heading"><span class="text-muted"> <i class="fas fa-user"  width="75" height="75" fill="currentColor" ></i>  Création Compte Client  <i class="fas fa-user"  width="75" height="75" fill="currentColor"></i> </span></h2>

    </div>
    <div class="row g-3   shadow p-3">
      <div class="col-md-7 col-lg-8 mx-auto ">
        <form class="needs-validation" novalidate method="POST" action="{{ route('ajouterClient_path')}}">
           @csrf
        	<hr class="my-4 text-muted">
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label text-muted">Prénom</label>
              <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom Client" value="" required>
              <div class="invalid-feedback">
                Un prénom nom valide est requis.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="firstName" class="form-label text-muted">Nom</label>
              <input type="text" class="form-control" id="prenom" name="name" placeholder="Nom Client" value="" required>
              <div class="invalid-feedback">
                Un prénom nom valide est requis.
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
              <div class="input-group">
                <input type="password" class="form-control" id="mdp" name="password" placeholder="Mot de passe" required>
                <span class="input-group-text fas fa-eye" style="cursor: pointer;border-top-right-radius: 3px;border-bottom-right-radius: 3px;" onclick="Afficher()" id="eye"> </span>
              <div class="invalid-feedback">
                  Un mot de passe valide est requis.
              </div>
              </div>
            </div>

            <div class="col-12">
              <label for="username" class="form-label text-muted">Mot de passe</label>
                <input type="password" class="form-control" id="mdp2" name="password_confirmed" placeholder="Mot de passe" required>
              <div class="invalid-feedback">
                  Un mot de passe valide est requis.
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label text-muted">Adresse Mail</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="you@example.com" required>
              <div class="invalid-feedback">
                Veuillez saisir une adresse e-mail valide.
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label text-muted">Numéro Téléphone</label>
              <input type="text" class="form-control" id="telephone" name="numeroTel" placeholder="" maxlength="10"  required>
              <div class="invalid-feedback">
                Veuillez saisir un numéro de téléphone valide.
              </div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label text-muted">Adresse</label>
              <input type="text" class="form-control" id="address" name="adresseClient" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Veuillez saisir une adresse valide.
              </div>
            </div>

            <div class="col-md-5">
              <label for="country" class="form-label text-muted">Région</label>
              <input type="text" class="form-control" id="region" name="region"  placeholder="Ex: Nouvelle-Aquitaine" required>
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

            <div class="col-md-3">
              <label for="zip" class="form-label text-muted">Code Postal</label>
              <input type="text" class="form-control" id="CP" name="codePostal" placeholder="Ex: 33522" required>
              <div class="invalid-feedback">
                Veuillez saisir un N° de code postal valide.
              </div>
            </div>
          </div>

          <hr class="my-4  text-muted">
          <label for="state" class="form-label text-muted">Entreprise</label>

          <div class="my-3">
            <div class="form-check">
              <input id="ouiEntreprise" name="entreprise" type="radio" class="form-check-input" onclick="AfficherEntreprise();" value="oui" required> <span class="@if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif"> Oui </span>
            </div>
            <div class="form-check">
              <input id="nonEntreprise" name="entreprise" type="radio" class="form-check-input" onclick="CacherEntreprise();" value="non" required> <span class="@if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif"> Non </span>
            </div>
          </div>

         	<div class="col-12" id="maDIV" style="display:none;">
              <label for="address" class="form-label text-muted">Nom Entreprise</label>
              <input type="text" class="form-control" id="address" name="nomEntreprise" placeholder="Ex: google">
              <div class="invalid-feedback">
                Veuillez saisir un nom d'entreprise valide.
              </div>
          </div>

          <hr class="my-4 text-muted">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Créer le compte</button>
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
					  return 'c' + ladate.getHours() + Math.random().toString(36).substr(2, 9) + ladate.getDate()+(ladate.getMonth()+1)+ ladate.getMinutes();
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

					

					function AfficherEntreprise() {
					  var div = document.getElementById("maDIV");
					  if (div.style.display === "none") {
					    div.style.display = "block";
					    document.getElementById("maDIV").disabled = false;
					  }
					};

					function CacherEntreprise() {
					  var div = document.getElementById("maDIV");
					  if (div.style.display === "block") {
					    div.style.display = "none";
					    document.getElementById("maDIV").disabled = true;
					  }
					};

          // Restricts input for the given textbox to the given inputFilter function.
          function setInputFilter(textbox, inputFilter) {if (input.type === "password")
          { 
          input.type = "text"; 
          } 
          else
          { 
          input.type = "password"; 
          } 
            ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
              textbox.addEventListener(event, function() {
                if (inputFilter(this.value)) {
                  this.oldValue = this.value;
                  this.oldSelectionStart = this.selectionStart;
                  this.oldSelectionEnd = this.selectionEnd;
                } else if (this.hasOwnProperty("oldValue")) {
                  this.value = this.oldValue;
                  this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                } else {
                  this.value = "";
                }
              });
            });
          }

          setInputFilter(document.getElementById("telephone"), function(value) {
          return /^-?\d*$/.test(value); });
          
          function Afficher()
          {
          var input = document.getElementById("mdp");
          var input2 = document.getElementById("mdp2"); 
          if (input.type === "password")
          {
          document.getElementById("eye").classList.remove("fas","fa-eye");
          document.getElementById("eye").classList.add("fas","fa-eye-slash");
          input.type = "text"; 
          } 
          else
          {
          document.getElementById("eye").classList.remove("fas","fa-eye-slash");
          document.getElementById("eye").classList.add("fas","fa-eye");
          input.type = "password"; 
          }
          if (input2.type === "password")
          { 
          input2.type = "text"; 
          } 
          else
          { 
          input2.type = "password"; 
          } 
          } 
	</script>
  <script src="{{ asset('/js/form-validation.js')}}"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
@stop
