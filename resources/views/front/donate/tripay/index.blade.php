@section('title', ' - ' . __('donate.title'))
<x-hrace009.layouts.app>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('general.menu.donate.tripay') }}</h1>
        </div>
    </x-slot>

    <x-slot name="content">
        @if( config('tripay.double') )
            <div
                class="flex flex-row z-0 mb-6 w-full group bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded"
                role="alert"
            >
                <span class="block sm:inline">{!! __('donate.double_notice') !!}</span>
            </div>
        @endif
        @if( config('tripay.sandbox') )
            <div
                class="flex flex-row z-0 mb-6 w-full group bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded"
                role="alert"
            >
                <span class="block sm:inline">{!! __('donate.sandboxActive') !!}</span>
            </div>
        @endif
  
        <div class="mx-auto p-4">
            <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">Pilih nominal</h2>
            
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-6">
                @foreach (array_map('trim', explode(',', config('tripay.list'))) as $amount)
                    <button class="option bg-white dark:bg-darker border-2 border-gray-200 dark:border-dark rounded-xl p-4 flex flex-col items-center justify-center transition-colors duration-300 hover:border-cyan dark:hover:border-cyan" data-value="{{ $amount }}">
                        <div class="w-12 h-12 bg-cyan-100 dark:bg-opacity-20 rounded-full flex items-center justify-center mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-cyan dark:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="font-medium text-gray-900 dark:text-white">Rp{{ number_format($amount, 0, ',', '.') }}</span>
                    </button>
                @endforeach
            </div>
            
            
            <div class="bg-white dark:bg-darker border-2 border-gray-200 dark:border-dark rounded-xl p-4 transition-colors duration-300">
                <label for="custom-amount" class="block text-sm font-medium mb-2 text-gray-900 dark:text-white">Atau, ketik sendiri nominalnya</label>
                <div class="flex items-center space-x-2">
                    <input id="custom-amount" class="w-full p-2 border-2 border-gray-200 dark:border-dark rounded-md bg-gray-50 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-cyan dark:focus:ring-cyan" placeholder="Masukkan nominal">
                    <button id="custom-amount-btn" class="px-4 py-2 bg-cyan text-gray-900 dark:text-white rounded-md hover:bg-cyan-dark focus:outline-none focus:ring-2 focus:ring-cyan focus:ring-opacity-50" onclick="return donation_check();">
                        Pilih
                    </button>
                </div>
             
            </div>
            <div class="flex flex-row z-0 mb-6 gap-6 w-full group justify-between p-6">
                <div class="flex flex-row z-0 mb-6 w-1/2 group bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded"
                    role="alert">
                    <span class="block sm:inline">{{ __('donate.tripay.minimum_desc') . ' : ' . config('tripay.minimum')
                        . ' ' . config('pw-config.currency_name') . ' / IDR.' . number_format((config('tripay.minimum')
                        / config('tripay.currency_per')),0,'.','.') }}</span>
                </div>
                @if( config('tripay.bonusess') )
                <div class="flex flex-row z-0 mb-6 w-1/2 group bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded"
                    role="alert">
                    <span class="block sm:inline">{{ __('donate.tripay.frontbonus', ['vc' => config('tripay.bonusess'),
                        'currency' => config('pw-config.currency_name'), 'mingetbonus' => config('tripay.mingetbonus')])
                        }}</span>
                </div>
                @endif
                <div class="flex flex-row z-0 mb-6 w-1/2 group bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded"
                    role="alert">
                    <span class="block sm:inline">{{ __('donate.tripay.maximum_desc') . ' : ' . config('tripay.maximum')
                        . ' ' . config('pw-config.currency_name') . ' / IDR.' . number_format((config('tripay.maximum')
                        / config('tripay.currency_per')),0,'.','.') }}</span>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div id="payment-modal" class="fixed inset-0  bg-black bg-opacity-50 flex items-center justify-center hidden dark:bg-opacity-80 z-20">
            <div class="bg-white dark:bg-darker p-6 rounded-lg w-full max-w-md relative">
                <h3 class="text-xl font-bold mb-4 text-gray-900 dark:text-white">Opsi Pembayaran</h3>
                <div id="coin-result" class="mt-2 text-sm text-gray-700 dark:text-gray-300"></div>

                <div class="space-y-4">
                    <div>
                        <label for="payment-method" class="block text-sm font-medium mb-2 text-gray-900 dark:text-white">
                            Metode Pembayaran
                        </label>
                        <select id="payment-method" class="w-full p-2 border rounded-md dark:bg-gray-700 dark:border-dark text-gray-900 dark:text-white">
                        <option value="">Select Payment Method</option>
                            @foreach($paymentMethods as $method)
                                <option value="{{ $method['code'] }}">{{ $method['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="bonus-voucher" class="block text-sm font-medium mb-2 text-gray-900 dark:text-white">
                            Kode Voucher Bonus
                        </label>
                        <input type="text" id="bonus-voucher" class="w-full p-2 border rounded-md dark:bg-gray-700 dark:border-dark text-gray-900 dark:text-white" placeholder="Masukkan kode voucher">
                    </div>
                    <button id="continue-payment" class="w-full px-4 py-2 bg-cyan text-gray-900 dark:text-white  rounded-md hover:bg-cyan-dark focus:outline-none focus:ring-2 focus:ring-cyan focus:ring-opacity-50 inline-flex items-center justify-center">
                        Lanjutkan Pembayaran
                    </button>
                </div>
            </div>
        </div>


    
    </x-slot>
</x-hrace009.layouts.app>
