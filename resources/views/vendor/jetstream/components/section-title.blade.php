<div class="md:col-span-1 flex justify-between">
    <div class="px-4 sm:px-0">
        <h3 class="text-lg font-semibold text-gray-500 dark:text-light">{{ $title }}</h3>

        <p class="text-sm text-gray-600 dark:text-light">
            {{ $description }}
        </p>
    </div>

    <div class="px-4 sm:px-0">
        {{ $aside ?? '' }}
    </div>
</div>
