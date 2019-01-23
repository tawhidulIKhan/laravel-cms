<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tetra CMS</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('frontend/css/app.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('frontend/css/blog-home.css') }}" rel="stylesheet">

  </head>

  <body class="p-0">
    
<!-- Navigation -->
<nav class="navbar navbar-expand-lg border-bottom bg-white">
  <div class="container">
    <a class="navbar-brand" href="#">
      <span class="font-weight-bold h4">
          {{ setting('site.title') }}
 
      </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">Home
          </a>
        </li>
        
        @guest
        <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}">Register</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
        @endguest
        
        @auth
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
          </li>
          
        @endauth

      </ul>
    </div>
  </div>
</nav>



    @yield('content')


        <!-- Footer -->
        <footer class="py-5 bg-dark">
          <div class="container">
            <p class="m-0 text-center text-white">
                {{ setting('site.copyrighttext') }}

            </p>
          </div>
          <!-- /.container -->
        </footer>
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
  </body>

</html>
