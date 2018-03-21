
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>SayStay | Professional Services for Student Accommodation</title>

    <meta name="description" content="If you are looking for homestay in Sydney, Gold Coast or Brisbane then we are the provider of homestay services, booking platform for students and visitors of all ages.">
    <meta name="keywords" content="Homestay Brisbane, Homestay services in Brisbane, Homestay services Gold coast, Homestay in Gold Coast, Brisbane booking platform, booking platform in Gold Coast, Gold coast booking platform, Homestay Services in Sydney, Homestay Sydney, booking platform in Sydney, booking platform Sydney">
    
    <meta property="og:locale" content="en">
    <meta property="og:url" content="http://www.saystay.com">
    <meta property="og:site_name" content="SayStay">
    <meta property="og:title" content="SayStay | Professional Services for Student Accommodation">
    <meta property="og:description" content="SayStay offers short and long term accommodation in home-stay and share houses, as well as pick up and drop off services to and from the airport.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="http://saystay.com/assets/images/logo.png">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/starter-template.css" rel="stylesheet">
    <link href="/css/google_maps.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
    

    <!-- Materialize -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


  </head>
  <body>

    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">SayStay</a>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('homepage') }}">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
        </ul>
          @if (Route::has('login'))
                <div class="top-right links">
                  <ul class="navbar-nav mr-auto">
                      @if (Auth::check())
                          <li class="nav-item active">

                            <a class="nav-link" href="{{ '/'.Auth::user()->roles()->first()->name }}">{{ Auth::user()->first_name .' '. Auth::user()->last_name }}<span class="sr-only">(current)</span></a>
                          </li>
                          <li class="nav-item active">
                            <a class="nav-link" href="{{ route('logout') }}" 
                              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                                <span class="sr-only">(current)</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                            </form>
                          </li>
                      @else
                          <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/login') }}">Login<span class="sr-only">(current)</span></a>
                          </li>
                          <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/register') }}">Register<span class="sr-only">(current)</span></a>
                          </li>
                      @endif
                    </ul>
                </div>
            @endif
      </div>
    </nav>
    

    <div class="container">
    
    @yield('content')

    <hr>
    <footer>
        <p>&copy; 2017 SayStay.com. All rights reserved</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/js/jquery.min.js"><\/script>')</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/js/ie10-viewport-bug-workaround.js"></script>
    <!-- GOOGLE RECAPTCHA -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </body>
</html>
