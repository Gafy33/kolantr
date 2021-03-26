@extends('layouts.home', ['title' => 'Gérer Campagne Mesure'])


@section('style')
  <link href="{{ asset('/bootstrap/form-validation.css')}}" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com"> 
  <link href="https://fonts.googleapis.com/css2?family=Chango&display=swap" rel="stylesheet">


  <style>
  .modal-window{
  display: none;
  position: fixed;
  z-index: 2;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  text-align: center;
  background: rgba(0,0,0,0.5);
}

.modal-window .iframe{
  position: absolute;
  z-index: 3;
  margin: auto;
  cursor: crosshair;
  width: 100%;
  height: 100%;
}

.show-popup{
  display: block;
}

canvas{
display: block;
text-align: center;
}
.iframe h1 {
  position: absolute;
  color: #fff;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-family: "Source Sans Pro";
  font-size: 75px;
  font-weight: 1000;
  -webkit-user-select: none;
  user-select: none;
}

.iframe h6 {
  position: absolute;
  top: 60%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: #fff;
  font-family: 'Chango', cursive;
  font-size: 75px;
  font-weight: 900;
  -webkit-user-select: none;
  user-select: none;
}

.iframe a{
  position: absolute;
  top: 70%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: #fff;
  outline: none;
  text-decoration: none;
  font-family: "Source Sans Pro";
  font-size: 35px;
  font-weight: 900;
  -webkit-user-select: none;
  user-select: none;
}

@media (max-width: 600px) {
  .iframe h1 {
  	font-size: 2em;
  	font-weight: 500;
}

.iframe h6 {
  top: 65%;
  font-size: 2em;
  font-weight: 900;
}

.iframe a{
  top: 73%;
  font-size: 1.5em;
  font-weight: 900;
}

}

@media (max-width: 1500px) {
  .iframe h1 {
  	font-size: 2.5em;
  	font-weight: 500;
}

.iframe h6 {
  font-size: 2.5em;
  font-weight: 900;
}

.iframe a{
  font-size: 2em;
  font-weight: 900;
}

}

</style>
@stop

