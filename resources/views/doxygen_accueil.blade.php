<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta name="viewport" content="width=device-width; initial-scale=1.0">
        <meta charset="UTF-8">
        <title> Doxygen </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

    <link href="{{ asset('/bootstrap/style_accueil.css')}}" rel="stylesheet">
    <link href="{{ asset('/bootstrap/css_animation_route.css')}}" rel="stylesheet">

    </head>
<body>

<header>
            <a href="{{ route('accueil') }}" class="logo" style="color: #111">KOLANTR</a>
            <div class="toggle" onclick="toggleMenu();"></div>
</header>

        <!-- Information -->
        <section class="services" id="information" style="background: white;">
            <div class="heading white" >
                <h2>Doxygen</h2>
            </div>
            <div class="content">
                <div class="servicesBx">
                    <img src="{{ asset('image/icon1.png')}}">
                    <h2>Dossier</h2>
                    <div class="content">
                        <div class="infoBx">
                            <h2> Doxygen </h2>
                            <h2> Arthur LABARRE </h2>
                            <button type="button" class="btn" name=""> <a href="{{ asset('doxygen/doxygen_xavier/index.html')}}" class="lien" target="_blank">Accéder</a> </button>
                        </div>
                    </div>
                </div>
                <div class="servicesBx">
                    <img src="{{ asset('image/icon1.png')}}">
                    <h2>Dossier</h2>
                    <div class="content">
                        <div class="infoBx">
                            <h2> Doxygen </h2>
                            <h2> Xavier HERVIER </h2>
                            <button type="button" class="btn" name=""> <a href="{{ asset('doxygen/doxygen_arthur/index.html')}}" class="lien" target="_blank">Accéder</a> </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>


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