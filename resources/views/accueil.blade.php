<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta name="viewport" content="width=device-width; initial-scale=1.0">
        <meta charset="UTF-8">
        <title> Accueil </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

    <link href="{{ asset('/bootstrap/style_accueil.css')}}" rel="stylesheet">
    <link href="{{ asset('/bootstrap/css_animation_route.css')}}" rel="stylesheet">

    </head>
<body>

<header>
            <a href="{{ route('accueil') }}" class="logo">KOLANTR</a>
            <div class="toggle" onclick="toggleMenu();"></div>
            <ul class="menu">
              @guest
                <li><a href="#Liste" onclick="toggleMenu();" class="login"><i class="fa fa-user" aria-hidden="true"></i></a></li>
              @endguest

              @auth
              @if (Auth::user()->hasRole('admin') or Auth::user()->hasRole('technicien') )

                @if (Auth::user()->hasRole('admin'))
                <li><a href="{{ route('listeClient_path') }}" onclick="toggleMenu();">Client</a></li>
                @endif

                <li><a href="{{ route('listeCampagneMesure_path') }}" onclick="toggleMenu();">Campagne de mesure</a></li>
                <li><a href="{{ route('listeBoitier_path') }}" onclick="toggleMenu();">Boitier</a></li>
                <li><a href="#information" onclick="toggleMenu();">Information</a></li>
                <li><a href="#compte" onclick="toggleMenu();">Compte</a></li>
                <li><a href="#Application" onclick="toggleMenu();">Application</a></li>
                <li><a href="{{ route('liste') }}" onclick="toggleMenu();">Liste</a></li>
                <!--<li><a href="" onclick="toggleMenu();" class="login"><i class="fa fa-user" aria-hidden="true"></i></a></li>-->

              @elseif(Auth::user()->hasRole('user'))
                <li><a href="{{ route('clientmescampagnes_path') }}">Mes campagnes de mesures</a></li>
                <li><a href="#information" onclick="toggleMenu();">Information</a></li>
                <li><a href="#compte" onclick="toggleMenu();">Compte</a></li>
                <li><a href="#contact" onclick="toggleMenu();">Contact</a></li>
              @endif

              <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="logout"><i class="fas fa-power-off"></i></a><form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                      </form> </li>
              @endauth
            </ul>
</header>

@if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('technicien'))
<section class="banner" id="home">
            <div class="textBx">
                @if(Auth::user()->identifiant == "a/t22kumo1etci8410")
                    <h2> N'oublie pas de montrer le <span>DOXYGEN</span></h2>
                @else
                    <h2 >Bienvenue sur <br><span>KOLANTR</span></h2>
                @endif
                <!--<h3>Développeur Web Front end.</h3>-->
                <a href="#client" class="btn"> C'est parti </a>
            </div>
