<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@lang('layout.app_name')-@yield('title')</title>

    <!-- Scripts move to before of the body -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    @if(App::isLocale('fa_IR'))
            <link rel='stylesheet' type='text/css' href='http://awebfont.ir/css?id=1116'>
            <link href="{{ mix('css/rtl.css') }}" rel="stylesheet">

        @else
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        @endif

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>
<body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/',App::getLocale()) }}">
                    @lang('layout.app_name')
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav  row">
                    @foreach(config('app.all_locales') as $locale)
                        <li class="col-sm-4">
                        <a class="nav-link" href="{{url('/'.$locale)}}">
                        <img width="60px" src="{{ asset('images/'.$locale.'.ico') }}" alt="{{$locale}}" class="">
                     </a>
                        </li>
                    @endforeach
                    </ul>

                    <!-- Right Side Of Navbar -->
                    @if(App::isLocale('fa_IR'))
                        <ul class="navbar-nav mr-auto">
                    @else
                    <ul class="navbar-nav ml-auto">
                    @endif
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login',app()->getLocale()) }}">@lang('layout.login_text')</a>
                            </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register',app()->getLocale()) }}">@lang('layout.register_text')</a>
                                </li>
                        @endguest
                        @auth

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
{{-- }}{{ Auth::user()->name }} --}}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout',app()->getLocale()) }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    @lang('layout.logout_text')
                                </a>

                                <form id="logout-form" action="{{ route('logout',app()->getLocale()) }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endauth

                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-5 my-4">
            <div class="container">
                @if (Session::has('message'))
                    <li>{!! session('message') !!}</li>
                @endif
            @yield('content')
            </div>
            <div class="row"></div>
            <h5 class="text-center  mt-5 pt-3" style="color:#A09F9F;">@lang('layout.app_copyright')</h5>
        </main>
    </div> <!-- yield get data and section send data to yield-->
    <script src="{{ mix('js/app.js') }}" ></script>

    <script src="{{ mix('js/persianDatepicker.min.js') }}" ></script>
    @stack('scripts')


</body>
</html>
