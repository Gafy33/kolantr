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
       	<p class="@if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif"> Statut de la campagne : @if($campagne->statut == "en cours") <span style="color : green;"> {{ $campagne->statut }} </span> @else <span style="color : red;"> {{ $campagne->statut }} </span> @endif</p>
		<p class="@if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif"> Date début de la campagne : {{ $campagne->DébutCampagne }} </p> 
		<p class="@if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif"> Limitation vitesse : {{ $campagne->limitationvitesse }} </p>
      </div>
	</div>
    
    <hr class="featurette-divider @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif"> 
    <!-- START THE FEATURETTES -->

    <div class="row featurette shadow p-3 mb-5">
      <div class="col-md-13">
        <h2 class="featurette-heading @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif">Pas de données</h2>
    </div>
    </div>

    <hr class="featurette-divider @if(Auth::user()->preference == 'theme_dark') tx-white @else tx-black @endif">

    @include('layouts.partials.footer')



</div>

</main>