</section>


        @if(Auth::user()->hasRole('admin'))
        <section class="about" id="client">
            <div class="heading" >
                <h2> Client </h2>
            </div>
            <div class="content">
                <div class="contentBx w50 center" >
                    <h3> Gérer les comptes clients </h3>
                    <p> Créer, Modifier, Supprimer </p>
                    <div class="downloadBx">
                        <a href="{{ route('listeClient_path') }}" class="lien"><button type="button" class="btn" name="">Accéder</button></a>
                    </div>
                </div>
                <div class="w50 center_content">
                    <img src="{{ asset('image/image1.jpg')}}" class="img img_display_600">
                </div>
            </div>
        </section>

        <section class="about background_gray" style="background:#f7f7f7">
            <div class="heading" >
                <h2> Administrateur et technicien </h2>
            </div>
            <div class="content">
                <div class="w50 center_content" >
                    <img src="{{ asset('image/image1.jpg')}}" class="img img_display_600">
                </div>
                <div class="contentBx w50 center" >
                    <h3> Gérer les comptes clients Administrateur et technicien</h3>
                    <p> Créer, Modifier, Supprimer </p>
                    <div class="downloadBx">
                        <a href="{{ route('listeAdminTechnicien_path')}}" class="lien"><button type="button" class="btn" name=""> Accéder </button></a>
                    </div>
                </div>
            </div>
        </section>
        @endif


        <section class="about" id="campagne">
            <div class="heading" >
                <h2> Campagne de mesure </h2>
            </div>
            <div class="content">
                <div class="contentBx w50 center">
                    <h3> Gérer les campagnes de mesure </h3>
                    <p> Créer, Modifier, Supprimer </p>
                    <div class="downloadBx">
                         <a href="{{ route('listeCampagneMesure_path') }}" class="lien"><button type="button" class="btn" name="">Accéder </button></a>
                    </div>
                </div>
                <div class="w50 center_content" >
                    <img src="{{ asset('image/image2.jpg')}}" class="img img_display_600">
                </div>
            </div>
        </section>


        <section class="about background_gray" id="boitier" style="background:#f7f7f7">
            <div class="heading" >
                <h2> Boitier </h2>
            </div>
            <div class="content">
                <div class="w50 center_content">
                    <img src="{{ asset('image/image3.png')}}" class="img img_display_600">
                </div>
                <div class="contentBx w50 center" >
                    <h3> Gérer les boitiers </h3>
                    <p> Créer, Modifier, Supprimer </p>
                    <div class="downloadBx">
                        <a href="{{ route('listeBoitier_path') }}" class="lien"><button type="button" class="btn" name=""> Accéder </button></a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Information -->
        <section class="services" id="information" >
            <div class="heading white" >
                <h2>Information</h2>
                <p> ... </p>
            </div>
            <div class="content">
                <div class="servicesBx">
                    <img src="{{ asset('image/icon1.png')}}">
                    <h2>Clients</h2>
                    <div class="content">
                        <div class="infoBx">
                            <h2> {{ $nb_compte }} </h2>
                            <h2> {{ $nb_admin }} </h2>
                            <h2> {{ $nb_technicien }} </h2>
                            <h2> {{ $nb_client }} </h2>
                        </div>
                        <div class="infoBx">
                            <p> Compte Crées </p>
                            <p> Administrateur </p>
                            <p> Technicien </p>
                            <p> Client </p>
                        </div>
                    </div>
                </div>
                <div class="servicesBx">
                    <img src="{{ asset('image/icon2.png')}}">
                    <h2>Campagnes de mesure</h2>
                    <div class="content">
                        <div class="infoBx">
                            <h2> {{ $nb_campagne }} </h2>
                            <h2> {{ $camp_cours }} </h2>
                            <h2> {{ $camp_fini }} </h2>
                        </div>
                        <div class="infoBx">
                            <p> Campagne </p>
                            <p> En cours </p>
                            <p> Fini </p>
                        </div>
                    </div>
                </div>
                <div class="servicesBx" >
                    <img src="{{ asset('image/icon3.png')}}">
                    <h2>Boitiers</h2>
                    <div class="content">
                        <div class="infoBx">
                            <h2> {{ $nb_boitier }} </h2>
                            <h2> {{ $boiter_utiliser }} </h2>
                            <h2> {{ $boitier_repos }} </h2>
                        </div>
                        <div class="infoBx">
                            <p> Boitier </p>
                            <p> En utilisation </p>
                            <p> En pause </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Compte -->
        <section class="testimonial" id="compte">
            <div class="heading">
                <h2>Compte</h2>
                <p>Retrouver vos informations de compte</p>
            </div>
            <div class="content" >
                <div class="testimonialBx">
                    <p > Nom : <span> {{ Auth::user()->name }} </span></p>
                    <p > Prénom : <span> {{ Auth::user()->prenom }} </span></p>
                    <p > Identifiant : <span> {{ Auth::user()->identifiant }} </span></p>
                    <p > Adresse Mail : <span>{{ Auth::user()->email }} </span></p>
                </div>
            </div>
        </section>


        <!-- Application -->
         <section class="about" id="Application">
            <div class="content">
                <div class="contentBx w50 center">
                    <h3> Application </h3>
                    <h2> Télécharger l'application Kolantr config simulation </h2>
                    <p> Développé par Arthur Labarre </p>

                    <div class="downloadBx">
                        <button type="button" class="btn" name=""> <a href="{{ asset('application_simulation_kolantr/install_application_config_simulation.exe')}}" download class="lien"> Télécharger </a></button>
                    </div>

                    <div class="container">
                        <div class="infinite">
                            <div class="shadow"></div>
                        </div>
                        <div class="box_route">
                            <div class="square"> <img src="{{ asset('image/voiture.png')}}" class="inverse"> </div>
                        </div>
                    </div>
                </div>
                <div class="w50 center_content">
                    <img src="{{ asset('image/logo_window.png')}}" class="img img_display_600 img_display_991">
                </div>
            </div>
        </section>

         @include('layouts.partials.footer')

