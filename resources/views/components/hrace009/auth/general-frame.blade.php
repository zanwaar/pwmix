<div x-data="setup()" x-init="$refs.loading.classList.add('hidden'); setColors(color);" :class="{ 'blur': blur}">
    {{ $slot }}
</div>
