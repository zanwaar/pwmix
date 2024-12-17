<div class="flex justify-between max-w-screen-xl px-8 py-4 mx-auto  mb-6 list-none gap-4">
    <!-- Player Online -->
    <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker mb-4 w-1/2">
        <div>
            <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                Kode Promo :
            </h6>
            <span class="text-xl font-semibold gap-4">{{ $promoCodes ? $promoCodes : ' - ' }}</span>
        </div>
        <div>
            <span
                class="p-2 inline-flex text-lg leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{ \App\Models\PromoCode::promoCounters($promoCodes) ? \App\Models\PromoCode::promoCounters($promoCodes) : '0' }}
                x Digunakan
            </span>
            <span>

            </span>
        </div>
    </div>

    <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker mb-4 w-1/2">
        <div>
            <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                Cashback :
            </h6>
            <span class="text-xl font-semibold">Rp. {{ number_format( $cashback ? $cashback : '0') }}</span>
        </div>
        <div>
            <span>
                <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                </svg>

            </span>
        </div>
    </div>


</div>
