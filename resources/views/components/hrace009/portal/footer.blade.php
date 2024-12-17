<footer>
            <div class="container">
                <div class="row gx-5">
                    <div class="col-lg-4">
                    @if(config('pw-config.logo') === 'img/logo/logo.png')
                        <img width="128px" height="128px" src="{{ asset(config('pw-config.logo')) }}" {{ $attributes }}>
                    @else
                        <img width="128px" height="128px" src="{{ asset('uploads/logo/' . config('pw-config.logo')) }}" {{ $attributes }}>
                    @endif
                        <div class="spacer-20"></div>
                        <p>Tidak peduli seberapa gelapnya malam, pagi selalu datang, dan perjalanan kita dimulai kembali.</p>
                    </div>
                    <div class="col-lg-4">
                    </div>
                    <div class="col-lg-4">
                        <div class="widget">
                            <h5>Newsletter</h5>
                            <form action="blank.php" class="row form-dark" id="form_subscribe" method="post" name="form_subscribe">
                                <div class="col text-center">
                                    <input class="form-control" id="txt_subscribe" name="txt_subscribe" placeholder="enter your email" type="text" > <a href="#" id="btn-subscribe"><i class="arrow_right bg-color-secondary"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                            <div class="spacer-10"></div>
                            <small>Your email is safe with us. We don't spam.</small>
                            <div class="spacer-30"></div>
                            <div class="widget">
                                <h5>Follow Us on</h5>
                                <div class="social-icons">
                                    <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a href="https://discord.gg/" target="_blank"><i class="fa-brands fa-discord"></i></a>
                                    <a href="https://www.instagram.com/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                                    <a href="https://www.tiktok.com/" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="subfooter">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                           Perfect World Game MMORPG
                        </div>
                        <div class="col-lg-6 col-sm-6 text-lg-end text-sm-start">
                            <ul class="menu-simple">
                                <li><a href="#">Terms &amp; Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <audio id="loading" src="song/song2.mp3" autoplay="true" hidden="true" loop="true"></audio>
    <div class="background">
        <div class="img-center">
        </div>
    </div>
    </div>

    <script src="js/main.js"></script>
            </div>
        </footer>