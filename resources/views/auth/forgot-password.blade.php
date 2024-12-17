@section('title', ' - ' . __('auth.form.forgotPassword') )
<x-hrace009.layouts.guest>
    <x-hrace009::auth.label-title>
        {{ __('auth.form.forgotPassword') }}
    </x-hrace009::auth.label-title>
    <x-hrace009::auth.forgot-password-description />
    @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600 text-center text-success">
        {{ session('status') }}
    </div>
    @endif
    <x-hrace009::validation-errors class="mb-4" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
        @csrf
        <x-hrace009::input-box class="form-control" id="email" type="email" name="email" :value="old('email')" required
            autofocus placeholder="{{ __('auth.form.email') }}" />
        @if( config('pw-config.system.apps.captcha') )
        <x-hrace009::captcha />
        @endif
        <div class="spacer-10"></div>
        <x-hrace009::button class="btn-main btn-fullwidth rounded-3">
            {{ __('auth.form.sendLinkPassword') }}
        </x-hrace009::button>
    </form>
</x-hrace009.layouts.guest>