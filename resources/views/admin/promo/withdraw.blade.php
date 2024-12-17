@section('title', ' - History Withdrawal')
<x-hrace009.layouts.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">Withdrawal Streamer</h1>
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
                            <th scope="col">Tanggal</th>
                            <th scope="col">Streamer</th>
                            <th scope="col">Rekening</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Metode</th>
                            <th scope="col">Status</th>
                            <th scope="col">Note</th>
                            <th scope="col">Disetujui</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($histowd as $item)
                        <tr class="dark:bg-primary text-center text-xs">
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->transaction_id }}</td>
                            <td>{{ $item->date }}</td>
                            <td>{{ $item->streamer_name }}</td>
                            <td>{{ $item->bank_type ? $item->bank_type . ' - ' . $item->account_number . ' ( ' . $item->account_name . ' ) ' : 'WebCoin Balance' }}</td>
                            <td>{{ $item->withdrawal_method === 'RUPIAH' ? 'Rp. ' . number_format($item->amount, 0) : number_format($item->amount, 0) }}</td>
                            <td>{{ $item->withdrawal_method }}</td>
                            <td>
                                <span class="
        @if($item->status == 'pending')
            px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800
        @elseif($item->status == 'berhasil')
            px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800
        @elseif($item->status == 'gagal')
            px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800
        @endif
                            ">
                                    {{ $item->status }}
                                </span>
                            </td>

                            <td>{{ $item->comments }}</td>
                            <td>
                                @if($item->withdrawal_method === 'RUPIAH')
                                @if($item->truename)
                                {{ $item->truename }}
                                @else
                                <div class="flex gap-4 justify-center">
                                    <form action="{{ route('admin.withdrawUpdate', $item->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="status" value="berhasil">
                                        <button type="submit" class="rounded-full bg-green-100 text-green-800 p-2">✔️</button>
                                    </form>
                                    <form action="{{ route('admin.withdrawUpdate', $item->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="status" value="gagal">
                                        <button type="submit" class="rounded-full bg-red-100 text-red-800 p-2">❌</button>
                                    </form>
                                </div>

                                @endif
                                @else
                                System
                                @endif
                            </td>


                        </tr>
                        @empty
                        <tr>
                            <td class="dark:bg-primary text-center">History Withdrawal not found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </x-slot>
</x-hrace009.layouts.admin>
