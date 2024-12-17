@section('title', ' - Referrals')
<x-hrace009.layouts.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">Referrals</h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="max-w mx-4 my-2">
            <div class="bg-white dark:bg-primary shadow-md rounded border border-gray-300 dark:border-primary-light justify-items-center dark:text-light p-4 text-md">
                <table class="w-full table-auto" id="table">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-primary dark:text-light text-gray-600 uppercase text-xs leading-normal">
                            <th class="py-3 px-2 text-left">#</th>
                            <th class="py-3 px-2 text-left">Username</th>
                            <th class="py-3 px-2 text-left">Invite Code</th>
                            <th class="py-3 px-2 text-left">Total Invited</th>
                            <!-- <th class="py-3 px-2 text-left">Total Bonus</th> -->
                            <!-- <th class="py-3 px-2 text-left">{{ __('donate.history.table.action') }}</th> -->
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-xs dark:text-light">
                        @foreach($referralCounts as $reff)
                        <tr
                            class="bg-white dark:bg-primary dark:text-light text-gray-600 text-xs leading-normal hover:bg-dark-100 dark:hover:bg-primary-dark">
                            <td class="py-3 px-2">{{ $loop->iteration }}</td>
                            <td class="py-3 px-2">{{ $reff->name }}</td>
                            <td class="py-3 px-2">{{ $reff->invite_code ? $reff->invite_code : '-' }}</td>
                            <td class="py-3 px-2">{{ $reff->count }}</td>
                            <!-- <td class="py-3 px-2">Rp. {{ $reff->matching_count }}</td> -->
                            <!-- <td class="py-3 px-2">
                                <button
                                    class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ring">
                                    Edit
                                </button>
                            </td> -->
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </x-slot>
</x-hrace009.layouts.admin>