<!-- Refferal Widget -->
<div class="w-64 mb-4">
    <div class="flex-col bg-white rounded-md dark:bg-darker border dark:border-primary">
        <div class="p-2 border-b dark:border-primary">
            <h1 class="text-sm font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                {{ __('widget.table.referral') }}
            </h1>
        </div>
        <span
            class="text-xs font-medium leading-none tracking-wider text-green-500 uppercase dark:text-primary-light my-2 px-2">Referrals
            : {{ $referral_count > 0 ? $referral_count : '0' }} Users</span>
        <div class="flex items-center justify-between">

            <div class="flex flex-row w-full bg-white-100 text-black-700 my-2 mx-2">
                <x-hrace009::input-box id="referral_code" type="text" name="referral_code" class="rounded-l-lg"
                    value="{{ url('/register') }}?ref={{ $invite_code }}" readonly />
                <button
                    class="flex rounded-r-md w-full px-2 py-2 font-medium text-center text-white transition-colors duration-200 bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker w-auto ml-1"
                    id="copyRef">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                    </svg>
                    Copy
                </button>
            </div>
        </div>
    </div>
</div>
<!-- GM's Widget -->
<div class="w-64">
    <div class="flex-col bg-white rounded-md dark:bg-darker border dark:border-primary">
        <div class="p-2 border-b dark:border-primary">
            <h1 class="text-sm font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                {{ __('widget.table.gmonline') }}
            </h1>
        </div>
        <div class="flex align-middle items-center justify-between">
            @if (count($gms) > 0)
                <table id="gm_status" class="w-full table table-auto">
                    <tbody>
                        @foreach ($gms as $gm)
                            <tr>
                                <td class="p-2"><img class="rounded" src="{{ $gm->profile_photo_url }}"
                                        width="48px" height="48px" alt="{{ $gm->truename }}" /></td>
                                <td class="p-2 text-left"> {{ $gm->truename }}</td>
                                <td class="p-2 text-right">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $gm->online() ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $gm->online() ? __('widget.table.field.online') : __('widget.table.field.offline') }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="flex flex-col mx-2 my-2 w-full bg-red-10 border border-red-40 text-red-700 px-4 py-3 rounded"
                    role="alert">
                    <strong class="font-bold">{{ __('widget.nogm.titel') }}</strong>
                    <span>{{ __('widget.nogm.text') }}</span>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Server Status Widget -->
<div class="py-4 w-64">
    <div class="flex flex-col bg-white rounded-md dark:bg-darker border dark:border-primary">
        <div class="flex align-middle items-center justify-between p-2">
            <div>
                <h6
                    class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                    {{ __('widget.server_time') }}
                </h6>
                <span
                    class="text-sm font-semibold">{{ \Carbon\Carbon::now(config('app.timezone'))->translatedFormat('j
                                        F, Y h:i a') }}</span>
            </div>
        </div>
        <div class="flex align-middle items-center justify-between p-2">
            <div>
                <h6
                    class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                    {{ __('widget.fbfp') }}
                </h6>
                <span class="text-xl font-semibold"><a href="{{ config('pw-config.fbfp') }}" target="_blank"><img
                            src="{{ asset('img/facebooklogo.png') }}"
                            alt="{{ config('pw-config.server_name') }}" /></a></span>
            </div>
            <div>
            </div>
        </div>
        <div class="flex align-middle items-center justify-between p-2">
            <div>
                <span class="text-xl font-semibold"><a href="{{ config('pw-config.discord') }}" target="_blank"><img
                            src="{{ asset('img/discordlogo.png') }}" alt="{{ config('pw-config.server_name') }}" />
                    </a></span>
            </div>
        </div>
        <div class="flex align-middle items-center justify-between p-2">
            <div>
                <h6
                    class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                    {{ __('widget.table.server_status') }}
                </h6>
                <span
                    class="inline-block px-2 py-px text-xs {{ $api->online ? 'text-green-500' : 'text-red-500' }} {{ $api->online ? 'bg-green-10' : 'bg-red-10' }} font-semibold rounded-md">
                    {{ $api->online ? 'Online' : 'Offline' }}
                </span>
            </div>
            <div>
                @if ($api->online)
                    <span>
                        <svg class="w-12 h-12 text-gray-300 dark:text-green-50" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2zm0 18c4.42 0 8-3.58 8-8s-3.58-8-8-8-8 3.58-8 8 3.58 8 8 8zm1-8v4h-2v-4H8l4-4 4 4h-3z" />
                        </svg>
                    </span>
                @else
                    <span>
                        <svg class="w-12 h-12 text-gray-300 dark:text-red-50" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2zm0 18c4.42 0 8-3.58 8-8s-3.58-8-8-8-8 3.58-8 8 3.58 8 8 8zm1-8h3l-4 4-4-4h3V8h2v4z" />
                        </svg>
                    </span>
                @endif
            </div>
        </div>
        <div class="flex align-middle items-center justify-between p-2">
            <div>
                <h6
                    class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                    {{ __('widget.players_online') }}
                </h6>
                <span
                    class="text-xl font-semibold">{{ $api->online ? ($onlinePlayer >= 50 ? $onlinePlayer + config('pw-config.fakeonline') : $onlinePlayer) : 0 }}</span>

            </div>

            <div>
                <span>
                    <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="M4 22a8 8 0 1 1 16 0h-2a6 6 0 1 0-12 0H4zm8-9c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4" />
                    </svg>
                </span>
            </div>
        </div>
        <div class="flex align-middle items-center justify-between p-2">
            <div>
                <h6
                    class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                    {{ __('widget.total_account') }}
                </h6>
                <span class="text-xl font-semibold">{{ $totalUser }}</span>
            </div>
            <div>
                <span>
                    <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="M2 22a8 8 0 1 1 16 0h-2a6 6 0 1 0-12 0H2zm8-9c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm8.284 3.703A8.002 8.002 0 0 1 23 22h-2a6.001 6.001 0 0 0-3.537-5.473l.82-1.824zm-.688-11.29A5.5 5.5 0 0 1 21 8.5a5.499 5.499 0 0 1-5 5.478v-2.013a3.5 3.5 0 0 0 1.041-6.609l.555-1.943z" />
                    </svg>
                </span>
            </div>
        </div>
    </div>
</div>
