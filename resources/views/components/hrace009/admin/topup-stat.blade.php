<!-- Player Online -->
<div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
    <div>
        <h6
            class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
            All Transaksi
        </h6>
        <span class="text-xl font-semibold">{{ $alltrx }} Trx / Rp. {{ number_format($sumalltrx, 0) }}</span>
    </div>
    <div>
        <span>
            <svg
                class="w-12 h-12 text-gray-300 dark:text-primary-dark"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                    d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z"
                />
            </svg>

        </span>
    </div>
</div>

<!-- Account Registered -->
<div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
<div>
        <h6
            class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
            Topup Berhasil
        </h6>
        <span class="text-xl font-semibold dark:text-green-500">{{ $trxdone }} Trx / Rp. {{ number_format($sumtrx, 0) }}</span>
    </div>
    <div>
        <span>
            <svg
                class="w-12 h-12 text-gray-300 dark:text-primary-dark"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                    d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941"
                />
            </svg>
        </span>
    </div>
</div>

<!-- Characters Created -->
<div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
<div>
        <h6
            class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
        >
            Topup Gagal/Pending
        </h6>
        <span class="text-xl font-semibold dark:text-red-500">{{ $allfailedtrx }} Trx / Rp. {{ number_format($sumallfailedtrx, 0) }}</span>
    </div>
    <div>
        <span>
            <svg
                class="w-12 h-12 text-gray-300 dark:text-primary-dark"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                    d="M2.25 6 9 12.75l4.286-4.286a11.948 11.948 0 0 1 4.306 6.43l.776 2.898m0 0 3.182-5.511m-3.182 5.51-5.511-3.181"
                />
            </svg>
        </span>
    </div>
</div>

