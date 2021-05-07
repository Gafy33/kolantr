@extends('layouts.home', ['title' => 'Création Boitier Mesure'])


@section('style')
  <link href="{{ asset('/bootstrap/form-validation.css')}}" rel="stylesheet">
@stop

@section('content')
<div class="containerForm-Validation">
  <main>
    <div class="py-5 text-center">
      <h2 class="mx-auto mb-1 py-5 featurette-heading"><span class="text-muted"> <i class="fas fa-user"  width="75" height="75" fill="currentColor" ></i>  Création Boitier <i class="fas fa-user"  width="75" height="75" fill="currentColor"></i> </span></h2>

    </div>
    <div class="row g-3   shadow p-3">
      <div class="col-md-7 col-lg-8 mx-auto ">
        <form class="needs-validation" novalidate method="POST" action="{{ route('creationBoitier_path')}}">
           @csrf

        	<hr class="my-4 text-muted">
            <div class="row g-3">
            <div class="col-sm-12">
              <label for="firstName" class="form-label text-muted">Adresse @sigfox</label>
              <input type="text" class="form-control" id="sigfox" name="sigfox" placeholder="e641221" value="" required>
              <div class="invalid-feedback">
                Une adresse sigfox valide est requis.
              </div>
            </div>
            
            <hr class="my-4  text-muted">
            
            <label for="state" class="form-label text-muted">Statut</label>

            <div class="my-3">
                <div class="form-check">
                <input  name="statut" type="radio" class="form-check-input"  value="non utilisé" required> <span class="@if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif"> non utilisé </span>
                </div>
            </div>


          <hr class="my-4  text-muted">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Crée le boitier</button>
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
