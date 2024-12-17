<!-- content begin -->
<div class="no-bottom no-top" id="content">
    <div id="top"></div>

    <section class="v-center jarallax">
    <div class="de-gradient-edge-top"></div>
        <div class="de-gradient-edge-bottom"></div>
        <img src="{{ asset('img/bg/fik.jpg') }}" class="jarallax-img" alt="">
        <div class="container z-1000">
            <div class="row align-items-center">
                <div class="col-lg-4 offset-lg-4">
                    <div class="container py-4 px-4 padding40 rounded-10 shadow-soft bg-blur">
                        <!-- Brand -->
                        <x-hrace009::auth.brand>
                        <x-slot name="logo">
                                <div class="text-center">
                                    <x-hrace009::logo />
                                </div>
                            </x-slot>
                        </x-hrace009::auth.brand>
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </section>



</div>
<!-- content close -->