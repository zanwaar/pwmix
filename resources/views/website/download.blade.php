@section('title', ' - ' . $title)
<x-hrace009::layouts.portal>
    <x-slot name="home">
        <!-- content begin -->
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>
            <!-- section begin -->
            <section id="subheader" class="jarallax">
                <div class="de-gradient-edge-bottom"></div>
                <img src="{{ asset('img/bg/fik.jpg') }}" class="jarallax-img" alt="">
                <div class="container z-1000">
                    <div class="row">
                        <div class="col-lg-12 mb-3 text-center">
                            <div class="subtitle wow fadeInUp mb-3">{{ $title }}</div>
                            <h2 class="wow fadeInUp mb-3" data-wow-delay=".2s">Start Playing Perfect World</h2>
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
            <section class="no-top">
                <div class="container">
                    <div class="row g-4">
                    <div class="col-lg-12 col-md-12">
                            <div class="de-box-cat h-100">
                                <div class="d-subtitle">Register Page : <a href=" {{ url('register') }}" target="_blank" class="nav-link  btn-main">Register</a></div>
                                <div class="d-subtitle">Untuk Extract Game Bisa Menggunakan Winrar Versi Terbaru : <a href="https://www.win-rar.com/download.html?&L=0" target="_blank" class="nav-link btn-main">Download Winrar</a></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="de-box-cat h-100 ">
                                <div class="d-flex gap-4">
                                <i class="fa fa-folder-open-o"></i>
                                <h3>Via GDrive</h3>
                                <div class="d-subtitle">Size : 3.8 GB</div>
                                </div>
                                <div class="py-4">
                                <a href="https://drive.google.com/file/d/1k9qnJ1UHDMGyGLvzgQ74HlobRYuEr6X_/view?usp=sharing" target="_blank" class="btn-main btn-fullwidth nav-link text-light">
                                Download
                                </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-md-6">
                            <div class="de-box-cat h-100 ">
                                <div class="d-flex gap-4">
                                <i class="fa fa-folder-open-o"></i>
                                <h3>Via MediaFire</h3>
                                <div class="d-subtitle">Size : 3.8 GB</div>
                                </div>
                                <div class="py-4">
                                <a href="https://www.mediafire.com/file/ngnrxbt5epyjb5o/Perfect+World+Return+Classic.rar/file" target="_blank" class="btn-main btn-fullwidth nav-link text-light">
                                Download
                                </a>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-lg-6 col-md-6">

                            <div class="de-box-cat h-100">
                                <i class="fa fa-folder-open-o"></i>
                                <a href="https://drive.google.com/file/d/1Vduvtp3OsdGhmytEBcvZLU4Ml1qkCk4f/view?usp=sharing" target="_blank">
                                    <h3>GDrive <span>(Version 1.3.6)</span></h3>
                                </a>
                                <div class="d-subtitle">Size : 3.8 GB</div>
                            </div>
                        </div> -->


                        <div class="spacer-double"></div>

                        <div class="col-lg-12">
                            <div class="padding40 rounded-10" data-bgcolor="rgba(255, 255, 255, .1)">
                                <div class="row align-items-center">
                                    <div class="col-lg-1">
                                        <img src="images/icons/4.png" alt="" class="img-responsive">
                                    </div>
                                    <div class="col-lg-9">
                                        <h4>Cannot find answer? Contact our customer support now.</h4>
                                    </div>
                                    <div class="col-lg-2 text-lg-end">
                                        <a class="btn-main" href="#"><span>Contact Us</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
        <!-- content close -->
    </x-slot>


</x-hrace009::layouts.portal>