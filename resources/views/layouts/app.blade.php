<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="{{ URL::asset('/css/materialize.css') }}" type="text/css" rel="stylesheet"/>
        <!-- Sticky Footer -->
        <style>
            body {
                display: flex;
                min-height: 100vh;
                flex-direction: column;
            }

            main {
                flex: 1 0 auto;
            }

        </style>
    </head>
    <body>
        {{-- <nav class="cyan darken-2" role="navigation">
            <div class="nav-wrapper container">
                @guest
                    <!-- Expanded navigation -->
                    <ul class="right hide-on-med-and-down">
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    </ul>
                    <!-- Collapsed navigation -->
                    <ul id="nav-mobile" class="side-nav">
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    </ul>
                @else
                    <!-- Expanded navigation -->
                    <ul class="right hide-on-med-and-down">
                        <li>
                            <a class="waves-effect" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                    <!-- Collapsed navigation -->
                    <ul id="nav-mobile" class="side-nav">
                        <li>
                            <a class="waves-effect" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                @endguest
            </div>
        </nav> --}}


        <nav>
          <div class="nav-wrapper container">
            <!-- Navigation Branding -->
            <a id="logo-container" href="{{ url('/') }}" class="brand-logo">Sapient</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            @guest
                <!-- NORMAL -->
                <ul class="right hide-on-med-and-down">
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                </ul>
                {{-- MOBILE --}}
                <ul class="sidenav" id="mobile-demo">
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                </ul>
            @else
              {{-- NORMAL --}}
              <ul class="right hide-on-med-and-down">
                <!-- Dropdown Trigger -->
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Profile<i class="material-icons right">arrow_drop_down</i></a></li>
                <ul id="dropdown1" class="dropdown-content">
                  <li>
                      <a class="waves-effect" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                          Logout
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                  </li>
                </ul>
              </ul>
              {{-- MOBILE --}}
              <ul class="sidenav" id="mobile-demo">
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Profile<i class="material-icons right">arrow_drop_down</i></a></li>
                <ul id="dropdown1" class="dropdown-content">
                  <li>
                      <a class="waves-effect" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                          Logout
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                  </li>
                </ul>
              </ul>

          @endguest
          </div>
        </nav>



        <br>
        <main>
            @yield('content')
        </main>
        <footer class="page-footer">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">Company Bio</h5>
                        <p class="grey-text text-lighten-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                    <div class="col l3 s12 offset-l3">
                        <h5 class="white-text">Connect</h5>
                        <ul>
                            <li><a class="white-text" href="#">Link 1</a></li>
                            <li><a class="white-text" href="#">Link 2</a></li>
                            <li><a class="white-text" href="#">Link 3</a></li>
                            <li><a class="white-text" href="#">Link 4</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    <span class="white-text">Made by : <a class="blue-text text-lighten-4" href="http://kristennquem.com">Kristenn Quemener</a></span>
                </div>
            </div>
        </footer>
        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
        <script src="{{ URL::asset('/js/materialize.js') }}" type="text/javascript"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.js" type="text/javascript"></script> --}}

        <script>
            $(document).ready(function() {
                // Materialize.updateTextFields();
                $(".dropdown-trigger").dropdown();
                $('.sidenav').sidenav();

            });
            @if(session('status'))
                Materialize.toast('{{ session("status") }}', 4000);
            @endif
        </script>
    </body>
</html>
