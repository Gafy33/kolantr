@extends('layouts.master', ['title' => 'Login'])

@section('navbar')
<header>
            <a href="#home" class="logo">KOLANTR</a>
</header>
@stop

@section('content')
<main class="form-signin shadow p-3">
    <h2 class="featurette-heading"><span class="text-muted"> <i class='fas fa-truck' width="75" height="75" fill="currentColor"></i> KOLANTR  <i class='fas fa-truck' width="75" height="75" fill="currentColor"></span></h2>
          <form method="POST" action="{{ route('login') }}">
          @csrf
            <hr class="featurette-divider">
              <h2 class="featurette-heading fw-normal mb-3 h3"><span class="text-muted">Se connecter</span></h2>
              <label for="inputText" class="visually-hidden">Votre Identifiant</label>
                <input id="identifiant" type="text" class="form-control @error('identifiant') is-invalid @enderror" name="identifiant" value="{{ old('identifiant') }}" required autocomplete="email" autofocus placeholder="Identifiant" style="border-radius: 3px">
                @error('identifiant')
                <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                </span>
                @enderror
            <hr class="featurette-divider-armand">  <!--required autofocus-->
                <label for="inputPassword" class="visually-hidden">Mot de passe</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Mot de passe" style="border-radius: 3px">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror <!--required-->
                
          <div class="checkbox mb-3">
            <label>
              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                          <label class="form-check-label text-muted" for="remember">
                                              {{ __('Remember Me') }}
                                          </label>
            </label>
          </div>
          <button type="submit" class="w-100 btn btn-lg btn-primary">
                                          {{ __('Login') }}
                                      </button>

                                      @if (Route::has('password.request'))
                                          <a class="btn btn-link" href="{{ route('password.request') }}">
                                              {{ __('Forgot Your Password?') }}
                                          </a>
                                      @endif
          </form>
</main>
@endsection