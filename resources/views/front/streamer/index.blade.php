@section('title', ' - Promo Code Streamer')
<x-hrace009.layouts.app>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">Promo Code for Streamer</h1>
            <div>
            </div>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="max-w mx-4 my-2">
            <div class="bg-white dark:bg-primary shadow-md rounded border border-gray-300 dark:border-primary-light justify-items-center">
                <table class="table table-hovered mt-5 w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-primary dark:text-light text-gray-600 uppercase text-xs leading-normal">
                            <th class="px-2 text-left">#</th>
                            <th class="px-2 text-left">Promo Code</th>
                            <th class="px-2 text-left">Streamer Name</th>
                            <th class="px-2 text-left">Terpakai</th>
                            <th class="px-2 text-left">Rewards Cashback</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($promos as $item)
                        <tr class="bg-white dark:bg-primary dark:text-light text-gray-600 text-xs leading-normal hover:bg-dark-100 dark:hover:bg-primary-dark">
                            <td class=" px-2">{{ $loop->iteration }}</td>
                            <td class=" px-2">{{ $item->promo_code }}</td>
                            <td class=" px-2">{{ $item->streamer_name }}</td>
                            <td class=" px-2">{{ $item->rewards ? $item->rewards : '0' }}</td>
                            <td class=" px-2">{{ \App\Models\PromoCode::promoCountersSingle($item->promo_code,Auth::id()) }}</td>
                            <td class=" px-2">@if($item->status == 'active') <span class="text-green-500 p-4 dark:text-green-500 dark:bg-green-100">Active</span>
                                @else <span class="text-red-500 p-4 dark:text-red-500 dark:bg-red-100">Inactive</span>
                                @endif</td>
                        </tr>
                        <dialog id="mEditPromo{{ $item->id }}" class="modal shadow backdrop:backdrop-blur bg-gray-200 dark:bg-dark dark:text-light text-gray-600 uppercase text-xs leading-normal rounded" style="width:500px;">
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
                                            <x-hrace009::input type="text" name="promo_code" id="promo_code" value="{{ $item->promo_code }}" class="uppercase" />
                                        </div>
                                        <div class="mb-4">
                                            <label for="streamer_name" class="form-label">Streamer Name</label>
                                            <x-hrace009::input type="text" name="streamer_name" id="streamer_name" value="{{ $item->streamer_name }}" class="uppercase" />
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

    </x-slot>
</x-hrace009.layouts.app>