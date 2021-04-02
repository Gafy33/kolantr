<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body style="background: #e5e5e5; padding: 30px;" >


@if(!empty($data['identifiant']))
<div style="max-width: 500px; margin: 0 auto; padding: 20px; background: #fff;">
    <h3>Bonjour {{ $data['name']}} {{ $data['prenom']}} </h3>

	<h3>Suite à votre demande de campagne de mesure sur Kolantr, nous avons créer votre compte </h3>
    <br>
    <h6> Vous pouvez vous connecter sur le site <a href="#"> kolantr </a> avec ces identifiants : 
    <hr>
    <h6> identifiant : {{ $data['identifiant']}} </h6>
    <h6> Mot de passe : {{ $data['password']}}</h6>
	<br><br><br>
    <h6 style="color :red"> Rappel: Veuillez sauvegarder votre identifiant ou mot de passe dans un endroit sécurisé et ne pas donner vos identifiants à autrui ! </h6>
    <br><br>
    <h6> Support : kolantr2021snir@gmail.com </h6>
</div>
@elseif(!empty($data['address_campagne']))
<div style="max-width: 500px; margin: 0 auto; padding: 20px; background: #fff;">
    <h3>Demande Création Compte </h3>
    
    <h6> prénom : {{ $data['name']}} </h6>
    <h6> nom : {{ $data['prenom']}} </h6>
	<h6> adresse mail : {{ $data['email']}}</h6>
    <br>

    <h6> Adresse campagne : {{ $data['address_campagne']}}</h6>
    <h6> région campagne : {{ $data['region_campagne']}}</h6>
    <h6> Ville campagne : {{ $data['ville_campagne']}}</h6>
    <h6> Code postal campagne : {{ $data['codePostal_campagne']}}</h6>
    <h6> Route : {{ $data['route_campagne']}} </h6>
    <br><br>
    <h6> Support : kolantr2021snir@gmail.com </h6>
</div>



@else
<div style="max-width: 500px; margin: 0 auto; padding: 20px; background: #fff;">
	<h3>Batterie Faible :</h3>
	<div>{{ $data }}</div>
</div>
@endif

</body>
</html>