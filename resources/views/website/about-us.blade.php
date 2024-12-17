@section('title', ' - ' . $title )
<x-hrace009::layouts.portal>
    <x-slot name="home">
        <!-- content begin -->
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>
            <!-- section begin -->
            <section id="subheader" class="jarallax">
                <div class="de-gradient-edge-bottom"></div>
                <img src="{{ asset('images/background/space.webp') }}" class="jarallax-img" alt="">
                <div class="container z-1000">
                    <div class="row">
                        <div class="col-lg-12 mb-3 text-center">
                            <div class="subtitle wow fadeInUp mb-3">{{ $title }}</div>
                            <h2 class="wow fadeInUp mb-3" data-wow-delay=".2s">Who We Are</h2>
                        </div>

                    </div>
                </div>
            </section>
            <!-- section close -->
            <x-slot name="widget">
                <div class="glass p-4" style="display:none;">
                    <x-hrace009::portal.widget />
                </div>
            </x-slot>

            <section class="no-bottom">
                <div class="container">
                    <div class="row align-items-center gh-5">
                        <div class="col-lg-6 position-relative">
                            <div class="images-deco-1">
                                <img src="{{ asset('img/bg/slider0.webp') }}" class="d-img-1 wow zoomIn" data-wow-delay="0s"
                                    alt="">
                                <img src="{{ asset('images/misc/chara1.webp') }}" class="d-img-2 wow zoomIn" data-wow-delay=".5s"
                                    alt="">
                                <div class="d-img-3 bg-color wow zoomIn" data-wow-delay=".6s"></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="subtitle mb20">PWCR Team</div>
                            <h2 class="wow fadeInUp">Kenapa Server Ini Dibangun ?</h2>
                            <p class="wow fadeInUp">Server ini dibangun atas dasar terlalu banyak <strong>Black Market</strong> di server server private lain</p>
                            <div class="year-card wow fadeInUp">
                                <h1><span class="id-color">25</span></h1>
                                <div class="atr-desc">Years<br>Experience<br>in Perfect World</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="no-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <div class="row gx-5">
                                <div class="col-lg-6 col-md-6 wow fadeInRight" data-wow-delay=".2s">
                                    <h4>Our Vision</h4>
                                    <p>Anti Black Market
                                    </p>
                                </div>
                                <div class="col-lg-6 col-md-6 wow fadeInRight" data-wow-delay=".4s">
                                    <h4>Our Mission</h4>
                                    <p>Menciptakan Environtment PW yang fair play.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="no-bottom wow fadeInUp">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="subtitle mb20">Our solid team</div>
                            <h2 class="mb20 wow fadeInUp">Behind the scene</h2>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6 mb-sm-30">
                            <div class="f-profile text-center">
                                <div class="fp-wrap f-invert">
                                    <div class="fpw-overlay">
                                        <div class="fpwo-wrap">
                                            <div class="fpwow-icons">
                                                <a href="#"><i class="fa-brands fa-facebook fa-lg"></i></a>
                                                <a href="#"><i class="fa-brands fa-twitter fa-lg"></i></a>
                                                <a href="#"><i class="fa-brands fa-linkedin fa-lg"></i></a>
                                                <a href="#"><i class="fa-brands fa-instagram fa-lg"></i></a>
                                                <a href="#"><i class="fa-brands fa-tiktok fa-lg"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fpw-overlay-btm"></div>
                                    <img src="{{ asset('img/user/bgblack.webp') }}" class="fp-image img-fluid" alt="">
                                </div>

                                <h4>Bang Black</h4>
                                Game Master
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6 mb-sm-30">
                            <div class="f-profile text-center">
                                <div class="fp-wrap f-invert">
                                    <div class="fpw-overlay">
                                        <div class="fpwo-wrap">
                                            <div class="fpwow-icons">
                                                <a href="#"><i class="fa-brands fa-facebook fa-lg"></i></a>
                                                <a href="#"><i class="fa-brands fa-twitter fa-lg"></i></a>
                                                <a href="#"><i class="fa-brands fa-linkedin fa-lg"></i></a>
                                                <a href="#"><i class="fa-brands fa-instagram fa-lg"></i></a>
                                                <a href="#"><i class="fa-brands fa-tiktok fa-lg"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fpw-overlay-btm"></div>
                                    <img src="{{ asset('img/user/fik.webp') }}" class="fp-image img-fluid" alt="">
                                </div>

                                <h4>Fikks</h4>
                                Game Developer
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6 mb-sm-30">
                            <div class="f-profile text-center">
                                <div class="fp-wrap f-invert">
                                    <div class="fpw-overlay">
                                        <div class="fpwo-wrap">
                                            <div class="fpwow-icons">
                                                <a href="#"><i class="fa-brands fa-facebook fa-lg"></i></a>
                                                <a href="#"><i class="fa-brands fa-twitter fa-lg"></i></a>
                                                <a href="#"><i class="fa-brands fa-linkedin fa-lg"></i></a>
                                                <a href="#"><i class="fa-brands fa-instagram fa-lg"></i></a>
                                                <a href="#"><i class="fa-brands fa-tiktok fa-lg"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fpw-overlay-btm"></div>
                                    <img src="{{ asset('img/user/jim.webp') }}" class="fp-image img-fluid" alt="">
                                </div>

                                <h4>JIMXØ</h4>
                                Web Developer
                    </div>
                </div>
            </section>
            <div class="spacer-20"></div>
        </div>
        <!-- content close -->
    </x-slot>


</x-hrace009::layouts.portal>