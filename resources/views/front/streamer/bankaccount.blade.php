@section('title', ' - Bank Account')
<x-hrace009.layouts.app>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">Bank Account / Ewallet</h1>
            <div>
            </div>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="max-w mx-4 my-2">
            @if(Auth::user()->isStreamer())
            <button class="w-full mb-4 px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker w-auto" onclick="mAddBank.showModal()">Add Bank Account</button>
            @endif
            <div class="bg-white dark:bg-primary shadow-md rounded border border-gray-300 dark:border-primary-light justify-items-center p-4">
                <table class="table table-hovered mt-5 w-full table-auto" id="table">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-primary dark:text-light text-gray-600 uppercase text-xs leading-normal">
                            <th scope="col">No</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Tipe Bank / EWallet</th>
                            <th scope="col">Nomor Rekening/ EWallet</th>

                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bankaccount as $item)
                        <tr class="dark:bg-primary text-center text-xs">
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->account_name }}</td>
                            <td>{{ $item->bank_type }}</td>
                            <td>{{ $item->account_number }}</td>

                            <td class="flex gap-4 justify-center">
                                <button class="w-20 my-4 px-4 font-medium text-center text-white transition-colors duration-200 rounded-md bg-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker w-auto" onclick="mEditBank{{ $item->id }}.showModal()">Edit</button>
                                <form action="{{ route('bankaccount.destroy', $item->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="w-20 my-4 px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-red-500 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker w-auto">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <dialog id="mEditBank{{ $item->id }}" class="modal shadow backdrop:backdrop-blur bg-gray-200 dark:bg-dark dark:text-light text-gray-600 uppercase text-xs leading-normal rounded" style="width:500px;">
                            <div class="modal-box">
                                <div class="justify-between flex">
                                    <div>
                                        <h3 class="font-bold text-lg mb-4">Edit Bank Details</h3>
                                    </div>
                                    <div>
                                        <form method="dialog">
                                            <button class="rounded rounded ring">✕</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('bankaccount.update', $item->id) }}" class="" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-4">
                                            <label for="account_name" class="form-label">Nama Lengkap</label>
                                            <x-hrace009::input type="text" name="account_name" id="account_name" value="{{ $item->account_name }}" class="uppercase" />
                                        </div>
                                        <div class="mb-4">
                                            <label for="bank_type" class="form-label">Bank / Ewallet</label>
                                            <x-hrace009::select name="bank_type" id="bank_type" class="uppercase">
                                                <option class="dark:bg-dark" value="BCA" @if($item->bank_type == 'BCA') selected @endif>BCA</option>
                                                <option class="dark:bg-dark" value="BRI" @if($item->bank_type == 'BRI') selected @endif>BRI</option>
                                                <option class="dark:bg-dark" value="BNI" @if($item->bank_type == 'BNI') selected @endif>BNI</option>
                                                <option class="dark:bg-dark" value="BSI" @if($item->bank_type == 'BSI') selected @endif>BSI</option>
                                                <option class="dark:bg-dark" value="DANA" @if($item->bank_type == 'DANA') selected @endif>DANA</option>
                                                <option class="dark:bg-dark" value="OVO" @if($item->bank_type == 'OVO') selected @endif>OVO</option>
                                                </x-hrace009>
                                        </div>
                                        <div class="mb-4">
                                            <label for="account_number" class="form-label">Nomor Rekening / Ewallet</label>
                                            <x-hrace009::input type="text" name="account_number" id="account_number" value="{{ $item->account_number }}" class="uppercase" />
                                        </div>

                                        <x-hrace009::button type="submit" class="mt-4">Save
                                        </x-hrace009::button>
                                    </form>
                                </div>
                            </div>
                        </dialog>
                        @empty
                        <tr>
                            <td class="dark:bg-primary">Bank Account not found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <dialog id="mAddBank" class="modal shadow backdrop:backdrop-blur bg-gray-200 dark:bg-dark dark:text-light text-gray-600 uppercase text-xs leading-normal rounded" style="width:500px;">
            <div class="modal-box">
                <div class="justify-between flex">
                    <div>
                        <h3 class="font-bold text-lg mb-4">Bank Account</h3>
                    </div>
                    <div>
                        <form method="dialog">
                            <button class="rounded rounded ring">✕</button>
                        </form>
                    </div>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('bankaccount.store') }}" class="">
                        @csrf
                        <div class="mb-4">
                            <label for="account_name" class="form-label">Nama Lengkap</label>
                            <x-hrace009::input type="text" name="account_name" id="account_name" placeholder="Nama Lengkap Sesuai Bank" class="uppercase" />
                        </div>
                        <div class="mb-4">
                            <label for="bank_type" class="form-label">Tipe Bank / EWallet</label>
                            <x-hrace009::select name="bank_type" id="bank_type" class="uppercase">
                                <option class="dark:bg-dark" value="BCA">BCA</option>
                                <option class="dark:bg-dark" value="BRI">BRI</option>
                                <option class="dark:bg-dark" value="BNI">BNI</option>
                                <option class="dark:bg-dark" value="BSI">BSI</option>
                                <option class="dark:bg-dark" value="DANA">DANA</option>
                                <option class="dark:bg-dark" value="OVO">OVO</option>
                            </x-hrace009::select>
                        </div>
                        <div class="mb-4">
                            <label for="account_number" class="form-label">Nomor Rekening / EWallet</label>
                            <x-hrace009::input type="text" name="account_number" id="account_number" placeholder="Nomor Rekening / EWallet" class="uppercase" />

                        </div>

                        <x-hrace009::button type="submit" class="mt-4">Save
                        </x-hrace009::button>
                    </form>
                </div>
            </div>
        </dialog>

    </x-slot>
</x-hrace009.layouts.app>
