<!-- header begin -->
<header class="bg-dark-1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="de-flex sm-pt10">
                    <!-- left -->
                    <div class="de-flex-col header-col-mid">
                        <ul id="mainmenu">
                            <li>
                                <a style="font-size:18px" class="menu-item {{ (Route::is('HOME')) ? 'active' : ''  }}" href="{{ route('HOME') }}">{{ __('general.home') }}</a>
                            </li>
                            <li>
                                <a style="font-size:18px" class="menu-item {{ (Route::is('show.allpost')) ? 'active' : ''  }}" href="{{ route('show.allpost') }}">News</a>
                            </li>
                            <li>
                                <a style="font-size:18px" class="menu-item {{ (Route::is('show.download')) ? 'active' : ''  }}" href="{{ route('show.download') }}">Download</a>
                            </li>
                            @if(config('pw-config.system.apps.donate'))
                            <li>
                                <a style="font-size:18px" class="menu-item" href="{{ route('app.donate.history') }}">
                                    {{ __('donate.title') }}
                                </a>
                            </li>
                            @endif
                            @if(config('pw-config.system.apps.inGameService'))
                            <li>
                                <a style="font-size:18px" class="menu-item" href="{{ route('app.services.index') }}">
                                    {{ __('service.title') }}
                                </a>
                            </li>
                            @endif
                            @if(config('pw-config.system.apps.ranking'))
                            <li>
                                <a style="font-size:18px" class="menu-item" href="{{ url('/#ranking') }}">
                                    {{ __('ranking.title') }}
                                </a>
                            </li>
                            @endif
                            @if($download->exists())
                            @if($download->count() === 1)
                            <li>
                                <a style="font-size:18px" class="menu-item" href="{{ route('show.article', $download->first()->slug) }}">
                                    {{ $download->first()->title }}
                                </a>
                            </li>
                            @else
                            <li>
                                <a style="font-size:18px" class="menu-item" href="#" style="font-size:18px" class="menu-item">
                                    {{ __('news.category.download') }}

                                </a>
                                <div>
                                    <ul>
                                        @foreach($download->get() as $page)
                                        <li>
                                            <a style="font-size:18px" class="menu-item" href="{{ route('show.article', $page->slug) }}">
                                                {{ $page->title }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            @endif
                            @endif
                            @if($guide->exists())
                            @if($guide->count() === 1)
                            <li>
                                <a style="font-size:18px" class="menu-item" href="{{ route('show.article', $guide->first()->slug) }}">
                                    {{ $guide->first()->title }}
                                </a>
                            </li>
                            @else
                            <li>
                                <a style="font-size:18px" class="menu-item" href="#" style="font-size:18px" class="menu-item">
                                    {{ __('news.category.guide') }}

                                </a>
                                <div>
                                    <ul>
                                        @foreach($guide->get() as $guidepage)
                                        <li>
                                            <a style="font-size:18px" class="menu-item" href="{{ route('show.article', $guidepage->slug) }}">
                                                {{ $guidepage->title }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            @endif
                            @endif

                        </ul>
                    </div>
                    <!-- left -->

                    <!-- right -->

                    <div class="de-flex-col header-col-mid">
                        <div class="menu_side_area">
                            @auth
                            <div id="mainmenu">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <a href="#side" style="font-size:18px" class="menu-item" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                    🥷 {{ Auth::user()->truename }}
                                    <img class="img-circle" width="32px" height="32" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </a>
                                @else
                                <a href="#" style="font-size:18px" class="menu-item" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                    🥷 {{ Auth::user()->truename }}
                                    <i class="fa fa-chevron-circle-down"></i>
                                </a>
                                @endif
                            </div>
                            @else
                            <a class="btn-main btn-line" href="#start" data-bs-toggle="modal" data-bs-target="#staticBackdrop" role="button"> Register / Login </a>
                            @endauth
                        </div>
                    </div>
                    <!-- right -->

                </div>
            </div>
        </div>
        <div class="mobile-menu d-lg-none">
            <div x-show="isMobileMenuOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="mobile-menu-content w-full">
                <ul class=" gap-4 mt-4 my-4 d-flex w-auto text-center">
                    <a href="{{ url('/') }}" class="mobile-menu-item">Home</a>
                    <a href="{{ route('show.allpost') }}" class="mobile-menu-item">News</a>
                    <a href="{{ route('register') }}" class="mobile-menu-item">Register</a>
                    <a href="{{ route('login') }}" class="mobile-menu-item">Login</a>
                </ul>
            </div>
        </div>

    </div>
</header>
<!-- header close -->
