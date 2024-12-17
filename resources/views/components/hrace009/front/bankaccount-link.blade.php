<!-- Members links -->
<div x-data="{ isActive: {{ $status }}, open: {{ $status }} }">
    <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
    <a href="#" @click="$event.preventDefault(); open = !open" class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary" :class="{'bg-primary-100 dark:bg-primary': isActive || open}" role="button" aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
        <span aria-hidden="true">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.59 14.37a6 6 0 0 1-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 0 0 6.16-12.12A14.98 14.98 0 0 0 9.631 8.41m5.96 5.96a14.926 14.926 0 0 1-5.841 2.58m-.119-8.54a6 6 0 0 0-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 0 0-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 0 1-2.448-2.448 14.9 14.9 0 0 1 .06-.312m-2.24 2.39a4.493 4.493 0 0 0-1.757 4.306 4.493 4.493 0 0 0 4.306-1.758M16.5 9a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
            </svg>
        </span>
        <span class="ml-2 text-sm"> Streamer </span>
        <span class="ml-auto" aria-hidden="true">
            <!-- active class 'rotate-180' -->
            <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </span>
    </a>
    <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="{{ __('ranking.title') }}">
        <!-- active & hover classes 'text-gray-700 dark:text-light' -->
        <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
        <a href="{{ route('bankaccount.index') }}" role="menuitem" class="block p-2 text-sm text-gray-{{ $textba }} transition-colors duration-200 rounded-md dark:{{ $lightba }} dark:hover:text-light hover:text-gray-700">
            Bank Account / Ewallet
        </a>
        <a href="{{ route('app.withdraw') }}" role="menuitem" class="block p-2 text-sm text-gray-{{ $textwd }} transition-colors duration-200 rounded-md dark:{{ $lightwd }} dark:hover:text-light hover:text-gray-700">
            Withdraw
        </a>
        <a href="{{ route('app.historyplayertopup') }}" role="menuitem" class="block p-2 text-sm text-gray-{{ $textpt }} transition-colors duration-200 rounded-md dark:{{ $lightpt }} dark:hover:text-light hover:text-gray-700">
            History Player Topup
        </a>
        <a href="{{ route('app.historywd') }}" role="menuitem" class="block p-2 text-sm text-gray-{{ $texthwd }} transition-colors duration-200 rounded-md dark:{{ $lighthwd }} dark:hover:text-light hover:text-gray-700">
            History Withdrawal
        </a>
    </div>
</div>
