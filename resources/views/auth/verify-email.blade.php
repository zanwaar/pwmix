<x-hrace009.layouts.guest>
    <x-jet-authentication-card>
        <x-slot name="logo">
        </x-slot>

        <div class="mb-4 text-sm text-gray-900 px-4">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the
            link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 text-success px-4">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div class="text-center">
                    <x-jet-button type="submit" class="btn-main color-2">
                        {{ __('Resend Verification Email') }}
                    </x-jet-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <div class="text-center">
                    <hr>
                    <button type="submit" class="btn btn-sm btn-outline-danger">
                        {{ __('Log Out') }}
                    </button>
                </div>
            </form>
        </div>
    </x-jet-authentication-card>
</x-hrace009.layouts.guest>