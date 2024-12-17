<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description  }}">
    <meta name="keywords" content="{{ $keywords }}">
    <meta name="author" content="{{ $author  }}">

    <meta property="og:locale" content="{{ app()->getLocale() }}">
    <meta property="og:title" content="{{ $title }}">
    <meta property="og:url" content="{{ $og_url }}">
    <meta property="og:type" content="blog">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:image" content="{{ $og_image }}">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{ $title }}">
    <meta name='twitter:description' content="{{ $description }}">
    <meta name="twitter:url" content="{{ $og_url }}">
    <meta name="twitter:image" content="{{ $og_image }}">

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
        <div class="no-top no-bottom " id="content">
            <div id="top"></div>

            <section id="subheader" class="jarallax">
                <div class="de-gradient-edge-bottom"></div>
                <img src="{{ $og_image }}" class="jarallax-img" alt="{{ $title }}">
                <div class="container z-1000">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="subtitle wow fadeInUp mb-3">{{ $categories }}</div>
                        </div>
                        <div class="col-lg-6">
                            <h3 class="wow fadeInUp mb20" style="margin-top:10%;margin-bottom:10%;" data-wow-delay=".2s">{{ $article_title }}</h3>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="container">

                    <div class="row">
                        <div class="col-md-12 mb100">
                        <img src="{{ $og_image }}" class="col-md-12 my-4 z-1000" style="width:700px;border-radius:16px;" alt="{{ $title }}"></div>
                        <div class="col-md-8">
                            <div class="meta">
                                <div class="item">
                                    <i class="fa fa-calendar meta-icon"></i>
                                    {{ __('news.published') . ' ' .$published }}
                                </div>
                                <div class="item">
                                    <i class="fa fa-user meta-icon"></i>
                                    {{ $author }}
                                </div>
                                <div class="item">
                                    <i class="fa fa-bookmark meta-icon"></i>
                                    {{ $categories }}
                                </div>
                            </div>
                            <hr>
                            <div class="blog-read">

                                <div class="post-text">
                                    {{ $news }}
                                </div>

                            </div>

                            <div class="spacer-single"></div>

                        </div>

                        <div id="sidebar" class="col-md-4">
                            <div class="widget">
                                <h4>Share With Friends</h4>
                                <div class="small-border"></div>
                                <div class="de-color-icons">
                                    <span><i class="fa-brands fa-twitter fa-lg"></i></span>
                                    <span><i class="fa-brands fa-facebook fa-lg"></i></span>
                                    <span><i class="fa-brands fa-reddit fa-lg"></i></span>
                                    <span><i class="fa-brands fa-linkedin fa-lg"></i></span>
                                    <span><i class="fa-brands fa-pinterest fa-lg"></i></span>
                                    <span><i class="fa-brands fa-stumbleupon fa-lg"></i></span>
                                    <span><i class="fa-brands fa-delicious fa-lg"></i></span>
                                    <span><i class="fa-brands fa-tiktok fa-lg"></i></span>
                                </div>
                            </div>

                            <div class="widget widget-post">
                                <h4>Recent Posts</h4>
                                <div class="small-border"></div>
                                @php
                                $newxx = \App\Models\News::all();
                                @endphp
                                <ul class="">
                                    @foreach($newxx as $newx)
                                    <li><span class="date">{{ \Carbon\Carbon::now(config('app.timezone'))->translatedFormat('j M') }}</span><a href="{{ route('show.article', $newx->slug ) }}">{{ $newx->title }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            
                            <div class="widget widget_tags">
                                <h4>Tags</h4>
                                <div class="small-border"></div>
                                <ul>
                                    @php($tags = explode(',', $keywords ))
                                    @foreach( $tags as $tag )
                                    <li><a href="{{ route('show.article.tag', $tag) }}">{{ $tag }}</a></li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- content close -->


        <x-hrace009::portal.footer />


    </div>


    <x-hrace009::portal.bottom-script />


</body>

</html>
