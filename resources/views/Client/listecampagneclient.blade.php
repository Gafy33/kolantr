@extends('layouts.home', ['title' => 'Gérer Campagne Mesure'])


@section('style')
  <link href="{{ asset('/bootstrap/form-validation.css')}}" rel="stylesheet">
@stop

@section('content')


<div class="containerForm-Validation">
  <main>
    <div class="py-5 text-center">
      <h2 class="mx-auto mb-1 py-5 featurette-heading"><span class="text-muted" ><i class="fas fa-route" width="75" height="75" fill="currentColor" ></i>  Mes campagnes de mesure <i class="fas fa-route" width="75" height="75" fill="currentColor" ></i> </span></h2>

    </div>
    <hr>
    <div class="row g-3   shadow p-3">
      <div class="col-md-7 col-lg-12 mx-auto ">
        <div class="row g-3">

        <div class="navbar navbar-expand-lg navbar-dark" aria-label="Eighth navbar example">
        <div class="container">

        <div class="col-md-4">
              <label for="firstName" class="form-label text-muted">Adresse</label><br>
        </div>

        <div class="col-md-2">
              <label for="firstName" class="form-label text-muted">Ville</label><br>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample00" aria-controls="navbarsExample00" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample00">
        <div class="col-md-5">
              <label for="firstName" class="form-label text-muted">Date début</label><br>
        </div>
        <div class="col-md-3">
              <label for="firstName" class="form-label text-muted">Statut</label>
        </div>
        <div class="col-md-3">
              <label for="firstName" class="form-label text-muted">limitation</label>
        </div>
        <div class="col-md-1">
              <label for="firstName" class="form-label text-muted"></label>
        </div>
        </div>
        </div>
        </div>
        <hr class="my-4 tx-black">

        <!-- foreach ici -->
        @foreach($listecampagne as $listecampagne)
        @if($listecampagne->id_user == Auth::user()->id)
        <div class="navbar navbar-expand-lg navbar-dark" aria-label="Eighth navbar example">
        <div class="container">

        <div class="col-md-4">
              <label for="firstName" class="form-label tx-black"> {!! $listecampagne->adresseCampagne !!} </label>
        </div>

        <div class="col-md-2">
              <label for="firstName" class="form-label tx-black"> {!! $listecampagne->ville !!} </label>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample{{$listecampagne->id}}" aria-controls="navbarsExample{{$listecampagne->id}}" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample{{$listecampagne->id}}">
        <div class="col-md-5">
              <label for="firstName" class="form-label tx-black"> {!! $listecampagne->DébutCampagne !!} </label>
        </div>
        <div class="col-md-3">
              <label for="firstName" class="form-label tx-black"> {!! $listecampagne->statut !!} </label>  
        </div>
        <div class="col-md-3">
              <label for="firstName" class="form-label tx-black"> {!! $listecampagne->limitationvitesse !!} </label>  
        </div>
        <div class="col-md-1">
              <label for="firstName" class="form-label tx-black"> 
              <a href="{{ route('clientconsultation_path', ['id' => $listecampagne->id ]) }}"><i class="fas fa-search-plus"></i></a>
              </label>  
        </div>
        </div>
        </div>
        </div>
        <hr class="my-4 text-muted">
        @endif
        @endforeach
        <!--fin foreach -->

        <!--<hr class="my-4 text-muted">-->
      </div>
    </div>
    </div>
  </main>

    @include('layouts.partials.footer') 



</div>

@stop

@section('script')

  <script src="{{ asset('/js/form-validation.js')}}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@stop