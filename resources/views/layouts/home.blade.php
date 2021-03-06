<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title> {{ $title }} </title>


    <link rel="shortcut icon" type="image/png" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9i_4sX9b1uIV_QXHx9HmXOyJkftoM_LC94wQh0OOncqVh6DT9wsfa_xN_Nt4shAcdKgc&usqp=CAU" />

    <!-- Bootstrap core CSS -->
  <link href="{{ asset('/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('/bootstrap/navbar.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

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

    .dropdown-itemblack{display:block;width:100%;padding:.25rem 1rem;clear:both;font-weight:400;color: black;text-align:inherit;text-decoration:none;white-space:nowrap;background-color:transparent;border:0}
    .dropdown-itemblack:focus,.dropdown-itemblack:hover {
      color: white;
      background-color:#BA8989;
    }
   
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

      .charging-container {
      max-width: 150px;
      width: 85px;
      height: 35px;
      border: 3px solid rgb(236, 39, 72);
      border-radius: 5px;
      position: relative;
      cursor: pointer;
      padding: 10px;
    }

    .charging-container::before {
    content: '';
    position: absolute;
    width: 6px;
    height: 16px;
    background: rgb(236, 39, 72);
    right: -7px;
    top: 50%;
    margin-top: -8px;
    border-radius: 2px;
    }

  .charging-container::after {
    content: '';
    position: absolute;
    top: 5px;
    bottom: 5px;
    left: 5px;
    /* right: 10px; */
    background: rgb(236, 39, 72);
    transition: all .3s;
    -webkit-animation: charging 1s infinite;
    -moz-animation: charging 1s infinite;
    animation: charging 1s infinite;
    animation: charging 1s infinite;
  }

  @-webkit-keyframes charging {
    from {
      width: 15%;
    } 
    to {
      width: 5%;
    }
  }

  @-moz-keyframes charging {
    from {
      width: 15%;
    } 
    to {
      width: 5%;
    }
  }
  @keyframes charging {
    from {
      width: 15%;
    } 
    to {
      width: 5%;
    }
  }



    .alert.success {background-color: #4CAF50; float: right;}
    .alert.info {background-color: #2196F3;}
    .alert.warning {background-color: #ff0000;}

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

    #bloc
    {
      display: none;
    }

      .box {
        width: 40%;
        margin: 0 auto;
        background: rgba(255,255,255,0.2);
        padding: 35px;
        border: 2px solid #fff;
        border-radius: 20px/50px;
        background-clip: padding-box;
        text-align: center;
      }

      .button {
        font-size: 1em;
        padding: 10px;
        color: #fff;
        border: 2px solid #06D85F;
        border-radius: 20px/50px;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.3s ease-out;
      }
      .button:hover {
        background: #06D85F;
      }

      .overlay {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.7);
        transition: opacity 500ms;
        visibility: hidden;
        opacity: 0;
      }
      .overlay:target {
        visibility: visible;
        opacity: 1;
      }

      .popup {
        margin: 70px auto;
        padding: 20px;
        background: #fff;
        border-radius: 5px;
        width: 30%;
        position: relative;
        transition: all 5s ease-in-out;
      }

      .popup h2 {
        margin-top: 0;
        color: #333;
        font-family: Tahoma, Arial, sans-serif;
      }
      .popup .close {
        position: absolute;
        top: 20px;
        right: 30px;
        transition: all 200ms;
        font-size: 30px;
        font-weight: bold;
        text-decoration: none;
        color: #333;
      }
      .popup .close:hover {
        color: #06D85F;
      }
      .popup .content {
        max-height: 30%;
        overflow: auto;
      }

      .navbar-toggler-armand {
        padding:.25rem .75rem;
        font-size:1.25rem;
        line-height:1;
        background-color:transparent;
        border:1px solid gray;
        border-radius:.25rem;
        transition:box-shadow .15s ease-in-out
      }

      @media screen and (max-width: 700px){
        .box{
          width: 70%;
        }
        .popup{
          width: 70%;
        }
      }

  </style>

  @yield('style')

  </head>

  <body class="bg-light">

  @include('layouts.partials.navbar')

  @yield('content')
  
  <script src="{{ asset('/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('/js/bootstrap.bundle.js')}}"></script>

  @yield('scriptAlert')
  @yield('script')

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
