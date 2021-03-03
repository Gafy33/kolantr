@extends('layouts.home', ['title' => 'Gérer Boitier Mesure'])


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

<div class="containerForm-Validation" id="chargement">
  <main>

    <div class="py-5 text-center">
      <label for="firstName" class="mx-auto mb-1 py-5 featurette-heading"><div class="spinner-border text-light" role="status" id="bar">
      <span class="visually-hidden">Loading...</span>
      </div></label>
    </div>
  </main>
</div>

<div class="containerForm-Validation" id="bloc">
  <main>

    <div class="py-5 text-center">
      <h2 class="mx-auto mb-1 py-5 featurette-heading"><span class="text-muted"> <i class="fas fa-cubes" width="75" height="75" fill="currentColor" ></i>  Gérer Boitier  <i class="fas fa-cubes" width="75" height="75" fill="currentColor" ></i> </span></h2>
    </div>

    <div class="row g-3   shadow p-3">
      <div class="col-md-7 col-lg-12 mx-auto ">
        <div class="row g-3">
            <div class="col-md-8">
                 <a href="{{ route('creationBoitier_path')}}"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="35" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                </svg></a>
            </div>
            <div class="col-md-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="35" fill="currentColor" class="bi bi-search @if(Auth::user()->preference == "theme_dark") tx-white @else tx-black @endif" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </div>
            <div class="col-md-3">
                  <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Rechercher" value="" required>
            </div>
      </div>
    </div>
    </div>
    <hr>
    <div class="row g-3   shadow p-3">
      <div class="col-md-7 col-lg-12 mx-auto ">
        <div class="row g-3">

        <div class="navbar navbar-expand-lg navbar-dark" aria-label="Eighth navbar example">
        <div class="container">

        <div class="col-md-3">
              <label for="firstName" class="form-label text-muted">Adresse @Sigfox</label><br>
        </div>

        <div class="col-md-3">
              <label for="firstName" class="form-label text-muted">Niveau Batterie</label><br>
        </div>


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample00" aria-controls="navbarsExample00" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample00">
        <div class="col-md-10">
              <label for="firstName" class="form-label text-muted">Statut</label><br>
        </div>
        <div class="col-md-1">
              <label for="firstName" class="form-label text-muted">Edit</label>
        </div>
        <div class="col-md-1">
              <label for="firstName" class="form-label text-muted">Delete</label>
        </div>
        </div>
        </div>
        </div>
        <hr class="my-4 @if(Auth::user()->preference == "theme_dark") tx-white @else tx-black @endif">


        @foreach ($boitier as $boitier)
        <div class="navbar navbar-expand-lg navbar-dark" aria-label="Eighth navbar example">
        <div class="container">

        <div class="col-md-3">
              <label for="firstName" class="form-label @if(Auth::user()->preference == "theme_dark") tx-white @else tx-black @endif">{!! $boitier->sigfox !!}</label>
        </div>

        <div class="col-md-3">
              <label for="firstName" class="form-label @if(Auth::user()->preference == "theme_dark") tx-white @else tx-black @endif">
              @if(!empty($boitier->alarmeBatterie))
              {!! $boitier->alarmeBatterie !!}
              @else
              <div class="spinner-border text-light" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
              @endif
            </label>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample{!! $boitier->id !!}" aria-controls="navbarsExample{!! $boitier->id !!}" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample{!! $boitier->id !!}">
        <div class="col-md-10">
              <label for="firstName" class="form-label @if(Auth::user()->preference == "theme_dark") tx-white @else tx-black @endif">{!! $boitier->statut !!}</label>
        </div>
        <div class="col-md-1">
                <a href="{{ route('modifierBoitier_path', ['id' => $boitier->id ])}}"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg> 
                </a>
        </div>
        <div class="col-md-1">
                <a onclick="return confirmdelete();" href="{{ route('deleteBoitier_path', ['id' => $boitier->id ])}}"> <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg></a>
        </div>
        </div>
        </div>
        </div>
        <hr class="my-4 text-muted">
        @endforeach
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
  <script>

    function confirmdelete() {
      if(!confirm("Êtes-vous sûr de vouloir le supprimer ?"))
      event.preventDefault();
    }

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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      $("#chargement").fadeOut(1500, function(){
        $("#bloc").fadeIn(1000)
      });
    });
  </script>
@stop