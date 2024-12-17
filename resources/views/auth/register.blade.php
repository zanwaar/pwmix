@section('title', ' - ' . __('auth.form.register'))
<x-hrace009.layouts.guest>
    <x-hrace009::auth.label-title>
        {{ __('auth.form.register') }}
    </x-hrace009::auth.label-title>
    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf
        @if (request('ref') == '')
        <x-hrace009::input-box class="form-control" id="referral_code" type="hidden" name="referral_code" :value="old('referral_code', request('ref'))" placeholder="Referral Code (dapat dikosongkan)" />
        @else
        <x-hrace009::input-box class="form-control" id="referral_code" type="hidden" name="referral_code" :value="old('referral_code', request('ref'))" placeholder="Referral Code (dapat dikosongkan)" />
        @endif
        <div class="spacer-10"></div>
        <x-hrace009::input-box class="form-control" id="name" type="text" name="name" :value="old('name')" placeholder="{{ __('ID Account') }}" autofocus required autocomplete="name" />
        @error('name')
        <div class="p text-danger">* {{ $message }}</div>
        @enderror
        <div class="spacer-10"></div>
        <x-hrace009::input-box class="form-control" id="email" type="email" name="email" :value="old('email')" placeholder="{{ __('auth.form.email') }}" autofocus required autocomplete="email" />
        @error('email')
        <div class="p text-danger">* {{ $message }}</div>
        @enderror
        <div class="spacer-10"></div>
        <x-hrace009::input-box class="form-control" id="phonenumber" type="phonenumber" name="phonenumber" :value="old('phonenumber')" placeholder="{{ __('auth.form.phonenumber') }}" autofocus required autocomplete="phonenumber" />
        @error('phonenumber')
        <div class="p text-danger">* {{ $message }}</div>
        @enderror
        <div class="spacer-10"></div>
        <x-hrace009::input-box class="form-control" id="password" type="password" name="password" placeholder="{{ __('auth.form.password') }}" autofocus required autocomplete="new-password" />
        @error('password')
        <div class="p text-danger">* {{ $message }}</div>
        @enderror
        <div class="spacer-10"></div>
        <x-hrace009::input-box class="form-control" id="password_confirmation" type="password" name="password_confirmation" placeholder="{{ __('auth.form.confirmPassword') }}" autofocus required autocomplete="new-password" />
        @error('password_confirmation')
        <div class="p text-danger">* {{ $message }}</div>
        @enderror
        @if (!Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::twoFactorAuthentication()))
        <x-hrace009::input-box class="form-control" id="pin" type="password" name="pin" placeholder="{{ __('auth.form.pin') }}" autofocus required autocomplete="new-pin" />
        @endif
        <div class="spacer-10"></div>
        <x-hrace009::input-box class="form-control" id="Full Name" type="text" name="truename" :value="old('truename')" placeholder="{{ __('Your Name') }}" autofocus required autocomplete="truename" />
        @error('truename')
        <div class="p text-danger">* {{ $message }}</div>
        @enderror
    
        <div class="spacer-10"></div>
        <div class="flex items-center justify-between">
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <x-hrace009::auth.tos-agree />
            @endif
        </div>
        <x-hrace009::button class="btn-main btn-fullwidth rounded-3">
            {{ __('auth.form.register') }}
        </x-hrace009::button>
    </form>
    <div class="text-sm text-gray-600 dark:text-gray-400">
        {{ __('auth.form.registered') }} <a href="{{ route('login') }}" class="text-blue-600 hover:underline">{{ __('auth.form.login') }}</a>
    </div>
    <!-- Button trigger modal -->
    
</x-hrace009.layouts.guest>