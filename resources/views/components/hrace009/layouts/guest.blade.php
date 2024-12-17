<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} @yield('title')</title>

    @if( config('pw-config.logo') === 'img/logo/logo.png' )
    <link rel="shortcut icon" href="{{ asset(config('pw-config.logo')) }}" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset(config('pw-config.logo')) }}" />
    @elseif( ! config('pw-config.logo') )
    <link rel="shortcut icon" href="{{ asset('img/logo/logo.png') }}" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/logo/logo.png') }}" />
    @else
    <link rel="shortcut icon" href="{{ asset('uploads/logo/' . config('pw-config.logo') ) }}" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('uploads/logo/' . config('pw-config.logo') ) }}" />
    @endif
    <x-hrace009::portal.top-script />
    <!-- Scripts -->
</head>

<body class="dark-scheme">
    <x-hrace009::portal.preload />

    <x-hrace009::portal.navbar />
    <!-- Loading screen -->
    <main>
        <x-hrace009::auth.inside-main>
            {{ $slot }}
        </x-hrace009::auth.inside-main>
    </main>
    <x-hrace009::portal.footer/>


    </div>


    <x-hrace009::portal.bottom-script />
    <x-hrace009::flash-message />

</body>

</html>