@if(session('status'))
    return redirect('/accueil');
@endif

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>test</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="{{ asset('/bootstrap/bootstrap.min.css')}}" rel="stylesheet">

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

      .featurette-divider {
		  margin: 2rem 0;
		  color: #5a5a5a /* Space out the Bootstrap <hr> more */
		}

		.featurette-divider-armand {
		  margin: 0.5rem 0;
		  color: #5a5a5a /* Space out the Bootstrap <hr> more */
		}

		.dropdown-itemArmand{display:block;width:100%;padding:.25rem 1rem;clear:both;font-weight:400;color:#212529;text-align:inherit;text-decoration:none;white-space:nowrap;background-color:transparent;border:0}

		.nav-linkArmand{display:block;padding:.1rem 0.5rem;text-decoration:none;transition:color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out}

		.dropdown-itemArmand:focus,.dropdown-itemArmand:hover {
			color:#1e2125;
			background-color:#BA8989;
		}

    </style>

    
    <!-- Custom styles for this template -->
    <link href="{{ asset('/bootstrap/signin.css')}}" rel="stylesheet">
  </head>
  <body class="text-center bg-dark">

  	<script src='https://kit.fontawesome.com/a076d05399.js'></script>


@yield('navbar')
    
@yield('content')



<script src="{{ asset('/js/bootstrap.bundle.min.js')}}"></script>
    
  </body>
</html>