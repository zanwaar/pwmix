<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('pw-config.server_name', 'Laravel') }} @yield('title')</title>
    <meta name="description"
        content="{{ config('pw-config.server_name') . ' - The Best Perfect World Private Server' }}">
    <meta name="keywords" content="gaming, game, mmorpg, perfect world, private server">
    <meta name="author" content="{{ config('pw-config.server_name') }}">

    <meta property="og:locale" content="{{ app()->getLocale() }}">
    <meta property="og:title" content="{{ config('pw-config.server_name', 'Laravel') }}">
    <meta property="og:url" content="{{ route('HOME') }}">
    <meta property="og:type" content="website">
    <meta property="og:description"
        content="{{ config('pw-config.server_name') . ' - The Best Perfect World Private Server' }}">
    <meta property="og:image" content="{{ asset('img/bg/header.jpg') }}">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{ config('pw-config.server_name', 'Laravel') }}">
    <meta name='twitter:description'
        content="{{ config('pw-config.server_name') . ' - The Best Perfect World Private Server' }}">
    <meta name="twitter:url" content="{{ route('HOME') }}">
    <meta name="twitter:image" content="{{ asset('img/bg/header.jpg') }}">

    @if( config('pw-config.logo') === 'img/logo/logo.png' )
    <link rel="shortcut icon" href="{{ asset('uploads/logo/' . config('pw-config.logo') ) }}" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('uploads/logo/' . config('pw-config.logo') ) }}" />
    @elseif( ! config('pw-config.logo') )
    <link rel="shortcut icon" href="{{ asset('uploads/logo/' . config('pw-config.logo') ) }}" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('uploads/logo/' . config('pw-config.logo') ) }}" />
    @else
    <link rel="shortcut icon" href="{{ asset('uploads/logo/' . config('pw-config.logo') ) }}" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('uploads/logo/' . config('pw-config.logo') ) }}" />
    @endif
    <x-hrace009::portal.top-script />
</head>

<body class="dark-scheme antialiased">
    <div id="wrapper">
        <div class="float-text show-on-scroll">
            <span><a href="#">Scroll to top</a></span>
        </div>
        <div class="scrollbar-v show-on-scroll"></div>
        <x-hrace009::portal.preload />

        <x-hrace009::portal.navbar />

        <!-- content begin -->
        <div class="no-bottom no-top jarak-md" id="content">

            <div id="top"></div>

            {{ $home }}

        </div>
        <!-- content close -->

        <div class="content-wrap">


            <div class="container youplay-news">

                <!-- Right Side -->
                <div class="col-md-3" style="display:none;">

                    {{ $widget }}

                </div>
                <!-- /Right Side -->

            </div>


            <x-hrace009::portal.footer />


        </div>


        <x-hrace009::portal.bottom-script />
        <x-hrace009::flash-message />
    </div>
</body>

</html>