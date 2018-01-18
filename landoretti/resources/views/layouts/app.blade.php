<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="keywords" content="Landoretti,Art,Auctions,Biddings"/>
    <meta name="description" content="Landoretti: Website where you can add auctions of your precious artworks. People can sign up and add a bidding to buy your item"/>
    <meta name="subject" content="Landoretti: Art">
    <meta name="language" content="EN">
    <meta name="robots" content="index" />
    <meta name="topic" content="Landoretti: Art">
    <meta name="summary" content="Landoretti: Art">
    <meta name="author" content="Alessandro Aussems">
    <meta name="publisher" content="Alessandro Aussems">
    <meta name="url" content="https://landoretti.alessandro.aussems.mtantwerp.eu/">
    <meta name="identifier-URL" content="https://landoretti.alessandro.aussems.mtantwerp.eu/">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">

    <meta property="og:title" content="Landoretti: Art"/>
    <meta property="og:site_name" content="Landoretti: Art" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://landoretti.alessandro.aussems.mtantwerp.eu/"/>
    <meta property="og:image" content="https://landoretti.alessandro.aussems.mtantwerp.eu/logo.png"/>
    <meta property="og:description" content="Landoretti: Website where you can add auctions of your precious artworks. People can sign up and add a bidding to buy your item"/>


    <meta property="twitter:card" content="summary" />
    <meta property="twitter:title" content="CodePolice: Plagiarism checker" />
    <meta property="twitter:description" content="Landoretti: Website where you can add auctions of your precious artworks. People can sign up and add a bidding to buy your item" />
    <meta property="twitter:image" content="https://landoretti.alessandro.aussems.mtantwerp.eu/logo.png" />
    <meta property="twitter:url" content="https://landoretti.alessandro.aussems.mtantwerp.eu/" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <link rel="canonical" href="https://landoretti.alessandro.aussems.mtantwerp.eu/" />
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img  class="logo" src="{{ asset("/logo.png") }}" alt="{{ config('app.name', 'Laravel') }}">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="{{url("starredauctions")}}">{{ __('messages.starred') }}</a>
                        </li>
                        @guest
                            <li><a href="{{ route('login') }}">{{ __('messages.login') }}</a></li>
                            <li><a href="{{ route('register') }}">{{ __('messages.register') }}</a></li>
                        @else
                            <li>
                                <a href="#"><span class="glyphicon glyphicon-user"></span> {{Auth::user()->name}}</a>
                            </li>
                        <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('messages.logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        </li>
                        @endguest
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <li class="search">
                            {{ Form::open(['url' => 'search','class'=>'form-inline'])}}
                            <div class="form-group">
                                {{ Form::text('searchquery', Input::old("searchquery"), array('placeholder'=>'Search...','class' => 'form-control')) }}
                                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
                            </div>
                            {{ Form::close() }}
                        </li>
                        @if(Config::get('app.locale')=="fr")
                            <li><a href="{{ url("language/en") }}"><img src="{{asset('img/lang/united-kingdom.png')}}" alt="Change language to English"></a></li>
                        @else
                            <li><a href="{{ url("language/fr") }}"><img src="{{asset('img/lang/france.png')}}" alt="Change language to French"></a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <ul class="nav navbar-nav undernav">
                <li><a href="{{ url('auctions') }}">{{ __('messages.auctions') }}</a></li>
                <li>
                    <a href="{{url("messages")}}">{{ __('messages.message') }}</a>
                </li>
                <li>
                    <a href="{{route("myauctions")}}">{{ __('messages.mine') }}</a>
                </li>
                <li>
                    <a href="{{url("auctions/create")}}">{{ __('messages.create') }}</a>
                </li>
            </ul>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
