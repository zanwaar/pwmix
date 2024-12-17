@section('title', ' - Promo Code')
<x-hrace009.layouts.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">Promo Code for Streamer & Affiliator</h1>
            <div>
            </div>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="max-w mx-4 my-2">
            <button
                class="w-full mb-4 px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker w-auto"
                onclick="mAddPromo.showModal()">Create New Promo</button>
            <div
                class="bg-white dark:bg-primary shadow-md rounded border border-gray-300 dark:border-primary-light justify-items-center p-4">
                <table class="table table-hovered mt-5 w-full table-auto" id="table">
                    <thead>
                        <tr
                            class="bg-gray-200 dark:bg-primary dark:text-light text-gray-600 uppercase text-xs leading-normal">
                            <th class="px-2 text-left">#</th>
                            <th class="px-2 text-left">Promo Code</th>
                            <th class="px-2 text-left">Streamer Name</th>
                            <th class="px-2 text-left">Terpakai</th>
                            <th class="px-2 text-left">Cashback</th>
                            <th class="px-2 text-left">Status</th>
                            <th class="px-2 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($promos as $item)
                        <tr
                            class="bg-white dark:bg-primary dark:text-light text-gray-600 text-xs leading-normal hover:bg-dark-100 dark:hover:bg-primary-dark">
                            <td class=" px-2">{{ $loop->iteration }}</td>
                            <td class=" px-2">{{ $item->promo_code }}</td>
                            <td class=" px-2">{{ $item->streamer_name }}</td>
                            <td class=" px-2">{{ \App\Models\PromoCode::promoCounters($item->promo_code) }}</td>
                            <td class=" px-2">Rp. {{ number_format($item->bonuses,0) }}</td>
                            <td class=" px-2">@if($item->status == 'active') <span class="text-green-500 p-4 dark:text-green-500 dark:bg-green-100">Active</span> 
                            @else <span class="text-red-500 p-4 dark:text-red-500 dark:bg-red-100">Inactive</span> 
                            @endif</td>

                            <td class=" flex gap-4">
                                <button
                                    class="w-20 my-4 px-4 font-medium text-center text-white transition-colors duration-200 rounded-md bg-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker w-auto"
                                    onclick="mEditPromo{{ $item->id }}.showModal()">Edit</button>
                                <form action="{{ route('promocode.destroy', $item->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit"
                                        class="w-20 my-4 px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-red-500 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker w-auto">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <dialog id="mEditPromo{{ $item->id }}"
                            class="modal shadow backdrop:backdrop-blur bg-gray-200 dark:bg-dark dark:text-light text-gray-600 uppercase text-xs leading-normal rounded"
                            style="width:500px;">
                            <div class="modal-box">
                                <div class="justify-between flex">
                                    <div>
                                        <h3 class="font-bold text-lg mb-4">Edit Promo Code</h3>
                                    </div>
                                    <div>
                                        <form method="dialog">
                                            <button class="rounded rounded ring">✕</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('promocode.update',$item->id) }}" class="" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-4">
                                            <label for="promo_code" class="form-label">Promo Code</label>
                                            <x-hrace009::input type="text" name="promo_code" id="promo_code"
                                                value="{{ $item->promo_code }}" class="uppercase" />
                                        </div>
                                        <div class="mb-4">
                                            <label for="streamer_name" class="form-label">Streamer Name</label>
                                            <x-hrace009::input type="text" name="streamer_name" id="streamer_name"
                                                value="{{ $item->streamer_name }}" class="uppercase" />
                                        </div>
                                        <div class="mb-4">
                                            <label for="status" class="form-label">Status</label>
                                            <x-hrace009::select name="status" id="status" class="uppercase">
                                                <option value="active" @if($item->status == 'active') selected @endif>Active</option>
                                                <option value="inactive" @if($item->status == 'inactive') selected @endif>Inactive</option>
                                            </x-hrace009>
                                        </div>

                                        <x-hrace009::button type="submit" class="mt-4">Save
                                        </x-hrace009::button>
                                    </form>
                                </div>
                            </div>
                        </dialog>
                        @empty
                        <tr>
                            <td>PromoCode not found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <!-- You can open the modal using ID.showModal() method -->
        <dialog id="mAddPromo"
            class="modal shadow backdrop:backdrop-blur bg-gray-200 dark:bg-dark dark:text-light text-gray-600 uppercase text-xs leading-normal rounded"
            style="width:500px;">
            <div class="modal-box">
                <div class="justify-between flex">
                    <div>
                        <h3 class="font-bold text-lg mb-4">New Promo Code</h3>
                    </div>
                    <div>
                        <form method="dialog">
                            <button class="rounded rounded ring">✕</button>
                        </form>
                    </div>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('promocode.store') }}" class="">
                        @csrf
                        <div class="mb-4">
                            <label for="promo_code" class="form-label">Promo Code</label>
                            <x-hrace009::input type="text" name="promo_code" id="promo_code"
                                placeholder="write promo_code here min:3" class="uppercase" />
                        </div>
                        <div class="mb-4">
                            <label for="streamer_name" class="form-label">Streamer Name</label>
                            <x-hrace009::input type="text" name="streamer_name" id="streamer_name"
                                placeholder="write streamer_name here min:3" class="uppercase" />
                        </div>

                        <x-hrace009::button type="submit" class="mt-4">Save
                        </x-hrace009::button>
                    </form>
                </div>
            </div>
        </dialog>

    </x-slot>
</x-hrace009.layouts.admin>