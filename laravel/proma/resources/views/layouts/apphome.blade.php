<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style>
    .mrgtp{
    margin-top: 13px;
}
.bttn{
    padding-top: 0px;
    padding-bottom: 0px;
}
.a{
    padding-top: 0px;
    padding-bottom: 0px;
}
</style>

<body>
    <div id="app">
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
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <span class="glyphicon glyphicon-euro"></span>
                        {{ config('Score', 'Score') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <div>
                        <ul class="nav navbar-nav">
                            <div class="mrgtp">
                                <!-- <li class="bgb"> -->
                                <div class="col-md-1">
                                    <span class="glyphicon glyphicon-folder-open"></span>
                                </div>
                                <div class="col-md-3">
                                    <router-link :to="{name: 'dataCreate'}" class="bttn">Project</router-link>
                                </div>
                                <div class="col-md-1">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </div>
                                <div class="col-md-3">
                                    <router-link :to="{name: 'dataScore'}">Add Score</router-link>
                                </div>
                                <!-- </li> -->
                                <!-- <li class="bgb"> -->
                                <div class="col-md-1">
                                    <span class="glyphicon glyphicon-euro"></span>
                                </div>
                                <!-- <div class="col-md-3">
                                    <router-link :to="{name: 'dataRead'}" class="bttn">Score</router-link>
                                </div> -->
                                <router-link :to="{name: 'table'}">Table</router-link>
                            </div>
                            <!-- <div>
                                <li class="bgb">
                                    <div class="col-md-2">
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <router-link :to="{name: 'dataRead'}" class="bttn">Score</router-link>
                                    </div>
                                </li>
                            </div> -->
                        </ul>
                    </div>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>