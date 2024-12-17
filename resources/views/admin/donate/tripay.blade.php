@section('title', ' - ' . __('donate.title'))
<x-hrace009.layouts.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('donate.tripay.title') }}</h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="max-w-2xl mx-auto mt-6">
            <x-hrace009::admin.validation-error/>
            <form method="post" action="{{ route('admin.donate.tripay.post') }}">
                {!! csrf_field() !!}
                <div class="relative z-0 mb-6 w-full group">
                    <div id="status_switch" class="flex ml-12">
                        <div class="pretty p-switch">
                            <input type="checkbox" id="status" name="status"
                                   value="{{ config('tripay.status') }}"
                                   @if( config('tripay.status') === true ) checked @endif
                                @popper({{ __('donate.tripay.status_desc') }})
                            />
                            <div class="state p-info">
                                <label for="status">
                                    @if( config('tripay.status') === true )
                                        {{ __('donate.on') }}
                                    @else
                                        {{ __('donate.off') }}
                                    @endif</label>
                            </div>
                        </div>
                    </div>
                    <x-hrace009::label for="status_switch">{{ __('donate.status') }}</x-hrace009::label>
                </div>
                @if( config('tripay.status') === true )
                    <div class="relative z-0 mb-6 w-full group">
                        <div id="sandbox_switch" class="flex ml-12">
                            <div class="pretty p-switch">
                                <input type="checkbox" id="sandbox" name="sandbox"
                                       value="{{ config('tripay.sandbox') }}"
                                       @if( config('tripay.sandbox') === true ) checked @endif
                                    @popper({{ __('donate.tripay.sandbox_desc') }})
                                />
                                <div class="state p-info">
                                    <label for="sandbox">
                                        @if( config('tripay.sandbox') === true )
                                            {{ __('donate.on') }}
                                        @else
                                            {{ __('donate.off') }}
                                        @endif</label>
                                </div>
                            </div>
                        </div>
                        <x-hrace009::label for="status_switch">{{ __('donate.sandbox') }}</x-hrace009::label>
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <div id="double_switch" class="flex ml-12">
                            <div class="pretty p-switch">
                                <input type="checkbox" id="double" name="double"
                                       value="{{ config('tripay.double') }}"
                                       @if( config('tripay.double') === true ) checked @endif
                                    @popper({{ __('donate.tripay.double_desc') }})
                                />
                                <div class="state p-info">
                                    <label for="status">
                                        @if( config('tripay.double') === true )
                                            {{ __('donate.on') }}
                                        @else
                                            {{ __('donate.off') }}
                                        @endif</label>
                                </div>
                            </div>
                        </div>
                        <x-hrace009::label for="double_switch">{{ __('donate.tripay.double') }}</x-hrace009::label>
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <x-hrace009::input-with-popover id="merchant_code" name="merchant_code"
                                                        value="{{ config('tripay.merchant_code') }}"
                                                        placeholder=" " :popover="__('donate.tripay.merchant_code_desc')"/>
                        <x-hrace009::label for="va">{{ __('donate.tripay.merchant_code') }}</x-hrace009::label>
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <x-hrace009::input-with-popover id="api_key" name="api_key"
                                                        value="{{ config('tripay.api_key') }}"
                                                        placeholder=" " :popover="__('donate.tripay.apikey_desc')"/>
                        <x-hrace009::label for="secret">{{ __('donate.tripay.apikey') }}</x-hrace009::label>
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <x-hrace009::input-with-popover id="private_key" name="private_key"
                                                        value="{{ config('tripay.private_key') }}"
                                                        placeholder=" " :popover="__('donate.tripay.private_key_desc')"/>
                        <x-hrace009::label for="secret">{{ __('donate.tripay.private_key') }}</x-hrace009::label>
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <x-hrace009::input-with-popover id="returnUrl" name="returnUrl"
                                                        value="{{ config('tripay.returnUrl') }}"
                                                        placeholder=" " :popover="__('donate.tripay.returnUrl_desc')"/>
                        <x-hrace009::label for="returnUrl">{{ __('donate.tripay.returnUrl') }}</x-hrace009::label>
                    <div class="flex flex-row gap-8">
                        <div class="relative z-0 mb-6 w-full group">
                            <x-hrace009::input-with-popover id="refid" name="refid"
                                                            value="{{ config('tripay.refid') }}"
                                                            placeholder=" "
                                                            :popover="__('donate.tripay.refid_desc')"/>
                            <x-hrace009::label
                                for="refid">{{ __('donate.tripay.refid') }}</x-hrace009::label>
                        </div>
                        <div class="relative z-0 mb-6 w-full group">
                            <x-hrace009::input-with-popover id="currency_per" name="currency_per"
                                                            value="{{ config('tripay.currency_per') }}"
                                                            placeholder=" "
                                                            :popover="__('donate.tripay.currency_per_desc', ['coin' => config('pw-config.currency_name'), 'currency' => 'IDR' ])"/>
                            <x-hrace009::label
                                for="currency_per">{{ __('donate.tripay.currency_per', ['coin' => config('pw-config.currency_name'),'currency' => 'IDR' ]) }}</x-hrace009::label>
                        </div>
                        <div class="relative z-0 mb-6 w-full group">
                            <x-hrace009::input-with-popover id="maximum" name="maximum"
                                                            value="{{ config('tripay.maximum') }}"
                                                          
                                                            placeholder=" "
                                                            :popover="__('donate.tripay.maximum_desc')"/>
                            <x-hrace009::label for="maximum">{{ __('donate.tripay.maximum') }}</x-hrace009::label>
                        </div>
                        <div class="relative z-0 mb-6 w-full group">
                            <x-hrace009::input-with-popover id="minimum" name="minimum"
                                                            value="{{ config('tripay.minimum') }}"
                                                            placeholder=" "
                                                            :popover="__('donate.tripay.minimum_desc')"/>
                            <x-hrace009::label for="minimum">{{ __('donate.tripay.minimum') }}</x-hrace009::label>
                        </div>
                    </div>
                    <div class="flex flex-row gap-8">
                        <div class="relative z-0 mb-6 w-full group">
                            <x-hrace009::input-with-popover id="mingetbonus" name="mingetbonus"
                                                            value="{{ config('tripay.mingetbonus') }}"
                                                            placeholder=" "
                                                            type="number"
                                                            :popover="__('donate.tripay.mingetbonus_desc', ['currency' => config('pw-config.currency_name')])"/>
                            <x-hrace009::label
                                for="mingetbonus">{{ __('donate.tripay.mingetbonus') }}</x-hrace009::label>
                        </div>
                        =>
                        <div class="relative z-0 mb-6 w-full group">
                            <x-hrace009::input-with-popover id="bonusess" name="bonusess"
                                                            value="{{ config('tripay.bonusess') }}"
                                                            placeholder=" "
                                                            type="number"
                                                            :popover="__('donate.tripay.bonusess_desc')"/>
                            <x-hrace009::label for="bonusess">{{ __('donate.tripay.bonusess') }}</x-hrace009::label>
                        </div>
                    </div>
                    <div class="flex flex-row gap-8">
                        <div class="relative z-0 mb-6 w-full group">
                            <x-hrace009::input-with-popover id="route" name="route"
                                                            value="{{ config('tripay.route') }}"
                                                            placeholder=" "
                                                           
                                                            :popover="__('donate.tripay.route_desc')"/>
                            <x-hrace009::label
                                for="route">{{ __('donate.tripay.route') }}</x-hrace009::label>
                        </div>
                    </div>
                    <div class="flex flex-row gap-8">
                        <div class="relative z-0 mb-6 w-full group">
                            <x-hrace009::input-with-popover id="list" name="list"
                                                            value="{{ config('tripay.list') }}"
                                                            placeholder=" "
                                                           
                                                            :popover="__('donate.tripay.list_desc')"/>
                            <x-hrace009::label
                                for="route">{{ __('donate.tripay.list') }}</x-hrace009::label>
                        </div>
                    </div>
                 
                
                    <div class="flex flex-row gap-8">
                        <code>Your current Route for Callback is: {{ route('api.tripay') }}</code>
                    </div>
                    <div class="flex flex-row gap-8">
                        <code>NOTE: Please change this route regular to avoid hacking or injection </code>
                    </div>
                @endif
                <!-- Submit Button -->
                <x-hrace009::button-with-popover class="w-auto" popover="{{ __('general.config_save_desc') }}">
                    {{ __('general.Save') }}
                </x-hrace009::button-with-popover>
            </form>
        </div>
    </x-slot>
</x-hrace009.layouts.admin>
