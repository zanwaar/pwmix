@section('title', ' - ' . __('auth.form.login') )
<x-hrace009.layouts.guest>
    <x-hrace009::auth.label-title>
        {{ __('auth.form.login') }}
    </x-hrace009::auth.label-title>
    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf
        <div class="field-set">
            <label for="name" class="text-light">Username</label>
            <x-hrace009::input-box id="name" type="text" name="name" :value="old('name')" class="form-control" placeholder="{{ __('auth.form.name') }}" required />
            @error('name')
            <div class="p text-danger">* {{ $message }}</div>
            @enderror
        </div>

        <div class="spacer-10"></div>
        <div class="field-set">
            <label for="password" class="text-light">Password</label>
            <x-hrace009::input-box id="password" type="password" name="password" class="form-control" autocomplete="current-password" placeholder="{{ __('auth.form.password') }}" required />
            @error('password')
        <div class="p text-danger">* {{ $message }}</div>
        @enderror
        </div>
        @if (! Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::twoFactorAuthentication()))
        <x-hrace009::input-box id="pin" type="password" name="pin" required autocomplete="current-pin" class="form-control" placeholder="{{ __('auth.form.pin') }}" />
        @endif
        
        <div class="mt-4">
            <x-hrace009::auth.remember-me class="float-start" />
        </div>
        <div class="spacer-20"></div>
        <div id="submit">
            <input type="submit" id="send_message" value="{{ __('auth.form.login') }}" class="btn-main btn-fullwidth rounded-3" />
        </div>
        
    </form>

</x-hrace009.layouts.guest>