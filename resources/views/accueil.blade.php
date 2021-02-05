@extends('layouts.home', ['title' => 'Home'])

@section('style')

    <link href="{{ asset('/bootstrap/carousel.css')}}" rel="stylesheet">

@stop

@if (Auth::user()->hasRole('admin') or Auth::user()->hasRole('technicien') )

@section('content')

            @if( !empty($alert))
              <div class="alert success text-center" id="alert">
                <span class="closebtn">&times;</span>  
                <strong>Succés !</strong> 
                <hr>
                Le compte client à bien était crée
              </div>
            @endif

<main>

                      

  <section class="py-5 text-center container">


                

    <div class="row py-lg-5">


      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="featurette-heading">Bienvenue <span  class="@if(Auth::user()->preference == "theme_dark") tx-white @else tx-black @endif" > {{ Auth::user()->name }} {{ Auth::user()->prenom }}</span></h1> 
        <p class="lead text-muted">Vous êtes un {{ Auth::user()->role->name }} du site, faites attention à ce que vous faites, vous avez des grandes responsibilités !</p>
      </div>
    </div>
  </section> 

  <div class="album py-5">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 @if (Auth::user()->hasRole('admin')) row-cols-md-3 @else row-cols-md-2 @endif g-3">
        @if (Auth::user()->hasRole('admin'))
        <div class="col">
          <div class="shadow mb-5">
            <svg class="bd-placeholder-img card-img-top @if(Auth::user()->preference == "theme_dark") bg-dark @else bg-light @endif" width="100%" height="175" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><text x="50%" y="50%" fill="@if(Auth::user()->preference == "theme_dark") #eceeef @else #2E2E2E @endif" dy=".3em">Gestion Compte Client</text></svg>
            <svg class="bd-placeholder-img card-img-top @if(Auth::user()->preference == "theme_dark") bg-dark @else bg-light @endif" width="100%" height="100" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><text x="50%" y="20%" fill="@if(Auth::user()->preference == "theme_dark") #eceeef @else #2E2E2E @endif" dy=".3em">Créer, Modifier ou Supprimer</text> <text x="50%" y="50%" fill="@if(Auth::user()->preference == "theme_dark") #eceeef @else #2E2E2E @endif" dy=".3em">les comptes des clients</text></svg>

            <div class="card-body @if(Auth::user()->preference == "theme_dark") bg-dark @else bg-light @endif">
              <div class="d-flex justify-content-between align-items-center">
                  <a class="w-100" href="{{ route('listeClient_path') }}"><button type="button" class="w-100 btn btn-sm btn-outline-secondary"> Gérer Compte Client</button> </a>
              </div>
            </div>
          </div>
        </div>
        @endif
        <div class="col">
          <div class="shadow mb-5">
            <svg class="bd-placeholder-img card-img-top @if(Auth::user()->preference == "theme_dark") bg-dark @else bg-light @endif" width="100%" height="175" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><text x="50%" y="50%" fill="@if(Auth::user()->preference == "theme_dark") #eceeef @else #2E2E2E @endif" dy=".3em">Gestion Campagne De Mesure</text></svg>
            <svg class="bd-placeholder-img card-img-top @if(Auth::user()->preference == "theme_dark") bg-dark @else bg-light @endif" width="100%" height="100" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><text x="50%" y="20%" fill="@if(Auth::user()->preference == "theme_dark") #eceeef @else #2E2E2E @endif" dy=".3em">Créer, Modifier ou Supprimer</text> <text x="50%" y="50%" fill="@if(Auth::user()->preference == "theme_dark") #eceeef @else #2E2E2E @endif" dy=".3em">les campagnes de mesure</text></svg>

            <div class="card-body @if(Auth::user()->preference == "theme_dark") bg-dark @else bg-light @endif">
            <div class="d-flex justify-content-between align-items-center">
                  <a class="w-100" href="{{ route('listeCampagneMesure_path') }}"><button type="button" class="w-100 btn btn-sm btn-outline-secondary"> Gérer Campagne De Mesure </button> </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="shadow mb-5">
            <svg class="bd-placeholder-img card-img-top @if(Auth::user()->preference == "theme_dark") bg-dark @else bg-light @endif" width="100%" height="175" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><text x="50%" y="50%" fill="@if(Auth::user()->preference == "theme_dark") #eceeef @else #2E2E2E @endif" dy=".3em">Gestion Boitier</text></svg>
            <svg class="bd-placeholder-img card-img-top @if(Auth::user()->preference == "theme_dark") bg-dark @else bg-light @endif" width="100%" height="100" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><text x="50%" y="20%" fill="@if(Auth::user()->preference == "theme_dark") #eceeef @else #2E2E2E @endif" dy=".3em">Créer, Modifier ou Supprimer</text> <text x="50%" y="50%" fill="@if(Auth::user()->preference == "theme_dark") #eceeef @else #2E2E2E @endif" dy=".3em">les Boitiers</text></svg>

            <div class="card-body @if(Auth::user()->preference == "theme_dark") bg-dark @else bg-light @endif">
            <div class="d-flex justify-content-between align-items-center">
                  <a class="w-100" href="{{ route('listeBoitier_path') }}"><button type="button" class="w-100 btn btn-sm btn-outline-secondary"> Gérer Boitier </button> </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>
@stop

@section('scriptAlert')

 <script>
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

@stop

@else

@section('content')
  <main>
  <section class="py-5 text-center container">
  <div class="row py-lg-5">
  <div class="col-lg-6 col-md-8 mx-auto">
  <h1 class="featurette-heading">Bienvenue <span  class="@if(Auth::user()->preference == "theme_dark") tx-white @else tx-black @endif" >{{ Auth::user()->name }} {{ Auth::user()->prenom }}</span></h1>
   <p class="lead text-muted">Vous êtes un {{ Auth::user()->role->name }} du site </p>
  </div>
  </div>
  </section>
  </main>
@stop

@endif