@section('title', ' - ' . $title )
<x-hrace009::layouts.portal>
    <x-slot name="home">
        @if( $news )


        <!-- content begin -->
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>

            <section id="subheader" class="jarallax pb20">
                <div class="de-gradient-edge-bottom"></div>
                <img src="{{ asset('img/bg/fik.jpg') }}" class="jarallax-img bg-blur" alt="">
                <div class="container z-1000">
                    <div class="row">
                        <div class="col-lg-12 mb-3 text-center">
                            <div class="subtitle wow fadeInUp mb-3">Informasi Server</div>
                            <h2 class="wow fadeInUp mb-0" data-wow-delay=".2s">Berita & Event</h2>
                            <hr class="mt20">
                            <ul id="filters" class="wow fadeInUp" data-wow-delay="0s">
                                <li><a href="#" data-filter="*" class="selected">All News</a></li>
                                @foreach($cats as $cat)
                                <li><a href="#" data-filter=".{{ $cat }}">{{ $cat }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <section class="no-top">
                <div class="container">

                    <div id="gallery" class="row g-4">

                        @foreach($news as $article)
                        <div class="col-lg-4 col-md-6 item {{ $article->category }}">
                            <div class="de-item s2">
                                <div class="d-overlay">
                                    <div class="d-label">
                                        {{ $article->category }}
                                    </div>
                                    <div class="d-text">
                                        <h5><a href="{{ route('show.article', $article->slug) }}" class="text-light">{{ $article->title }}</a></h5>
                                        <p class="d-price">Author <span class="price">{{ ucwords($user->findOrFail($article->author)->truename) }}</span> — <span class="d-price">
                                                {{ \Carbon\Carbon::parse($article->created_at)->translatedFormat('j F, Y') }} </span></p>
                                        <a class="btn-main btn-fullwidth" href="{{ route('show.article', $article->slug) }}"><span>Read More</span></a>
                                    </div>
                                </div>
                                <img src="{{ asset('storage/og_image/' . $article->og_image) }}" class="img-fluid" alt="{{ $article->title }}">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>

            {{-- <section class="no-top">
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
                                        <p>Game hosting refers to the process of renting or setting up servers to run multiplayer online games. These servers allow players to connect and play together in the same game world.</p>
                                    </div>
                                    <div class="accordion-section-title" data-tab="#accordion-a2">
                                        Why do I need game hosting?
                                    </div>
                                    <div class="accordion-section-content" id="accordion-a2">
                                        <p>Game hosting is essential for multiplayer gaming. It provides a dedicated server where players can join, ensuring a smooth and lag-free gaming experience. It also allows you to customize game settings and mods.</p>
                                    </div>                                        
                                    <div class="accordion-section-title" data-tab="#accordion-a3">
                                        How do I choose a game hosting provider?
                                    </div>
                                    <div class="accordion-section-content" id="accordion-a3">
                                        <p>Consider factors like server location, performance, scalability, customer support, and price when choosing a game hosting provider. Read reviews and ask for recommendations from fellow gamers.</p>
                                    </div>
                                    <div class="accordion-section-title" data-tab="#accordion-a4">
                                        What types of games can I host?
                                    </div>
                                    <div class="accordion-section-content" id="accordion-a4">
                                        <p>You can host various types of games, including first-person shooters, role-playing games, survival games, strategy games, and more. The type of game hosting you need depends on the game's requirements.</p>
                                    </div>
                                    <div class="accordion-section-title" data-tab="#accordion-a5">
                                        What is server latency or ping?
                                    </div>
                                    <div class="accordion-section-content" id="accordion-a5">
                                        <p>Server latency or ping measures the time it takes for data to travel between your computer and the game server. Lower ping values indicate better responsiveness and less lag.</p>
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
                                        <p>Game server management varies depending on the hosting provider and game type. Typically, you'll have access to a control panel or command-line interface to configure settings, mods, and player access.</p>
                                    </div>
                                    <div class="accordion-section-title" data-tab="#accordion-b2">
                                        Can I run mods on my game server?
                                    </div>
                                    <div class="accordion-section-content" id="accordion-b2">
                                        <p>Yes, many game hosting providers support mods. You can install and manage mods to enhance gameplay or customize the game to your liking.</p>
                                    </div>
                                    <div class="accordion-section-title" data-tab="#accordion-b3">
                                        What is DDoS protection, and do I need it?
                                    </div>
                                    <div class="accordion-section-content" id="accordion-b3">
                                        <p>DDoS (Distributed Denial of Service) protection helps defend your game server from malicious attacks that could disrupt gameplay. It's essential for maintaining server stability, especially for popular games.</p>
                                    </div>
                                    <div class="accordion-section-title" data-tab="#accordion-b4">
                                        How much does game hosting cost?
                                    </div>
                                    <div class="accordion-section-content" id="accordion-b4">
                                        <p>Game hosting costs vary depending on the provider, server type, and game. Prices can range from a few dollars per month for small servers to hundreds for high-performance dedicated servers.</p>
                                    </div>
                                    <div class="accordion-section-title" data-tab="#accordion-b5">
                                        Is there 24/7 customer support?
                                    </div>
                                    <div class="accordion-section-content" id="accordion-b5">
                                        <p>Many reputable game hosting providers offer 24/7 customer support to assist with technical issues and server management.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section> --}}

        </div>
        <!-- content close -->
        <!-- /Single News Block -->

        @else
        <!-- show something -->
        @endif
        <!-- Pagination -->
        @if($news instanceof \Illuminate\Pagination\LengthAwarePaginator)
        {{ $news->links('vendor.pagination.portal') }}
        @endif
        <!-- /Pagination -->
    </x-slot>
    <x-slot name="widget">
        <div class="glass p-4">
            <x-hrace009::portal.widget />
        </div>
    </x-slot>

</x-hrace009::layouts.portal>
