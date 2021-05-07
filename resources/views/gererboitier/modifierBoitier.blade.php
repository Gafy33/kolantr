@extends('layouts.home', ['title' => 'Modifier Boitier Mesure'])


@section('style')
  <link href="{{ asset('/bootstrap/form-validation.css')}}" rel="stylesheet">
@stop

@section('content')
<div class="containerForm-Validation">
  <main>
    <div class="py-5 text-center">
      <h2 class="mx-auto mb-1 py-5 featurette-heading"><span class="text-muted"> <i class="fas fa-user"  width="75" height="75" fill="currentColor" ></i>  Modifier Boitier <i class="fas fa-user"  width="75" height="75" fill="currentColor"></i> </span></h2>

    </div>
    <div class="row g-3   shadow p-3">
      <div class="col-md-7 col-lg-8 mx-auto ">
        <form class="needs-validation" novalidate method="POST" action="{{ route('modifierBoitier_path' , ['id' => $boitier->id ])}}">
           @csrf

        	<hr class="my-4 text-muted">
            <div class="row g-3">
            <div class="col-sm-12">
              <label for="firstName" class="form-label text-muted">Adresse @sigfox</label>
              <input type="text" class="form-control" id="sigfox" name="sigfox" placeholder="e641221" value="{{ $boitier->adrSigfox }}">
              <div class="invalid-feedback">
                Un prénom nom valide est requis.
              </div>
            </div>
            
            <hr class="my-4  text-muted">
            
            <label for="state" class="form-label text-muted">Statut</label>

            @if($boitier->statut == "utilisé")

            <label for="firstName" class="@if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif">Le boitier est associé à une campagne</label>
            @if(!empty($campagne))
            <label for="firstName" class="@if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif">Campagne associer : {{$campagne->id}} {{$campagne->adresseCampagne}}  <a href="{{ route('modifierCampagneMesure_path', ['id' => $campagne->id ])}}"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg> 
                </a></label> 
            @else
            <label for="firstName" class="@if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif">Error : Impossible de trouver la campagne</label>
            <div class="my-3">
                <div class="form-check">
                <input  name="statut" type="radio" class="form-check-input"  value="non utilisé" @if($boitier->statut == "non utilisé") checked @endif > <span class="tx-white"> non utilisé </span>
                </div>
            </div>
            @endif
            @else
            <div class="my-3">
                <div class="form-check">
                <input  name="statut" type="radio" class="form-check-input"  value="non utilisé" @if($boitier->statut == "non utilisé") checked @endif > <span class="@if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif"> non utilisé </span>
                </div>
            </div>
            <div class="my-3">
              <a href="{{ route('listeCampagneMesure_path')}}" for="firstName" class="@if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif">Associer à une campagne de mesure</a>
            </div>
            @endif


          <hr class="my-4  text-muted">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Modifier le boitier</button>
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
