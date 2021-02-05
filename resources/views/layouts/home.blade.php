<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title> {{ $title }} </title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">

    

    <!-- Bootstrap core CSS -->
  <link href="{{ asset('/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>

  <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    
          .bg-violet{
        background-color: #201c33;
           }

    .dropdown-itemArmand{display:block;width:100%;padding:.25rem 1rem;clear:both;font-weight:400;color: white;text-align:inherit;text-decoration:none;white-space:nowrap;background-color:transparent;border:0}

    .nav-linkArmand{display:block;padding:.1rem 0.5rem;text-decoration:none;transition:color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out}

    .dropdown-itemArmand:focus,.dropdown-itemArmand:hover {
      color: white;
      background-color:#BA8989;
    }

    .tx-white
    {
      color: #eceeef;
    }

    .tx-black
    {
      color: #2E2E2E;
    }

    .alert {
      padding: 10px;
      background-color: #f44336;
      color: white;
      opacity: 0.75;
      transition: opacity 0.6s;
      margin-bottom: 15px;
    }

    .alert.success {background-color: #4CAF50; float: right;}
    .alert.info {background-color: #2196F3;}
    .alert.warning {background-color: #ff9800;}

    .closebtn {
      margin-left: 15px;
      color: white;
      font-weight: bold;
      float: right;
      font-size: 22px;
      line-height: 20px;
      cursor: pointer;
      transition: 0.3s;
    }

    .closebtn:hover {
      color: black;
    }

    #map{
        height:400px;
        }



  </style>

  @yield('style')

  </head>

  <body class="@if(Auth::user()->preference == "theme_dark") bg-dark @else bg-light @endif">

  @include('layouts.partials.navbar')

  @yield('content')
  
  <script src="{{ asset('/js/bootstrap.bundle.min.js')}}"></script>

  @yield('scriptAlert')
  @yield('script')

  @if(Auth::user()->hasRole('admin') or Auth::user()->hasRole('technicien') or $title != "Home" )

    @include('layouts.partials.footer') 
    
  @endif
  </body>


</html>