@else
  <section class="banner" id="home">
            <div class="textBx">
                <h2 >Bienvenue sur <br><span>KOLANTR</span></h2>
                <!--<h3>Développeur Web Front end.</h3>-->
                <a href="#client" class="btn"> C'est parti </a>
            </div>
        </section>

        <section class="about" id="client">
            <div class="heading" >
                <h2> Mes Campagnes de mesures </h2>
            </div>
            <div class="content">
                <div class="contentBx w50 center" >
                    <h3> Visualiser mes campagnes de mesure </h3>
                    <p> Regarder, étudier, télécharger </p>
                    <div class="downloadBx">
                        <button type="button" class="btn" name=""> <a href="{{ route('clientmescampagnes_path') }}" class="lien">Accéder </a></button>
                    </div>
                </div>
                <div class="w50 center_content" >
                    <img src="{{ asset('image/image2.jpg')}}" class="img img_display_600">
                </div>
            </div>
        </section>

        <!-- Information -->
        <section class="services" id="information" >
            <div class="heading white">
                <h2>Information</h2>
                <p> ... </p>
            </div>
            <div class="content">
                <div class="servicesBx">
                    <img src="{{ asset('image/icon1.png')}}">
                    <h2>Mes campagnes de mesure</h2>
                    <div class="content">
                        <div class="infoBx">
                            <h2> {{ $nb_campagne }} </h2>
                            <h2> {{ $nb_camp_cours }} </h2>
                            <h2> {{ $nb_camp_fini }} </h2>
                        </div>
                        <div class="infoBx">
                            <p> Mes campagnes </p>
                            <p> En cours </p>
                            <p> Fini </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Compte -->
        <section class="testimonial" id="compte">
            <div class="heading">
                <h2>Compte</h2>
                <p>Retrouver vos informations de compte</p>
            </div>
            <div class="content">
                <div class="testimonialBx">
                    <p> Nom : <span> {{ Auth::user()->name }} </span></p>
                    <p> Prénom : <span> {{ Auth::user()->prenom }} </span></p>
                    <p> Identifiant : <span>{{ Auth::user()->identifiant }}</span></p>
                    <p> Adresse Mail :<span> {{ Auth::user()->email }}</span></p>
                    <p> Numéro téléphone : <span>{{ Auth::user()->numeroTel }}</span></p>
                    <p> Adresse : <span>{{ Auth::user()->adresseClient }}</span></p>
                    <p> Code Postal : <span>{{ Auth::user()->codePostal }}</span></p>
                    <p> Région : <span>{{ Auth::user()->region }}</span></p>
                    <p> Ville : <span>{{ Auth::user()->ville }}</span></p>
                </div>
            </div>
        </section>


        <section class="contact" id="contact">
            <div class="heading white">
                <h2>Contact</h2>
            </div>
            <div class="content">
                <div class="contactInfo">
                    <h3>Contact Info</h3>
                    <div class="ContactInfoBx">
                        <div class="box">
                            <div class="icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="text">
                                <h3>Adresse</h3>
                                <p>14 Avenue de l'Université<br>Talence<br>33400 </p>
                            </div>
                        </div>
                        <div class="box">
                            <div class="icon">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                            <div class="text">
                                <h3>Email</h3>
                                <p>kolantr2021snir@gmail.com</p>
                            </div>
                        </div>
                        <div class="box">
                            <div class="icon">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                            <div class="text">
                                <h3>Site Web du lycée</h3>
                                <p><a href="http://www.lyceekastler.fr">http://www.lyceekastler.fr</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="formBx">
                    <form>
                        <h3>Contactez nous ( en construction )</h3>
                        <input type="text" name="" placeholder="Prénom" disabled>
                        <input type="email" name="" placeholder="Email" disabled>
                        <textarea placeholder="Votre Messsage" disabled></textarea>
                        <input type="submit" value="Envoyer" disabled>
                    </form>
                </div>
            </div>
        </section>

        @include('layouts.partials.footer')
@endif

<script>
            window.addEventListener('scroll', function(){
                var header = document.querySelector('header');
                header.classList.toggle('sticky', window.scrollY > 0);
            });

            function toggleMenu(){
                var menuToggle = document.querySelector('.toggle');
                var menu = document.querySelector('.menu');
                menuToggle.classList.toggle('active');
                menu.classList.toggle('active');
            }
        </script>

    </body>
</html>