@section('content')

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/data.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
<script src="https://code.highcharts.com/stock/modules/export-data.js"></script>
		
        
<main>
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
  </div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
  <hr class="p-3 mb-5">
    <div class="row featurette shadow p-3 mb-5">
      <div class="col-md-12">
        <h2 class="featurette-heading @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif">Campagne de mesure </h2>
        <p class="@if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif"> Adresse de la campagne : {{ $campagne->adresseCampagne }} </p>
        <p class="@if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif"> Ville de la campagne : {{ $campagne->ville }} </p>
        <p class="@if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif"> Code postal de la campagne : {{ $campagne->codePostal }} </p>
       	<p class="@if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif"> Statut de la campagne : @if($campagne->statut == "en cours") <span style="color : green;"> {{ $campagne->statut }} @else <span style="color : red;"> {{ $campagne->statut }} @endif</p>
		<p class="@if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif"> Date début de la campagne : {{ $campagne->DébutCampagne }} </p> 
		<p class="@if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif"> Limitation vitesse : {{ $campagne->limitationvitesse }} </p>
      </div>
			  <div class="row">
			  	<div class="col-lg-6">
					<a class="w-100" href="{{ asset('csv/resultcmesure.csv')}}"> <button type="button" class="w-100 btn btn-sm btn-outline-secondary"> Télécharger le CSV </button> </a>
			  	</div>
			  	<div class="col-lg-6">
					@include('Client/popup_highscore')
				</div>
			</div>
	</div>

    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif">

	@foreach($stat as $stats)
	@if($stats->campagneId == $campagne->id)
    <div class="row featurette shadow p-3 mb-5">
      <div class="col-md-6">
        <h2 class="featurette-heading @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif">Type de la mesure {{ $stats->typeV }} 
        @if($stats->typeV == "camion")
		<i class='fas fa-truck' width="40" height="40" fill="currentColor"></i>
		@else
		<i class='fas fa-car-side' width="40" height="40" fill="currentColor"></i>
		@endif
		</h2>
        <br>
        <p class="@if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif"> Date stat : @if(!empty($stats->created_at)) {{ $stats->created_at }} @endif </p>
        <nav class="navbar navbar-dark bg-dark" aria-label="First navbar example">
    	<div class="container-fluid">
      	<h2 class="navbar-brand @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif">Détails :</h2>
      	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample{{$stats->id}}" aria-controls="navbarsExample{{$stats->id}}" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      	</button>

		</div>
		</nav>
        <br>
        <div class="collapse navbar-collapse" id="navbarsExample{{$stats->id}}">
        <div class="row">
	        <div class="col-lg-4" >
		       <img src="@if($campagne->limitationvitesse == 30) {{ asset('image/limite30.png') }} @elseif($campagne->limitationvitesse == 50) {{ asset('image/limite50.png') }} @elseif($campagne->limitationvitesse == 70) {{ asset('image/limite70.png') }} @elseif($campagne->limitationvitesse == 80) {{ asset('image/limite80.png') }} @elseif($campagne->limitationvitesse == 90) {{ asset('image/limite90.png') }} @elseif($campagne->limitationvitesse == 110) {{ asset('image/limite110.png') }} @elseif($campagne->limitationvitesse == 130) {{ asset('image/limite130.png') }} @endif" 	  
			   		class="bd-placeholder-img rounded-circle" style="display: block; margin-left: auto; margin-right: auto;" width="100" height="100" xmlns="" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
		        	<h2 class=" text-center featurette-heading @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif" style="font-size: 1em;"> Limité à {{ $campagne->limitationvitesse }} km/h </h2>
					<hr>
			</div>
	      	<div class="col-lg-4 center" >
		        <svg class="bd-placeholder-img rounded-circle center" style="display: block; margin-left: auto; margin-right: auto;" width="100" height="100" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Nombre de véhicule</title><rect width="100%" height="100%" fill="#777"/>
		        <text x="50%" y="40%" dy=".3em">{{ $stats->NbVehicule }}</text>
		        <text x="50%" y="60%" dy=".3em">véhicules</text></svg>
		        	<h2 class=" text-center @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif" style="font-size: 1em;">Nombre de véhicules</h2>
	      			<hr>
			  </div>
	      	<div class="col-lg-4" >
		        <svg class="bd-placeholder-img rounded-circle" style="display: block; margin-left: auto; margin-right: auto;" width="100" height="100" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Vitesse moyenne</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="40%" dy=".3em">{{ $stats->VitMoyenne }}</text>
		        <text x="50%" y="60%" dy=".3em"> km/h </text></svg>
		        	<h2 class=" text-center @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif" style="font-size: 1em;">Vitesse moyenne</h2>
	      			<hr>
			  </div>
	      	<div class="col-lg-4">
		        <svg class="bd-placeholder-img rounded-circle" style="display: block; margin-left: auto; margin-right: auto;" width="100" height="100" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>vitesse égale ou inférieur </title><rect width="100%" height="100%" fill="#777"/>
				<text x="50%" y="40%" dy=".3em">{{ $stats->VitesseInferieureOuEgale }}</text>
		        <text x="50%" y="60%" dy=".3em">véhicules</text></svg>
		        	<h2 class=" text-center @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif" style="font-size: 1em;">Véhicules</h2>
					<h2 class=" text-center @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif" style="font-size: 1em;">< ou = à {{ $campagne->limitationvitesse }} km/h</h2>
			  </div>
	      	<div class="col-lg-4">
		        <svg class="bd-placeholder-img rounded-circle"  style="display: block; margin-left: auto; margin-right: auto;" width="100" height="100" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>vitesse inférieur à 20 km/h</title><rect width="100%" height="100%" fill="#777"/>
				<text x="50%" y="40%" dy=".3em">{{ $stats->VitesseLimitMoins20 }}</text>
		        <text x="50%" y="60%" dy=".3em">véhicules</text></svg>
				<h2 class=" text-center @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif" style="font-size: 1em;">Véhicules</h2>
					<h2 class=" text-center @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif" style="font-size: 1em;"> < à {{ $campagne->limitationvitesse - 20 }} km/h</h2>
	      	</div>
			 <div class="col-lg-4">
			        <svg class="bd-placeholder-img rounded-circle" style="display: block; margin-left: auto; margin-right: auto;" width="100" height="100" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>vitesse supérieur à 20 km/h</title><rect width="100%" height="100%" fill="#777"/>
					<text x="50%" y="40%" dy=".3em">{{ $stats->VitesseLimitPlus20 }}</text>
		        	<text x="50%" y="60%" dy=".3em">véhicules</text></svg>
					<h2 class=" text-center @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif" style="font-size: 1em;">Véhicules</h2>
					<h2 class=" text-center @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif" style="font-size: 1em;"> > à {{ $campagne->limitationvitesse + 20 }} km/h</h2>
		     </div>
	        <div class="col-lg-4">
		        <svg class="bd-placeholder-img rounded-circle" style="display: block; margin-left: auto; margin-right: auto;" width="100" height="100" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>vitesse supérieur à 30 km/h</title><rect width="100%" height="100%" fill="#777"/>
				<text x="50%" y="40%" dy=".3em">{{ $stats->VitesseLimitPlus30 }}</text>
		        <text x="50%" y="60%" dy=".3em">véhicules</text></svg>
				<h2 class=" text-center @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif" style="font-size: 1em;">Véhicules</h2>
					<h2 class=" text-center @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif" style="font-size: 1em;"> > à <b> {{ $campagne->limitationvitesse + 30 }} </b> km/h</h2>
	      	</div><!-- /.col-lg-4 -->
	      	<div class="col-lg-4">
		        <svg class="bd-placeholder-img rounded-circle" style="display: block; margin-left: auto; margin-right: auto;" width="100" height="100" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>vitesse inférieur à 40 km/h</title><rect width="100%" height="100%" fill="#777"/>
				<text x="50%" y="40%" dy=".3em">{{ $stats->VitesseLimitPlus40 }}</text>
		        <text x="50%" y="60%" dy=".3em">véhicules</text></svg>
				<h2 class=" text-center @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif" style="font-size: 1em;">Véhicules</h2>
					<h2 class=" text-center @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif" style="font-size: 1em;"> > à {{ $campagne->limitationvitesse + 40 }} km/h</h2>
	      	</div>
	      	<div class="col-lg-4">
		        <svg class="bd-placeholder-img rounded-circle" style="display: block; margin-left: auto; margin-right: auto;" width="100" height="100" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>vitesse supérieur à 50 km/h</title><rect width="100%" height="100%" fill="#777"/>
				<text x="50%" y="40%" dy=".3em">{{ $stats->VitesseLimitPlus50 }}</text>
		        <text x="50%" y="60%" dy=".3em">véhicules</text></svg>
				<h2 class=" text-center @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif" style="font-size: 1em;">Véhicules</h2>
					<h2 class=" text-center @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif" style="font-size: 1em;"> > à {{ $campagne->limitationvitesse + 50 }} km/h</h2>
	      	</div>
	 	</div>
	 	</div>
      </div>
      <div class="col-md-6">
      <div class="collapse navbar-collapse" id="navbarsExample{{$stats->id}}">
      	<hr class="featurette-divider">
		  <div class="row">
		  <br>
		  	<div class="col-lg-4" style="width: 100%;">
			  <img src="@if($campagne->limitationvitesse == 30) {{ asset('image/limite30.png') }} @elseif($campagne->limitationvitesse == 50) {{ asset('image/limite50.png') }} @elseif($campagne->limitationvitesse == 70) {{ asset('image/limite70.png') }} @elseif($campagne->limitationvitesse == 80) {{ asset('image/limite80.png') }} @elseif($campagne->limitationvitesse == 90) {{ asset('image/limite90.png') }} @elseif($campagne->limitationvitesse == 110) {{ asset('image/limite110.png') }} @elseif($campagne->limitationvitesse == 130) {{ asset('image/limite130.png') }} @endif" 	  
			   		class="bd-placeholder-img rounded-circle" style="display: block; margin-left: auto; margin-right: auto;" width="100" height="100" xmlns="" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
					<br>
					<h2 class=" text-center featurette-heading @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif" style="font-size: 1em;"> Limité à {{ $campagne->limitationvitesse }} km/h </h2>
					<br>
	      	</div>
			<hr  class="featurette-divider @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif">
			<hr>
		</div>
		<div class="row" style="text-align: center;">
			<div class="col-lg-4" style="width: 70%;">
			<h2 class=" @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif" style="font-size: 1em;"> Nombre de véhicule qui sont passés : </h2>
			</div>
			<div class="col-lg-4" style="width: 30%;">
			<h2 class=" @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif" style="font-size: 1em;"> {{ $stats->NbVehicule }}  @if($stats->typeV == "camion")<i class='fas fa-truck' width="40" height="40" fill="currentColor"></i> @else <i class='fas fa-car-side' width="40" height="40" fill="currentColor"></i>@endif</h2>
			</div>
			<hr>
			<div class="col-lg-4" style="width: 70%;">
			<h2 class=" @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif" style="font-size: 1em;"> La vitesse Moyenne des véhicules : </h2>
			</div>
			<div class="col-lg-4" style="width: 30%;">
			<h2 class=" @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif" style="font-size: 1em;"> {{ $stats->VitMoyenne }} km/h </h2>
			</div>
			<hr>
			<div class="col-lg-4" style="width: 70%;">
			<h2 class=" @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif" style="font-size: 1em;"> Vitesse Maximale </h2>
			</div>
			<div class="col-lg-4" style="width: 30%;">
			<h2 class=" @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif" style="font-size: 1em;"> {{ $stats->VitMax }} km/h </h2>
			</div>
			<hr>
			<div class="col-lg-4" style="width: 70%;">
			<h2 class=" @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif" style="font-size: 1em;"> Nombre d'essieux </h2>
			</div>
			<div class="col-lg-4" style="width: 30%;">
			<h2 class=" @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif" style="font-size: 1em;"> {{ $stats->NbEssieux }} km/h </h2>
			</div>
			<hr>
			<div class="col-lg-4" style="width: 70%;">
			<h2 class=" @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif" style="font-size: 1em;"> Nombre de véhicules inférieure ou égale à {{$campagne->limitationvitesse}} km/h : </h2>
			</div>
			<div class="col-lg-4" style="width: 30%;">
			<h2 class=" @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif" style="font-size: 1em;"> {{ $stats->VitesseInferieureOuEgale }} @if($stats->typeV == "camion")<i class='fas fa-truck' width="40" height="40" fill="currentColor"></i> @else <i class='fas fa-car-side' width="40" height="40" fill="currentColor"></i>@endif </h2>
			</div>
			<hr>
			<div class="col-lg-4" style="width: 70%;">
			<h2 class=" @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif" style="font-size: 1em;"> Nombre de véhicules inférieure à {{$campagne->limitationvitesse - 20 }} km/h : </h2>
			</div>
			<div class="col-lg-4" style="width: 30%;">
			<h2 class=" @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif" style="font-size: 1em;"> {{ $stats->VitesseLimitMoins20 }} @if($stats->typeV == "camion")<i class='fas fa-truck' width="40" height="40" fill="currentColor"></i> @else <i class='fas fa-car-side' width="40" height="40" fill="currentColor"></i>@endif</h2>
			</div>
			<hr>
			<div class="col-lg-4" style="width: 70%;">
			<h2 class=" @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif" style="font-size: 1em;"> Nombre de véhicules supérieur à {{$campagne->limitationvitesse + 20 }} km/h : </h2>
			</div>
			<div class="col-lg-4" style="width: 30%;">
			<h2 class=" @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif" style="font-size: 1em;"> {{ $stats->VitesseLimitPlus20 }} @if($stats->typeV == "camion")<i class='fas fa-truck' width="40" height="40" fill="currentColor"></i> @else <i class='fas fa-car-side' width="40" height="40" fill="currentColor"></i>@endif</h2>
			</div>
			<hr>
			<div class="col-lg-4" style="width: 70%;">
			<h2 class=" @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif" style="font-size: 1em;"> Nombre de véhicules supérieur à {{$campagne->limitationvitesse + 30 }} km/h : </h2>
			</div>
			<div class="col-lg-4" style="width: 30%;">
			<h2 class=" @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif" style="font-size: 1em;"> {{ $stats->VitesseLimitPlus30 }} @if($stats->typeV == "camion")<i class='fas fa-truck' width="40" height="40" fill="currentColor"></i> @else <i class='fas fa-car-side' width="40" height="40" fill="currentColor"></i>@endif</h2>
			</div>
			<hr>
			<div class="col-lg-4" style="width: 70%;">
			<h2 class=" @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif" style="font-size: 1em;"> Nombre de véhicules supérieur à {{$campagne->limitationvitesse + 40 }} km/h : </h2>
			</div>
			<div class="col-lg-4" style="width: 30%;">
			<h2 class=" @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif" style="font-size: 1em;"> {{ $stats->VitesseLimitPlus40 }} @if($stats->typeV == "camion")<i class='fas fa-truck' width="40" height="40" fill="currentColor"></i> @else <i class='fas fa-car-side' width="40" height="40" fill="currentColor"></i>@endif</h2>
			</div>
			<hr>
			<div class="col-lg-4" style="width: 70%;">
			<h2 class=" @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif" style="font-size: 1em;"> Nombre de véhicules supérieur à {{$campagne->limitationvitesse + 50 }} km/h : </h2>
			</div>
			<div class="col-lg-4" style="width: 30%;">
			<h2 class=" @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif" style="font-size: 1em;"> {{ $stats->VitesseLimitPlus50 }} @if($stats->typeV == "camion")<i class='fas fa-truck' width="40" height="40" fill="currentColor"></i> @else <i class='fas fa-car-side' width="40" height="40" fill="currentColor"></i>@endif</h2>
			</div>
			<br><br>
			<hr class="featurette-divider @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif">
			
	  	</div>
		  <hr class="featurette-divider @if(Auth::user()->preference == 'theme_dark') tx-black @else tx-white @endif">
      </div>
	</div>
	</div>
    <hr class="featurette-divider @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif">
@endif
@endforeach

    <hr class="featurette-divider">

	
    <div class="row featurette shadow p-3 mb-5">
      <div class="col-md-13">
        <h2 class="featurette-heading @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif">Googles Maps</h2>
        <br>
        <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q={{$campagne->adresseCampagne}}{{$campagne->ville}}{{$campagne->codePostal}}&t=&z=9&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div></div>
              </div>
    </div>
	
	<hr class="featurette-divider">

	@include('Client/graphiques_camion')
	@include('Client/graphiques_voiture')

    @include('layouts.partials.footer') 



</div>

</main>

@stop

@section('script')

  <script src="{{ asset('/js/form-validation.js')}}"></script>

@stop