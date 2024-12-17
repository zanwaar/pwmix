<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Latest News</title>
    <meta name="description" content="Perfect World">
    <meta name="keywords" content="Perfect World">
    <meta name="author" content="PW Corp">
    <!-- CSS Files
    ================================================== -->
    <link href="{{ asset('themes/fik/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bootstrap">
    <link href="{{ asset('themes/fik/css/plugins.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('themes/fik/css/swiper.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('themes/fik/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('themes/fik/css/coloring.css') }}" rel="stylesheet" type="text/css">
    <!-- color scheme -->
    <link id="colors" href="{{ asset('themes/fik/css/colors/scheme-01.css') }}" rel="stylesheet" type="text/css">
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
</head>


<body class="dark-scheme">
    <div id="wrapper">
        <div class="float-text show-on-scroll">
            <span><a href="#">Scroll to top</a></span>
        </div>
        <div class="scrollbar-v show-on-scroll"></div>
        <x-hrace009::portal.preload />

        <x-hrace009::portal.navbar />
        <!-- content begin -->
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>
            <!-- section begin -->
            <section id="subheader" class="jarallax">
                <img src="images/background/subheader-news.webp" class="jarallax-img" alt="">
                <div class="container z-1000">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="subtitle wow fadeInUp mb-3">Latest From Us</div>
                        </div>
                        <div class="col-lg-6">
                            <h2 class="wow fadeInUp mb20" data-wow-delay=".2s">News &amp; Promo</h2>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section close -->

            <section id="section-content" aria-label="section">
                <div class="container">
                    <div class="row g-4">
                        {{ $news }}
                        <div class="spacer-single"></div>

                    </div>
                </div>
            </section>
        </div>
        <!-- content close -->


        <x-hrace009::portal.footer />
        <x-hrace009::portal.bottom-script />


</body>

</html>