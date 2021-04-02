<div id="popup2" class="overlay">
	<div class="popup">
		<h2>Demandes : </h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
			Les demandes suivantes sont à traiter ( voir boite mail )
            <br>
                @foreach($demande as $demandes)
                        <span style="color: red"> - {{$demandes->email}} </span> <a href="{{ route('valid_demande', ['id' => $demandes->id ])}}"> Valider </a> <br>
                @endforeach
		</div>
	</div>
</div>