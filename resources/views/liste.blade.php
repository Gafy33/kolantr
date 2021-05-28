@extends('layouts.home', ['title' => 'Liste'])


@section('style')
  <link href="{{ asset('/bootstrap/form-validation.css')}}" rel="stylesheet">
  <link href="{{ asset('/bootstrap/dashboard.css')}}" rel="stylesheet">
  <link href="{{ asset('/bootstrap/navbar.css')}}" rel="stylesheet">
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

<!--<div class="containerForm-Validation" id="chargement">
  <main>

    <div class="py-5 text-center">
      <label for="firstName" class="mx-auto mb-1 py-5 featurette-heading"><div class="spinner-border text-light" role="status" id="bar">
      <span class="visually-hidden">Loading...</span>
      </div></label>
    </div>
  </main>
</div>-->

<div class="containerForm-Validation">
<main>
  
        <br><br><br><br>
        <div class="row g-3   shadow p-3">
      <div class="col-md-7 col-lg-12 mx-auto ">
        <div class="row g-3">
            <div class="col-md-8">
                 <a href="{{ route('creationCampagneMesure_path')}}"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="35" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
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

        <div class="col-md-4">
              <label for="firstName" class="form-label text-muted">Adresse Campagne</label><br>
        </div>


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample00" aria-controls="navbarsExample00" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarsExample00">
        <div class="col-md-5">
              <label for="firstName" class="form-label text-muted">@sigfox</label><br>
        </div>
        <div class="col-md-5">
              <label for="firstName" class="form-label text-muted">Client</label><br>
        </div>
        <div class="col-md-2">
              <label for="firstName" class="form-label text-muted">statut</label>
        </div>
        </div>
        </div>
        </div>
        <hr class="my-4 @if(Auth::user()->preference == "theme_dark") tx-white @else tx-black @endif">

        @foreach ($campagne as $campagne)
        <div class="navbar navbar-expand-lg navbar-dark" aria-label="Eighth navbar example">
        <div class="container" style="border-bottom: 1px solid @if($campagne->statut == "fini") red @else green @endif">

        <div class="col-md-4">
              <label for="firstName" class="form-label @if(Auth::user()->preference == "theme_dark") tx-white @else tx-black @endif"> {!! $campagne->adresseCampagne !!} <a href="{{ route('modifierCampagneMesure_path', ['id' => $campagne->id ])}}" style="color: #FCED00"><i class="far fa-edit"></i></a> <a onclick="return confirmdelete();" href="{{ route('listedeletecampagne', ['id' => $campagne->id ])}}" style="color: #FC0000"> <i class="fas fa-trash"></i></a> </label>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample" aria-controls="navbarsExample" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample">
        <div class="col-md-5">
              @if(!empty($campagne->id_boitier))
              <label for="firstName" class="form-label @if(Auth::user()->preference == "theme_dark") tx-white @else tx-black @endif">
              @foreach($listeboitier as $listeboitiers)
                @if($campagne->id_boitier == $listeboitiers->id)
                        {{ $listeboitiers->adrSigfox }}
                @endif
              @endforeach
              <a href="{{ route('modifierBoitier_path', ['id' => $campagne->id_boitier])}}" style="color: #FCED00"><i class="far fa-edit"></i></a>
              <a onclick="return confirmdelete();" href="{{ route('listedeleteboitier', ['id' => $campagne->id_boitier ])}}" style="color: #FC0000"><i class="fas fa-trash"></i></a>
              </label>
              @else
              <div class="dropdown">  
                  <a class="nav-linkArmand" href="#" id="dropdown03" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="far fa-plus-square"></i>
                  </a>
                    <ul class="dropdown-menu mb-5" aria-labelledby="dropdown03">
                    @foreach($listeboitier as $listeboitiers)
                      @if($listeboitiers->statut == "non utilisé")
                        <li><a class="dropdown-itemblack" href="{{ route('listeajouterboitier_path', ['id_campagne' => $campagne->id, 'id_boitier' => $listeboitiers ])}}"> {{ $listeboitiers->adrSigfox }}</a></li>
                      @endif
                    @endforeach
                    </ul>
                </div> 
              @endif 
        </div>

        <div class="col-md-5">
              <label for="firstName" class="form-label @if(Auth::user()->preference == "theme_dark") tx-white @else tx-black @endif">
              @if(!empty($campagne->id_user)) @foreach($listeclient as $listeclients)
                      @if($campagne->id_user == $listeclients->id)
                        {{$listeclients->name}} {{$listeclients->prenom}}
                        @endif
                      @endforeach @else Aucun client associer @endif</label>
        </div>
        <div class="col-md-2">

                  <div class="dropdown">  
                  <a class="nav-linkArmand" href="#" id="dropdown03" data-bs-toggle="dropdown" aria-expanded="false">
                  <span class="tx-white" >{!! $campagne->statut !!} </span> <i class="fas fa-angle-down"></i>
                  </a>
                    <ul class="dropdown-menu mb-5" aria-labelledby="dropdown03">
                        <li><a class="dropdown-itemblack" href="{{ route('modifierListestatut_encours_path', ['id' => $campagne->id ])}}">En Cours</a></li>
                        <li><a class="dropdown-itemblack" href="{{ route('modifierListestatut_fini_path', ['id' => $campagne->id ])}}"> Fini</a></li>
                    </ul>
                  </div>
        </div>
        </div>
        </div>
        </div>
        @endforeach
        
        <hr class="my-4 text-muted">
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
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
  <!--<script>
    $(document).ready(function(){
      $("#chargement").fadeOut(1500, function(){
        $("#bloc").fadeIn(1000)
      });
    });
  </script>-->
@stop