@extends('layouts.home', ['title' => 'Demande'])


@section('style')
  <link href="{{ asset('/bootstrap/form-validation.css')}}" rel="stylesheet">
@stop

@section('content')

@if(!empty($alert))
    <div class="alert success text-center" id="alert">
        <span class="closebtn">&times;</span>  
        <strong>Succés !</strong> 
        <hr>
        {!! $messagealert !!}
    </div>
@endif


<div class="containerForm-Validation">
  <main>
    <div class="py-5 text-center">
      <h2 class="mx-auto mb-1 py-5 featurette-heading"><span class="text-muted"> Faire une demande de campagne de mesure  </span></h2>

    </div>

    <div class="row g-3   shadow p-3">
      <div class="col-md-7 col-lg-8 mx-auto ">
        <form class="needs-validation" novalidate method="POST" action="{{ route('sendmessage')}}">
           @csrf
        <div class="row g-3">

		<div class="py-5 text-center">
      	<h2 class="mx-auto mb-1 py-5 featurette-heading"><span class="text-muted"> <i class="fas fa-user"  width="75" height="75" fill="currentColor" ></i>  Information personnelle  <i class="fas fa-user"  width="75" height="75" fill="currentColor"></i> </span></h2>
    	</div>

            <div class="col-sm-6">
              <label for="firstName" class="form-label text-muted">Prénom</label>
              <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom Client" value="{{ Auth::user()->prenom }}" required>
              <div class="invalid-feedback">
                Un prénom nom valide est requis.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="firstName" class="form-label text-muted">Nom</label>
              <input type="text" class="form-control" id="prenom" name="name" placeholder="Nom Client" value="{{ Auth::user()->name }}" required>
              <div class="invalid-feedback">
                Un prénom nom valide est requis.
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label text-muted">Adresse Mail</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="you@example.com" value="{{ Auth::user()->email }}" required>
              <div class="invalid-feedback">
                Veuillez saisir une adresse e-mail valide.
              </div>
            </div>

		  <div class="row g-3">
			<div class="py-5 text-center">
			<h2 class="mx-auto mb-1 py-5 featurette-heading"><span class="text-muted"> <i class="fas fa-user"  width="75" height="75" fill="currentColor" ></i>  Information campagne de mesure  <i class="fas fa-user"  width="75" height="75" fill="currentColor"></i> </span></h2>
			</div>

			<div class="col-8">
              <label for="address_campagne" class="form-label text-muted">Adresse</label>
              <input type="text" class="form-control" id="address_campagne" name="address_campagne" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Veuillez saisir une adresse valide.
              </div>
            </div>
			
			<div class="col-md-4">
              <label for="state" class="form-label text-muted">Route</label>
              <input type="text" class="form-control" id="route_campagne" name="route_campagne" placeholder="Ex: 10 rue ..." required>
              <div class="invalid-feedback">
                Veuillez saisir une route valide.
              </div>
            </div>
			
            <div class="col-md-5">
              <label for="country" class="form-label text-muted">Région</label>
              <input type="text" class="form-control" id="region_campagne" name="region_campagne"  placeholder="Ex: Nouvelle-Aquitaine" required>
              <div class="invalid-feedback">
                Veuillez saisir une région valide.
              </div>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label text-muted">Ville</label>
              <input type="text" class="form-control" id="ville_campagne" name="ville_campagne" placeholder="Ex: Talence" required>
              <div class="invalid-feedback">
                Veuillez saisir une ville valide.
              </div>
            </div>

			<div class="col-md-3">
              <label for="zip" class="form-label text-muted">Code Postal</label>
              <input type="text" class="form-control" id="CP_campagne" name="codePostal_campagne" placeholder="Ex: 33522" required>
              <div class="invalid-feedback">
                Veuillez saisir un N° de code postal valide.
              </div>
            </div>

			
			
          </div>

          <hr class="my-4 text-muted">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Envoyer</button>
        </form>
        <hr class="my-4 text-muted">
      </div>
    </div>
    
  </main>


@include('layouts.partials.footer') 
    
</div>
@stop

@section('script')
	<script type="text/javascript">


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

					var close = document.getElementsByClassName("closebtn");
  var i;

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function(){
      var div = this.parentElement;
      div.style.opacity = "0";
      setTimeout(function(){ div.style.display = "none"; }, 600);
    }
  }

  var myVar = setInterval(myTimer, 2500);

  function myTimer() {
        var div = document.getElementById("alert");
        div.style.opacity = "0";
        setTimeout(function(){ div.style.display = "none"; }, 600);
  }
	</script>
	<script src="{{ asset('/js/form-validation.js')}}"></script>
@stop
