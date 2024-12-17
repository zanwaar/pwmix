@section('title', ' - Withdraw Ballance')
<x-hrace009.layouts.app>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">Withdraw Streamer</h1>
        </div>
    </x-slot>

    <x-slot name="content">
    @if(Auth::user()->isStreamer())
        @if ($errors->any())
        <div class="p-4 text-red-500">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="flex w-full col gap-6">
            <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker mb-4 w-full">
                <div>
                    <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                        All Time Cashback :
                    </h6>
                    <span class="text-xl font-semibold">Rp. {{ number_format($alltimeballance ? $alltimeballance*0.1 : '0') }}</span>
                </div>
                <div>
                    <span>
                        <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                        </svg>

                    </span>
                </div>
            </div>
            <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker mb-4 w-full">
                <div>
                    <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                        Penarikan IDR Berhasil :
                    </h6>
                    <span class="text-xl font-semibold">Rp. {{ number_format($wdsuccessrp ? $wdsuccessrp : '0') }}</span>
                </div>
                <div>
                    <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                        Penarikan Coin Berhasil :
                    </h6>
                    <span class="text-xl font-semibold">{{ number_format($wdsuccesscn ? $wdsuccesscn : '0') }} Coin</span>
                </div>
            </div>
        </div>
        <form action="{{ route('app.withdrawPost') }}" method="post">
            @csrf
            <div class="flex w-full gap-6 col">
                <div class="flex items-center justify-center bg-white rounded-md dark:bg-darker p-6 w-full ">
                    <div>
                        <h6 class="text-lg mb-4 font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                            Saldo Tersedia :
                        </h6>
                        <span class="text-2xl font-semibold">Rp. {{ number_format($ballance ? $ballance : '0') }}</span>
                    </div>
                </div>
                <div class="items-center justify-between bg-white rounded-md dark:bg-darker p-6 w-full ">

                    <div class="col">
                        <div class="mb-4 flex items-center">
                            <label for="metode" class="form-label w-1/2">Metode Withdraw</label>
                            <x-hrace009::select name="metode" id="metode" class="uppercase" id="metodeWD" required>
                                <option class="dark:bg-dark" selected disabled>Pilih Metode Penarikan</option>
                                <option class="dark:bg-dark" value="RUPIAH">RUPIAH</option>
                                <option class="dark:bg-dark" value="COIN">COIN ( Convert Automatis ke Web Coin )
                                </option>
                                </x-hrace009>
                        </div>
                    </div>
                    <div class="col" id="rekening">
                        <div class="mb-4 flex items-center">
                            <label for="bankaccount_id" class="form-label w-1/2">Pilih Rekening</label>
                            <x-hrace009::select name="bankaccount_id" id="bankaccount_id" class="uppercase">
                                <option class="dark:bg-dark" value="0" selected disabled> Pilih Rekening </option>
                                @forelse ($rekening as $rek)
                                <option class="dark:bg-dark" value="{{ $rek->id }}">
                                    {{ $rek->bank_type . ' ( ' . $rek->account_number . ' ) - ' . ' ( ' . $rek->account_name . ' )' }}
                                </option>
                                @empty
                                @endforelse
                                </x-hrace009>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="flex-row z-0 group">
                            <div class="flex items-center justify-center">
                                <label for="rp" class="form-label w-1/2">Jumlah Penarikan</label>
                                <x-hrace009::input-with-popover id="rp" class=" uppercase" name="amount" type="number" placeholder="IDR" popover="Input Jumlah Ingin di WD" required max="{{ $ballance }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col" id="coin">
                        <div class="flex-row z-0 group">
                            <div class="flex items-center justify-center">
                                <label for="coins" class="form-label w-1/2">Coin di Peroleh</label>
                                <x-hrace009::input-with-popover class="uppercase" id="coins" type="number" placeholder="Automatis" popover="Perkiraan Coin didapat" max="{{ $ballance * 0.001 }}" />
                            </div>
                        </div>
                    </div>

                    <x-hrace009::button type="submit" id="wdButton" class="w-full mt-6">Withdraw</x-hrace009::button>
                </div>
            </div>
        </form>
        @else
        lo kan bukan streamer bang
        @endif
    </x-slot>
</x-hrace009.layouts.app>
