<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@hasSection('template_title')@yield('template_title') | @endif {{ trans('dashboard.biDashboard') }}</title>
        <meta name="description" content="">
        <meta name="author" content="J&T Express IT">
        <link rel="shortcut icon" href="{{ url('/images/favicon.ico') }}">

        {{-- Scripts --}}
        <script src="{{ mix('/js/app.js') }}"></script>

        {{-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --}}
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        {{-- Fonts --}}
        @yield('template_linked_fonts')

        {{-- Styles --}}
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
        <link href="{{ mix('/css/bootstrap-admin.css') }}" rel="stylesheet">
        <link href="{{ mix('/css/_custom.css') }}" rel="stylesheet">

        <script type="text/javascript" src="{{ mix('/js/odometer.min.js') }}"></script>
        <link rel="stylesheet" href="{{ mix('/css/odometer-theme-default.css') }}">

        @yield('template_linked_css')

        <style type="text/css">
            @yield('template_fastload_css')

            @if (Auth::User() && (Auth::User()->profile) && (Auth::User()->profile->avatar_status == 0))
                .user-avatar-nav {
                    background: url({{ Gravatar::get(Auth::user()->email) }}) 50% 50% no-repeat;
                    background-size: auto 100%;
                }
            @endif

        </style>

        {{-- Scripts --}}
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>

        @if (Auth::User() && (Auth::User()->profile) && $theme->link != null && $theme->link != 'null')
            <link rel="stylesheet" type="text/css" href="{{ $theme->link }}">
        @endif

        @yield('head')

        @include('scripts.ga-analytics')

        @livewireStyles
    </head>
    <body>
    @php
        $_auth_name = (
        Auth::User()->first_name.' - '. date('Y-m-d')
        );
    @endphp
        @if(
        Request::is('home/*') || Request::is('home') || Request::is('/')
        || Request::is('finance') || Request::is('finance/*')
        || Request::is('customer') || Request::is('customer/*')
        )
            @for($i=0; $i<=6; $i++)
                @for($j=1; $j<=5; $j++)
                    <div class="wm-background @if($j%2 == 0) {{ 'd-none d-sm-block' }} @endif"
                         style="top: {{ $i*300-220 }}px; left: {{ $j*25-35 }}%;">
                        <p class="wm-bg-text">{{ $_auth_name }}</p>
                    </div>
                @endfor
            @endfor
        @endif
        <div id="app">
            <div class="wrapper">

                @include('partials.header-top')

                <div class="page-wrap">

                    @include('partials.sidebar')

                    <div class="main-content">
                        <div class="container-fluid">

                            @include('partials.page-header')

                            @yield('content')

                        </div>
                    </div>

                    @include('partials.right-sidebar')
                    @include('partials.chat-panel')
                    @include('partials.footer')

                </div>
            </div>

            @include('partials.models')
        </div>

        <script src="{{ mix('/js/bootstrapadmin.js') }}"></script>
        <script src="{{ mix('/js/custom.js') }}"></script>
        <script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>

        @yield('footer_scripts')
        @livewireScripts
    </body>
</html>
