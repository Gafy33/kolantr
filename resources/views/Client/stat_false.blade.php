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
        <h2 class="featurette-heading tx-black">Campagne de mesure </h2>
        <p class="tx-black">> Adresse de la campagne : {{ $campagne->adresseCampagne }} </p>
        <p class="tx-black">> Ville de la campagne : {{ $campagne->ville }} </p>
        <p class="tx-black">> Code postal de la campagne : {{ $campagne->codePostal }} </p>
       	<p class="tx-black">> Statut de la campagne : @if($campagne->statut == "en cours") <span style="color : green;"> {{ $campagne->statut }} </span> @else <span style="color : red;"> {{ $campagne->statut }} </span> @endif</p>
		<p class="tx-black"> Date début de la campagne : {{ $campagne->DébutCampagne }} </p> 
		<p class="tx-black"> Limitation vitesse : {{ $campagne->limitationvitesse }} </p>
      </div>
	</div>
    
    <hr class="featurette-divider tx-black">
    <!-- START THE FEATURETTES -->

    <div class="row featurette shadow p-3 mb-5">
      <div class="col-md-13">
        <h2 class="featurette-heading tx-black">Pas de données</h2>
    </div>
    </div>

    <hr class="featurette-divider tx-black">

    @include('layouts.partials.footer')



</div>

</main>