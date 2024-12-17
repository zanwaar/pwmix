<x-hrace009::layouts.portal>
    <x-slot name="home">

        <section class="no-top no-bottom position-relative z-1000">
            <div class="v-center">
                <div id="swiper" class="swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide">
                            <div class="swiper-inner" data-bgimage="url(img/bg/slider0.png)">
                                <div class="sw-caption">
                                    <div class="container">
                                        <div class="row gx-5 align-items-center">
                                            <div class="col-lg-8 mb-sm-30">
                                                <div class="subtitle blink mb-4">Servers Are {{ ( $api->online ?
                                                    'Online' : 'Offilen') }}</div>
                                                <h1 class="slider-title text-uppercase mb-1">Galactic Odyssey</h1>
                                            </div>
                                            <div class="col-lg-6">
                                                <p class="slider-text">Aute esse non magna elit dolore dolore dolor
                                                    sit est. Ea occaecat ea duis laborum reprehenderit id cillum
                                                    tempor cupidatat qui nisi proident nostrud dolore.</p>
                                                <div class="sw-price wow fadeInUp">
                                                    <div class="d-starting">
                                                        Starting at
                                                    </div>
                                                    <div class="d-price">
                                                        <span class="d-cur">$</span>
                                                        <span class="d-val">9.99</span>
                                                        <span class="d-period">/monthly</span>
                                                    </div>
                                                </div>
                                                <div class="spacer-10"></div>
                                                <a class="btn-main mb10" href="pricing-table-one.html"><span>Order
                                                        Your Game Server Now</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sw-overlay"></div>
                            </div>
                        </div>

                        <!-- Slides -->
                        <div class="swiper-slide">
                            <div class="swiper-inner" data-bgimage="url(img/bg/slider0.jpg)">
                                <div class="sw-caption">
                                    <div class="container">
                                        <div class="row gx-5 align-items-center">
                                            <div class="col-lg-8 mb-sm-30">
                                                <div class="subtitle blink mb-4">Servers Are Available</div>
                                                <h1 class="slider-title text-uppercase mb-1">Mystic Racing</h1>
                                            </div>
                                            <div class="col-lg-6">
                                                <p class="slider-text">Aute esse non magna elit dolore dolore dolor
                                                    sit est. Ea occaecat ea duis laborum reprehenderit id cillum
                                                    tempor cupidatat qui nisi proident nostrud dolore.</p>
                                                <div class="sw-price wow fadeInUp">
                                                    <div class="d-starting">
                                                        Starting at
                                                    </div>
                                                    <div class="d-price">
                                                        <span class="d-cur">$</span>
                                                        <span class="d-val">12.99</span>
                                                        <span class="d-period">/monthly</span>
                                                    </div>
                                                </div>
                                                <div class="spacer-10"></div>
                                                <a class="btn-main mb10" href="pricing-table-one.html"><span>Order
                                                        Your Game Server Now</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sw-overlay"></div>
                            </div>
                        </div>

                        <!-- Slides -->
                        <div class="swiper-slide">
                            <div class="swiper-inner" data-bgimage="url(img/bg/slider2.jpg)">
                                <div class="sw-caption">
                                    <div class="container">
                                        <div class="row gx-5 align-items-center">
                                            <div class="col-lg-8 mb-sm-30">
                                                <div class="subtitle blink mb-4">Servers Are Available</div>
                                                <h1 class="slider-title text-uppercase mb-1">Silent Wrath</h1>
                                            </div>
                                            <div class="col-lg-6">
                                                <p class="slider-text">Aute esse non magna elit dolore dolore dolor
                                                    sit est. Ea occaecat ea duis laborum reprehenderit id cillum
                                                    tempor cupidatat qui nisi proident nostrud dolore.</p>
                                                <div class="sw-price wow fadeInUp">
                                                    <div class="d-starting">
                                                        Starting at
                                                    </div>
                                                    <div class="d-price">
                                                        <span class="d-cur">$</span>
                                                        <span class="d-val">14.99</span>
                                                        <span class="d-period">/monthly</span>
                                                    </div>
                                                </div>
                                                <div class="spacer-10"></div>
                                                <a class="btn-main mb10" href="pricing-table-one.html"><span>Order
                                                        Your Game Server Now</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sw-overlay"></div>
                            </div>
                        </div>

                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>

                    <!-- If we need scrollbar -->
                    <div class="swiper-scrollbar"></div>
                </div>
            </div>
        </section>

        <section class="no-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="subtitle wow fadeInUp mb-3">Incredibly features</div>
                        <h2 class="wow fadeInUp mb20" data-wow-delay=".2s">Premium Game Server</h2>
                    </div>

                    <div class="col-lg-6"></div>

                    <div class="col-lg-3 col-md-6 mb-sm-20 wow fadeInRight" data-wow-delay="0s">
                        <div>
                            <img src="images/icons/1.png" class="mb20" alt="">
                            <h4>Super Quick Setup</h4>
                            <p>Dolor minim in pariatur in deserunt laboris eu pariatur labore excepteur cupidatat
                                cupidatat duis dolor in.</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-sm-20 wow fadeInRight" data-wow-delay=".2s">
                        <div>
                            <img src="images/icons/2.png" class="mb20" alt="">
                            <h4>Premium Hardware</h4>
                            <p>Dolor minim in pariatur in deserunt laboris eu pariatur labore excepteur cupidatat
                                cupidatat duis dolor in.</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-sm-20 wow fadeInRight" data-wow-delay=".4s">
                        <div>
                            <img src="images/icons/3.png" class="mb20" alt="">
                            <h4>DDos Protection</h4>
                            <p>Dolor minim in pariatur in deserunt laboris eu pariatur labore excepteur cupidatat
                                cupidatat duis dolor in.</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-sm-20 wow fadeInRight" data-wow-delay=".6s">
                        <div>
                            <img src="images/icons/4.png" class="mb20" alt="">
                            <h4>Fast Support</h4>
                            <p>Dolor minim in pariatur in deserunt laboris eu pariatur labore excepteur cupidatat
                                cupidatat duis dolor in.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="no-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 wow fadeInRight" data-wow-delay=".2s"">
                        <div class=" padding60 sm-padding40 sm-p-2 jarallax position-relative">
                        <img src="images/background/1.webp" class="jarallax-img" alt="">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="subtitle wow fadeInUp mb-3">Start your game</div>
                                <h2 class="wow fadeInUp" data-wow-delay=".2s">Unlock Your Gaming Full Potential
                                </h2>
                                <p class="wow fadeInUp">Aute esse non magna elit dolore dolore dolor sit est. Ea
                                    occaecat ea duis laborum reprehenderit id cillum tempor cupidatat qui nisi
                                    proident nostrud dolore id do eiusmod. Lorem ipsum non labore.</p>
                                <div class="spacer-10"></div>
                                <a class="btn-main mb10 wow fadeInUp" href="{{ url('start-now')}}"><span>Start
                                        Now</span></a>
                            </div>

                            <x-slot name="widget">
                                <div class="glass p-4">
                                    <x-hrace009::portal.widget />
                                </div>
                            </x-slot>
                        </div>

                        <img src="images/misc/chara.png" class="sm-hide position-absolute bottom-0 end-0 wow fadeIn"
                            height="450px" alt="">
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- <div class="clearfix"></div> -->

                    <div class="col-md-23 mb-sm-30 wow fadeInRight" data-wow-delay=".2s">
                        <div class="de_pricing-table type-2">
                            <div class="d-head">
                                <h3 class="block-title">{{ __('widget.table.server_status') }}</h3>
                            </div>
                            <div class="d-location">
                                <h4>Server Location</h4>
                                <select name='Server Location' class="server_location" class="form-control">
                                    <option data-src="images/flags/indonesia.png" selected>
                                        Jakarta, Indonesia
                                    </option>
                                </select>
                            </div>
                            <div class="spacer-5"></div>
                            <div class="d-group">
                                <h4>Player Stats</h4>
                                <ul class="d-list">
                                    <li class="col-12 d-flex">
                                        <div class="col-6">{{ __('widget.players_online') }}
                                        </div>
                                        <div class="col-6" style="text-align:right;">
                                            <span
                                                class="badge {{ $api->online ? $onlinePlayer > 0 ? 'bg-success' : 'bg-danger' : 'bg-danger' }}"
                                                style="float: right;">{{ $api->online ? $onlinePlayer >= 150 ?
                                                $onlinePlayer +
                                                config('pw-config.fakeonline') : $onlinePlayer : 0 }}</span>
                                        </div>
                                    </li>
                                    <li class="col-12 d-flex">
                                        <div class="col-6">{{ __('widget.total_account') }}
                                        </div>
                                        <div class="col-6" style="text-align:right;">
                                            <span class="badge {{ ($totalUser > 0 ? 'bg-success' : 'bg-danger') }}"
                                                style="float: right;">{{ $totalUser
                                                }}</span>
                                        </div>
                                    </li>
                                    <li>DDos Protection</li>
                                    <li>24/7 Customer Support</li>
                                </ul>
                            </div>
                            <div class="d-action">
                                <a href="https://pwcreturn.com/download" class="btn-main opt-1 w-100"><span>Download
                                        Now</span></a>
                                <p>Game Size : 5 GB</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>

        <section class="no-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="subtitle mb20">Customer reviews</div>
                        <h2 class="wow fadeInUp">4.85 out of 5</h2>
                        <div class="spacer-20"></div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="owl-carousel owl-theme wow fadeInUp" id="testimonial-carousel">
                        <div class="item">
                            <div class="de_testi type-2">
                                <blockquote>
                                    <div class="de-rating-ext">
                                        <span class="d-stars">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                    </div>
                                    <p>"I've been using Playhost for my game server needs, and I couldn't be
                                        happier. The server uptime is fantastic, and the customer support team is
                                        always quick to assist with any issues."
                                    </p>
                                    <div class="de_testi_by">
                                        <img alt="" src="images/people/1.jpg"> <span>Michael S.</span>
                                    </div>
                                </blockquote>
                            </div>
                        </div>
                        <div class="item">
                            <div class="de_testi type-2">
                                <blockquote>
                                    <div class="de-rating-ext">
                                        <span class="d-stars">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                    </div>
                                    <p>"Running a game server used to be a hassle, but Playhost makes it easy. The
                                        control panel is user-friendly, and I love how they handle server
                                        maintenance and updates."</p>
                                    <div class="de_testi_by">
                                        <img alt="" src="images/people/2.jpg"> <span>Robert L.</span>
                                    </div>
                                </blockquote>
                            </div>
                        </div>
                        <div class="item">
                            <div class="de_testi type-2">
                                <blockquote>
                                    <div class="de-rating-ext">
                                        <span class="d-stars">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                    </div>
                                    <p>"I've tried several hosting providers in the past, and Playhost is by far the
                                        best. Their server performance is top-notch, and I've never experienced lag
                                        while playing with friends."</p>
                                    <div class="de_testi_by">
                                        <img alt="" src="images/people/3.jpg"> <span>Jake M.</span>
                                    </div>
                                </blockquote>
                            </div>
                        </div>
                        <div class="item">
                            <div class="de_testi type-2">
                                <blockquote>
                                    <div class="de-rating-ext">
                                        <span class="d-stars">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                    </div>
                                    <p>As a new server owner, I was worried about setup and configuration, but
                                        Playhost made it a breeze. They have detailed tutorials and helpful support,
                                        which made the process smooth."</p>
                                    <div class="de_testi_by">
                                        <img alt="" src="images/people/4.jpg"> <span>Alex P.</span>
                                    </div>
                                </blockquote>
                            </div>
                        </div>
                        <div class="item">
                            <div class="de_testi type-2">
                                <blockquote>
                                    <div class="de-rating-ext">
                                        <span class="d-stars">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                    </div>
                                    <p>"The flexibility Playhost offers is incredible. I can easily switch between
                                        game servers or even host multiple games on the same plan. It's a gamer's
                                        dream come true!"</p>
                                    <div class="de_testi_by">
                                        <img alt="" src="images/people/5.jpg"> <span>Carlos R.</span>
                                    </div>
                                </blockquote>
                            </div>
                        </div>
                        <div class="item">
                            <div class="de_testi type-2">
                                <blockquote>
                                    <div class="de-rating-ext">
                                        <span class="d-stars">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                    </div>
                                    <p>"I've been a loyal customer of Playhost for years now. Their dedication to
                                        keeping their hardware up-to-date ensures my gaming experience is always
                                        optimal."</p>
                                    <div class="de_testi_by">
                                        <img alt="" src="images/people/6.jpg"> <span>Edward B.</span>
                                    </div>
                                </blockquote>
                            </div>
                        </div>
                        <div class="item">
                            <div class="de_testi type-2">
                                <blockquote>
                                    <div class="de-rating-ext">
                                        <span class="d-stars">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                    </div>
                                    <p>"When our community needed a reliable server for our esports tournaments, we
                                        turned to Playhost, and they've never let us down. Their servers are perfect
                                        for competitive gaming."</p>
                                    <div class="de_testi_by">
                                        <img alt="" src="images/people/7.jpg"> <span>Daniel H.</span>
                                    </div>
                                </blockquote>
                            </div>
                        </div>
                        <div class="item">
                            <div class="de_testi type-2">
                                <blockquote>
                                    <div class="de-rating-ext">
                                        <span class="d-stars">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                    </div>
                                    <p>"The DDoS protection from Playhost is a lifesaver. We used to get attacked
                                        regularly, but since switching to their servers, we haven't had any
                                        downtime."</p>
                                    <div class="de_testi_by">
                                        <img alt="" src="images/people/8.jpg"> <span>Bryan G.</span>
                                    </div>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="no-bottom">
            <div class="container">
                <div class="row align-items-center gx-5">
                    <div class="col-lg-6">
                        <img src="images/misc/server.webp" class="img-fluid mb-sm-30 wow fadeIn" alt="">
                    </div>

                    <div class="col-lg-6">
                        <div class="subtitle wow fadeInUp mb-3">Server locations</div>
                        <h2 class="wow fadeInUp" data-wow-delay=".2s"><span class="text-gradient">25</span> servers
                            available worldwide for your game.</h2>
                        <p class="wow fadeInUp">Our collection of game server hosting options encompasses the most
                            in-demand platforms of today. Within our offerings, you'll discover an extensive array
                            of specialized tools and features tailored to each game, all of which we diligently keep
                            up to date in sync with game and mod updates.</p>

                        <ul class="de-server s2 wow fadeInUp">
                            <li>London, England</li>
                            <li>Paris, France</li>
                            <li>Frankut, Germany</li>
                            <li>Amsterdam, Netherlands</li>
                            <li>Stockholm, Sweden</li>
                            <li>Helsinki, Finland</li>
                            <li>Los Angeles, USA</li>
                            <li><a href="locations.html">View all available servers</a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </section>

        <section class="jarallax">
            <img src="images/background/3.webp" class="jarallax-img" alt="">
            <div class="de-gradient-edge-top"></div>
            <div class="de-gradient-edge-bottom"></div>
            <div class="container z-1000">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="subtitle wow fadeInUp mb-3">Most complete</div>
                        <h2 class="wow fadeInUp mb20" data-wow-delay=".2s">Game Collection</h2>
                    </div>
                    <div class="col-lg-6 text-lg-end">
                        <a class="btn-main mb-sm-30" href="game-server-1.html"><span>View all games</span></a>
                    </div>
                </div>
                <div class="row g-4 sequence">
                    <div class="col-lg-3 col-md-6 gallery-item">
                        <div class="de-item wow">
                            <div class="d-overlay">
                                <div class="d-label">
                                    20% OFF
                                </div>
                                <div class="d-text">
                                    <h4>Thunder and City</h4>
                                    <p class="d-price">Starting at <span class="price">$14.99</span></p>
                                    <a class="btn-main btn-fullwidth" href="pricing-table-one.html"><span>Order
                                            Now</span></a>
                                </div>
                            </div>
                            <img src="images/covers/1.webp" class="img-fluid " alt="">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 gallery-item">
                        <div class="de-item wow">
                            <div class="d-overlay">
                                <div class="d-label">
                                    20% OFF
                                </div>
                                <div class="d-text">
                                    <h4>Mystic Racing Z</h4>
                                    <p class="d-price">Starting at <span class="price">$14.99</span></p>
                                    <a class="btn-main btn-fullwidth" href="pricing-table-one.html"><span>Order
                                            Now</span></a>
                                </div>
                            </div>
                            <img src="images/covers/2.webp" class="img-fluid " alt="">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 gallery-item">
                        <div class="de-item wow">
                            <div class="d-overlay">
                                <div class="d-label">
                                    20% OFF
                                </div>
                                <div class="d-text">
                                    <h4>Silent Wrath</h4>
                                    <p class="d-price">Starting at <span class="price">$14.99</span></p>
                                    <a class="btn-main btn-fullwidth" href="pricing-table-one.html"><span>Order
                                            Now</span></a>
                                </div>
                            </div>
                            <img src="images/covers/3.webp" class="img-fluid " alt="">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 gallery-item">
                        <div class="de-item wow">
                            <div class="d-overlay">
                                <div class="d-label">
                                    20% OFF
                                </div>
                                <div class="d-text">
                                    <h4>Funk Dungeon</h4>
                                    <p class="d-price">Starting at <span class="price">$14.99</span></p>
                                    <a class="btn-main btn-fullwidth" href="pricing-table-one.html"><span>Order
                                            Now</span></a>
                                </div>
                            </div>
                            <img src="images/covers/4.webp" class="img-fluid " alt="">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 gallery-item">
                        <div class="de-item wow">
                            <div class="d-overlay">
                                <div class="d-label">
                                    20% OFF
                                </div>
                                <div class="d-text">
                                    <h4>Galactic Odyssey</h4>
                                    <p class="d-price">Starting at <span class="price">$14.99</span></p>
                                    <a class="btn-main btn-fullwidth" href="pricing-table-one.html"><span>Order
                                            Now</span></a>
                                </div>
                            </div>
                            <img src="images/covers/5.webp" class="img-fluid " alt="">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 gallery-item">
                        <div class="de-item wow">
                            <div class="d-overlay">
                                <div class="d-label">
                                    20% OFF
                                </div>
                                <div class="d-text">
                                    <h4>Warfare Legends</h4>
                                    <p class="d-price">Starting at <span class="price">$14.99</span></p>
                                    <a class="btn-main btn-fullwidth" href="pricing-table-one.html"><span>Order
                                            Now</span></a>
                                </div>
                            </div>
                            <img src="images/covers/6.webp" class="img-fluid " alt="">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 gallery-item">
                        <div class="de-item wow">
                            <div class="d-overlay">
                                <div class="d-label">
                                    20% OFF
                                </div>
                                <div class="d-text">
                                    <h4>Raceway Revolution</h4>
                                    <p class="d-price">Starting at <span class="price">$14.99</span></p>
                                    <a class="btn-main btn-fullwidth" href="pricing-table-one.html"><span>Order
                                            Now</span></a>
                                </div>
                            </div>
                            <img src="images/covers/7.webp" class="img-fluid " alt="">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 gallery-item sandbox">
                        <div class="de-item wow">
                            <div class="d-overlay">
                                <div class="d-label">
                                    20% OFF
                                </div>
                                <div class="d-text">
                                    <h4>Starborne Odyssey</h4>
                                    <p class="d-price">Starting at <span class="price">$14.99</span></p>
                                    <a class="btn-main btn-fullwidth" href="pricing-table-one.html"><span>Order
                                            Now</span></a>
                                </div>
                            </div>
                            <img src="images/covers/8.webp" class="img-fluid" alt="">
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="no-top no-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="subtitle wow fadeInUp mb-3">Do you have</div>
                        <h2 class="wow fadeInUp mb20" data-wow-delay=".2s">Any questions?</h2>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-lg-6">
                        <div class="accordion s2 wow fadeInUp">
                            <div class="accordion-section">
                                <div class="accordion-section-title" data-tab="#accordion-a1">
                                    What is game hosting?
                                </div>
                                <div class="accordion-section-content" id="accordion-a1">
                                    <p>Game hosting refers to the process of renting or setting up servers to run
                                        multiplayer online games. These servers allow players to connect and play
                                        together in the same game world.</p>
                                </div>
                                <div class="accordion-section-title" data-tab="#accordion-a2">
                                    Why do I need game hosting?
                                </div>
                                <div class="accordion-section-content" id="accordion-a2">
                                    <p>Game hosting is essential for multiplayer gaming. It provides a dedicated
                                        server where players can join, ensuring a smooth and lag-free gaming
                                        experience. It also allows you to customize game settings and mods.</p>
                                </div>
                                <div class="accordion-section-title" data-tab="#accordion-a3">
                                    How do I choose a game hosting provider?
                                </div>
                                <div class="accordion-section-content" id="accordion-a3">
                                    <p>Consider factors like server location, performance, scalability, customer
                                        support, and price when choosing a game hosting provider. Read reviews and
                                        ask for recommendations from fellow gamers.</p>
                                </div>
                                <div class="accordion-section-title" data-tab="#accordion-a4">
                                    What types of games can I host?
                                </div>
                                <div class="accordion-section-content" id="accordion-a4">
                                    <p>You can host various types of games, including first-person shooters,
                                        role-playing games, survival games, strategy games, and more. The type of
                                        game hosting you need depends on the game's requirements.</p>
                                </div>
                                <div class="accordion-section-title" data-tab="#accordion-a5">
                                    What is server latency or ping?
                                </div>
                                <div class="accordion-section-content" id="accordion-a5">
                                    <p>Server latency or ping measures the time it takes for data to travel between
                                        your computer and the game server. Lower ping values indicate better
                                        responsiveness and less lag.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="accordion s2 wow fadeInUp">
                            <div class="accordion-section">
                                <div class="accordion-section-title" data-tab="#accordion-b1">
                                    How do I manage a game server?
                                </div>
                                <div class="accordion-section-content" id="accordion-b1">
                                    <p>Game server management varies depending on the hosting provider and game
                                        type. Typically, you'll have access to a control panel or command-line
                                        interface to configure settings, mods, and player access.</p>
                                </div>
                                <div class="accordion-section-title" data-tab="#accordion-b2">
                                    Can I run mods on my game server?
                                </div>
                                <div class="accordion-section-content" id="accordion-b2">
                                    <p>Yes, many game hosting providers support mods. You can install and manage
                                        mods to enhance gameplay or customize the game to your liking.</p>
                                </div>
                                <div class="accordion-section-title" data-tab="#accordion-b3">
                                    What is DDoS protection, and do I need it?
                                </div>
                                <div class="accordion-section-content" id="accordion-b3">
                                    <p>DDoS (Distributed Denial of Service) protection helps defend your game server
                                        from malicious attacks that could disrupt gameplay. It's essential for
                                        maintaining server stability, especially for popular games.</p>
                                </div>
                                <div class="accordion-section-title" data-tab="#accordion-b4">
                                    How much does game hosting cost?
                                </div>
                                <div class="accordion-section-content" id="accordion-b4">
                                    <p>Game hosting costs vary depending on the provider, server type, and game.
                                        Prices can range from a few dollars per month for small servers to hundreds
                                        for high-performance dedicated servers.</p>
                                </div>
                                <div class="accordion-section-title" data-tab="#accordion-b5">
                                    Is there 24/7 customer support?
                                </div>
                                <div class="accordion-section-content" id="accordion-b5">
                                    <p>Many reputable game hosting providers offer 24/7 customer support to assist
                                        with technical issues and server management.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="no-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="padding60 sm-padding40 jarallax position-relative">
                            <img src="images/background/2.webp" class="jarallax-img" alt="">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="subtitle wow fadeInUp mb-3">Download now</div>
                                    <h2 class="wow fadeInUp" data-wow-delay=".2s">Manage your server from mobile
                                        device</h2>
                                    <p>Enim sit laborum enim ut in excepteur aliqua consequat est ut aliquip nostrud
                                        sunt deserunt consequat fugiat adipisicing minim aliquip do adipisicing
                                        cupidatat esse ut irure incididunt ullamco dolor laboris anim ea do ut anim.
                                    </p>
                                    <a href="download.html"><img src="images/misc/download-appstore.webp"
                                            class="img-fluid mb-sm-20" alt="download"></a>&nbsp;
                                    <a href="download.html"><img src="images/misc/download-playstore.webp"
                                            class="img-fluid mb-sm-20" alt="download"></a>
                                </div>
                            </div>

                            <img src="images/misc/chara2.png" height="450px"
                                class="sm-hide position-absolute bottom-0 end-0 wow fadeIn" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="no-bottom wow fadeInRight d-flex z-1000 mt-4">
                <div class="de-marquee-list wow">
                    <div class="d-item">
                        <span class="d-item-txt">London</span>
                        <span class="d-item-display">
                            <i class="d-item-block"></i>
                        </span>
                        <span class="d-item-txt">Paris</span>
                        <span class="d-item-display">
                            <i class="d-item-block"></i>
                        </span>
                        <span class="d-item-txt">Frankurt</span>
                        <span class="d-item-display">
                            <i class="d-item-block"></i>
                        </span>
                        <span class="d-item-txt">Amsterdam</span>
                        <span class="d-item-display">
                            <i class="d-item-block"></i>
                        </span>
                        <span class="d-item-txt">Stockholm</span>
                        <span class="d-item-display">
                            <i class="d-item-block"></i>
                        </span>
                        <span class="d-item-txt">Helsinki</span>
                        <span class="d-item-display">
                            <i class="d-item-block"></i>
                        </span>
                        <span class="d-item-txt">Los Angeles</span>
                        <span class="d-item-display">
                            <i class="d-item-block"></i>
                        </span>
                        <span class="d-item-txt">Quebec</span>
                        <span class="d-item-display">
                            <i class="d-item-block"></i>
                        </span>
                        <span class="d-item-txt">Singapore</span>
                        <span class="d-item-display">
                            <i class="d-item-block"></i>
                        </span>
                        <span class="d-item-txt">Sydney</span>
                        <span class="d-item-display">
                            <i class="d-item-block"></i>
                        </span>
                        <span class="d-item-txt">Sau Paulo</span>
                        <span class="d-item-display">
                            <i class="d-item-block"></i>
                        </span>
                        <span class="d-item-txt">Bangkok</span>
                        <span class="d-item-display">
                            <i class="d-item-block"></i>
                        </span>
                        <span class="d-item-txt">Jakarta</span>
                        <span class="d-item-display">
                            <i class="d-item-block"></i>
                        </span>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="subtitle wow fadeInUp mb-3">Payment Methods</div>
                        <h2 class="wow fadeInUp" data-wow-delay=".2s">We accept</h2>
                    </div>
                    <div class="col-lg-6">
                        <div class="row g-4">
                            <div class="col-sm-2 col-4">
                                <div class="p-2 rounded-10" data-bgcolor="rgba(255, 255, 255, .05)">
                                    <img src="images/payments/visa.webp" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="col-sm-2 col-4">
                                <div class="p-2 rounded-10" data-bgcolor="rgba(255, 255, 255, .05)">
                                    <img src="images/payments/mastercard.webp" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="col-sm-2 col-4">
                                <div class="p-2 rounded-10" data-bgcolor="rgba(255, 255, 255, .05)">
                                    <img src="images/payments/paypal.webp" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="col-sm-2 col-4">
                                <div class="p-2 rounded-10" data-bgcolor="rgba(255, 255, 255, .05)">
                                    <img src="images/payments/skrill.webp" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="col-sm-2 col-4">
                                <div class="p-2 rounded-10" data-bgcolor="rgba(255, 255, 255, .05)">
                                    <img src="images/payments/jcb.webp" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="col-sm-2 col-4">
                                <div class="p-2 rounded-10" data-bgcolor="rgba(255, 255, 255, .05)">
                                    <img src="images/payments/american-express.webp" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </x-slot>
    <x-slot name="news">
        @if( $news->items() )
        @foreach( $news as $article )
        <!-- Single News Block -->
        <div class="news-one">
            <div class="row vertical-gutter">
                <div class="col-md-4">
                    <a href="{{ route('show.article', $article->slug) }}" class="angled-img">
                        <div class="img">
                            <img src="{{ asset('uploads/og_image') . '/' . $article->og_image }}" alt="">

                        </div>
                        <!--
                                TODO: For next update, please make rating system on each article
                                <div class="youplay-hexagon-rating youplay-hexagon-rating-small" data-max="10" data-size="50" title="9.1 out of 10"><span>9.1</span></div>
                                -->
                    </a>
                </div>
                <div class="col-md-8">
                    <div class="clearfix">
                        <h3 class="h2 pull-left m-0"><a href="{{ route('show.article', $article->slug ) }}">{{
                                strtoupper($article->title) }}</a>
                        </h3>
                        <span class="date pull-right"><i class="fa fa-calendar"></i> {{ $article->date(
                            $article->created_at ) }}</span>
                    </div>
                    <div class="embed-item">
                        <svg class="svg-inline--fa fa-bookmark fa-w-12 meta-icon" aria-hidden="true" data-prefix="fa"
                            data-icon="bookmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                            data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M0 512V48C0 21.49 21.49 0 48 0h288c26.51 0 48 21.49 48 48v464L192 400 0 512z"></path>
                        </svg><!-- <i class="fa fa-bookmark meta-icon"></i> -->
                        <span class="label label-{{ $article->categoryColor($article->category) }}"><a
                                href="{{ route('show.article.by.category', $article->category) }}">{{
                                __('news.category.' . $article->category) }}</a></span>
                    </div>
                    <div class="tags">
                        <i class="fa fa-tags"></i>
                        @foreach( $article->tags($article->keywords) as $tag )
                        <a href="{{ route( 'show.article.tag', $tag ) }}">{{ $tag }}</a>{{ $loop->last ? '' : ', ' }}
                        @endforeach
                    </div>
                    <div class="description">
                        {{ $article->description }}
                    </div>
                    <a href="{{ route('show.article', $article->slug ) }}" class="btn read-more pull-left">{{
                        __('news.readmore') }}</a>
                </div>
            </div>
        </div>
        <!-- /Single News Block -->
        @endforeach
        @else
        <!-- show something -->
        @endif
        <!-- Pagination -->
        {{ $news->links('vendor.pagination.portal') }}
        <!-- /Pagination -->
    </x-slot>


</x-hrace009::layouts.portal>