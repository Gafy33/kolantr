  <header>
            <a href="{{ route('accueil') }}" class="logo">KOLANTR</a>
            <div class="toggle" onclick="toggleMenu();"></div>
            <ul class="menu">
              @guest
                <li><a href="#Liste" onclick="toggleMenu();" class="login"><i class="fa fa-user" aria-hidden="true"></i></a></li>
              @endguest

              @auth
              @if (Auth::user()->hasRole('admin') or Auth::user()->hasRole('technicien') )

                @if(Auth::user()->hasRole('admin') or Auth::user()->hasRole('technicien'))

                @if(!empty($alarme_popup))
                <ul class="navbar-nav me_auto mb-2 mb-lg-0" style="padding-right: 15px;">
                  <a href="#popup1"> <div class="charging-container"></div> </a>
                </ul>
                @endif
                @endif
                @if (Auth::user()->hasRole('admin'))
                <li><a href="{{ route('listeClient_path') }}" onclick="toggleMenu();">Client</a></li>
                @endif

                <li><a href="{{ route('listeCampagneMesure_path') }}" onclick="toggleMenu();">Campagne de mesure</a></li>
                <li><a href="{{ route('listeBoitier_path') }}" onclick="toggleMenu();">Boitier</a></li>
                <li><a href="#information" onclick="toggleMenu();">Information</a></li>
                <li><a href="#compte" onclick="toggleMenu();">Compte</a></li>
                <li><a href="#Application" onclick="toggleMenu();">Application</a></li>
                <li><a href="#contact" onclick="toggleMenu();">Contact</a></li>
                <li><a href="{{ route('liste') }}" onclick="toggleMenu();">Liste</a></li>
                <!--<li><a href="" onclick="toggleMenu();" class="login"><i class="fa fa-user" aria-hidden="true"></i></a></li>-->

              @elseif(Auth::user()->hasRole('user'))
                <li><a href="{{ route('clientmescampagnes_path') }}">Mes campagnes de mesures</a></li>
              @endif

              <li><a href="{{ route('logout') }}" onclick="toggleMenu();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="logout"><i class="fas fa-power-off"></i></a><form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                      </form> </li>
              @endauth
            </ul>
  </header>