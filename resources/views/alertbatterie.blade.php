<div id="popup1" class="overlay">
	<div class="popup">
		<h2>Batterie Faible</h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
			Les batteries citées en dessous sont bientôt vides !
            <br>
            @if(!empty($alarme))
                @foreach($alarme as $alarmes)
                    @if(!empty($alarmes->alarmeBatterie))
                        <span style="color: red"> - {{$alarmes->adrSigfox}} </span> <br>
                    @endif
                @endforeach
            @endif
		</div>
	</div>
</div>