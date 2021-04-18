  <header>
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-violet" aria-label="Eighth navbar example">
      <div class="container">
        <a class="navbar-brand" href="{{ route('login') }}">KOLANTR</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        @guest
          <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item active">
              </li>
            </ul>
            <ul class="navbar-nav me_auto mb-2 mb-lg-0">
              <button class="btn btn-outline-success" type="submit" name="ville"> <a class="nav-linkArmand" href="#" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">Compte</a>
              </button>
            </ul>
          </div>

        @endguest

        @auth
          @if (Auth::user()->hasRole('admin') or Auth::user()->hasRole('technicien') )

            <div class="collapse navbar-collapse" id="navbarsExample07">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">

              <li class="nav-item dropdown">  
                <a class="nav-linkArmand" href="{{ route('accueil') }}" aria-expanded="false" style="color: white; border-right: 1px solid">Accueil</a>
              </li>

                @if (Auth::user()->hasRole('admin'))
                <li class="nav-item dropdown">  
                  <a class="nav-linkArmand" href="{{ route('listeClient_path') }}" id="dropdown03" style="color: white;"> Gestion Compte Client
                  </a>
                </li>
                @endif

                <li class="nav-item dropdown">  
                  <a class="nav-linkArmand" href="{{ route('listeCampagneMesure_path') }}" id="dropdown03" style="color: white;"> Gestion Campagne Mesure
                  </a>
                </li>

                <li class="nav-item dropdown">  
                  <a class="nav-linkArmand" href="{{ route('listeBoitier_path') }}" id="dropdown03" style="color: white;"> Gestion Boitier
                  </a>
                </li>

                <li class="nav-item dropdown">  
                  <a class="nav-linkArmand" href="{{ route('liste') }}" id="dropdown03" style="color: white;"> Liste
                  </a>
                </li>
              </ul>
              <!--
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#"></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#"></a>
                </li>
              </ul>-->

          @elseif(Auth::user()->hasRole('user'))

            <div class="collapse navbar-collapse" id="navbarsExample07">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item active">
                <a class="nav-link" aria-current="page" href="{{ route('clientmescampagnes_path') }}">Mes campagnes de mesure</a>
                </li>
              </ul>

          @endif
              @if(Auth::user()->hasRole('admin') or Auth::user()->hasRole('technicien'))

                @if(!empty($alarme_popup))
                <ul class="navbar-nav me_auto mb-2 mb-lg-0" style="padding-right: 15px;">
                  <a href="#popup1"> <div class="charging-container"></div> </a>
                </ul>
                @endif
              @endif
              <ul class="navbar-nav me_auto mb-2 mb-lg-0">
                  <li class="nav-item tx-white"> {{ Auth::user()->name }} {{ Auth::user()->prenom }}</li>
              </ul>
              <ul class="navbar-nav me_auto mb-2 mb-lg-0">
                  <li class="nav-item dropdown">  
                  <a class="nav-linkArmand" href="#" id="dropdown03" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
                  <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                  <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                  <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                  </svg>
                    <ul class="dropdown-menu bg-violet shadow p-3 mb-5" aria-labelledby="dropdown03">
                    @if(Auth::user()->hasRole('admin'))
                      <li><a class="dropdown-itemArmand" href="{{ route('listeAdminTechnicien_path') }}">Gérer Compte Admin / Technicien</a></li>
                      <li><a class="dropdown-itemArmand" href="{{ route('liste') }}">Liste</a></li>
                    @endif
                      <li><a class="dropdown-itemArmand" href="{{ route('informationCompte') }}">Information</a></li>
                      <li><a class="dropdown-itemArmand"  style="color: red;" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Déconnexion') }} </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                      </form></li>
                    @if(Auth::user()->hasRole('admin'))
                      <hr>
                      <li> <a class="dropdown-itemArmand" href="{{ asset('application_simulation_kolantr/application_simulation_kolantr.rar')}}" download> <i class="fas fa-file-download"></i> Télécharger l'application  <br> simulation Kolantr</a></li>
                    @endif
                    </ul>
                  </a>
                  </li>
                </ul>
              </div>
        @endauth

      </div>
    </nav>
</header>