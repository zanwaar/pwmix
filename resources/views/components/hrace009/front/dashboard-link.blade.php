<!-- Dashboards links -->
<div x-data="{ isActive: {{ $status }}, open: {{ $status }} }">
    <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
    <section id="subheader" class="jarallax">
                <div class="de-gradient-edge-bottom"></div>
             <div class="flex items-center justify-center py-4 px-8 text-center">
                <img id="current_logo" src="
                @if( config('pw-config.logo') === 'img/logo/logo.png' )
                    {{ asset(config('pw-config.logo')) }}
                    @elseif( ! config('pw-config.logo') )
                    {{ asset( 'img/logo/logo.png' ) }}
                    @else
                    {{ asset('uploads/logo/' . config('pw-config.logo') ) }}
                @endif
                "
                 alt="{{ config('pw-config.server_name') }}" class="w-full max-w-xs" />
             </div>
                <div class="container z-500">
                    <div class="row">
                        </div>
                        <audio id="loading" src="song/song2.mp3" autoplay="true" hidden="true" loop="true"></audio>
    <div class="background">
        <div class="img-center">
        </div>
    </div>
    </div>

    <script src="js/main.js"></script>
    <a
        href="{{ route('app.dashboard') }}"
        class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
        :class="{'bg-primary-100 dark:bg-primary': isActive || open}"
        role="button"
        aria-haspopup="true"
        :aria-expanded="(open || isActive) ? 'true' : 'false'"
    >
                  <span aria-hidden="true">
                    <svg
                        class="w-5 h-5"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                      <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                      />
                    </svg>
                  </span>
        <span class="ml-2 text-sm"> {{ __('general.menu.dashboard') }} </span>
    </a>
</div>
