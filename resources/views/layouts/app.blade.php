<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ url('/css/app.css') }}" rel="stylesheet">
    

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

   

    <script src="{{ asset('/node_modules/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('/node_modules/jqueryui/jquery-ui.min.js') }}"></script>

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

    <link href="{{ asset('/css/animations/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/animations/animations.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/items_blocks.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet">

    

    <script src="{{asset('/node_modules/underscore/underscore-min.js') }}"></script>
    <script src="{{asset('/node_modules/backbone/backbone-min.js') }}"></script>
    <script src="{{asset('/node_modules/backbone.stickit/backbone.stickit.js') }}"></script>
    <script src="{{asset('/node_modules/backbone.controller/backbone.controller.js') }}"></script>

    <script src="{{ asset('/js/utils/log.js') }}"></script>
    <script src="{{ asset('/js/utils/utils.js') }}"></script>
    
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand navbar-brand-extend" href="{{ url('/') }}">
                    <img class="logo-top" src="{{ asset('/css/img/logo_top.jpg') }}">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    
                    @if(Auth::user())

                        @if (Auth::user()->hasRole('admin') || Session::has('isAdmin'))
                            <li><a href="{{ url('admin/adminpanel') }}">Panel administratora</a></li>
                        @endif

                        @if (Auth::user()->hasRole('owner') || Session::has('isOwner'))
                            <li><a href="{{ url('owner/ownerpanel') }}">Panel właściciela</a></li>
                        @endif

                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">

                                @if (Session::has('isAdmin'))
                                    <li class="role-user-is-admin"><a href="{{ url('/admin/loginas/') }}/{{Session::get('loginasid')}}">Zaloguj się jako administrator</a></li>
                                @endif

                                @if (Session::has('isOwner'))
                                    <li class="role-user-is-admin"><a href="{{ url('/owner/loginas/') }}/{{Session::get('loginasid')}}">Zaloguj się jako właściciel</a></li>
                                @endif

                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Wyloguj
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    
</body>
</html>
