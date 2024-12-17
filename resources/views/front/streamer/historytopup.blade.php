@section('title', ' - Bank Account')
<x-hrace009.layouts.app>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">History Player Topup</h1>
            <div>
            </div>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="max-w mx-4 my-2">
           <div class="bg-white dark:bg-primary shadow-md rounded border border-gray-300 dark:border-primary-light justify-items-center p-4">
                <table class="table table-hovered mt-5 w-full table-auto" id="table">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-primary dark:text-light text-gray-600 uppercase text-xs leading-normal">
                            <th scope="col">No</th>
                            <th scope="col">No. Transaksi</th>
                            <th scope="col">Nama Player</th>
                            <th scope="col">Cashback 10%</th>
                            <th scope="col">Waktu Transaksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($histopup as $item)
                        <tr class="dark:bg-primary text-center text-xs">
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ Str::substrReplace($item->reference_id, '***', 16, 3) }}</td>
                            <td>{{ Str::substrReplace($item->truename, '***', 1, 5) }}</td>
                            <td>Rp. {{ number_format(($item->money * 0.1),0) }}</td>
                            <td>{{ $item->created_at }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td class="dark:bg-primary">History Topup not found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </x-slot>
</x-hrace009.layouts.app>
