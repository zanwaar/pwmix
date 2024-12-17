<?php

/*
 * @author pwcreturn.com <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright ( c ) 2022.
 */

namespace App\Actions\Fortify;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Features;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Str;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param array $input
     * @return User
     */

    public function create(array $input)
    {
        if (Features::enabled(Features::twoFactorAuthentication())) {
            if (config('pw-config.system.apps.captcha')) {
                Validator::make($input, [
                    'name' => $this->RegisterPageUserNameRules(),
                    'email' => $this->RegisterPageEmailRules(),
                    'phonenumber' => $this->UpdateUserProfileInformationPagePhoneRules(Rule::unique('users')),
                    'password' => $this->RegisterPagePasswordRules(),
                    'truename' => $this->RegisterPageFullNameRules(),
                    'captcha' => $this->captchaRules(),
                    'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
                ])->validate();
            } else {
                Validator::make($input, [
                    'name' => $this->RegisterPageUserNameRules(),
                    'email' => $this->RegisterPageEmailRules(),
                    'phonenumber' => $this->UpdateUserProfileInformationPagePhoneRules(Rule::unique('users')),
                    'password' => $this->RegisterPagePasswordRules(),
                    'truename' => $this->RegisterPageFullNameRules(),
                    'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
                ])->validate();
            }

            return User::create([
                'ID' => (User::all()->count() > 0) ? User::orderBy('ID', 'desc')->first()->ID + 16 : 1024,
                'name' => $input['name'],
                'email' => $input['email'],
                'phonenumber' => $input['phonenumber'],
                'passwd' => Hash::make($input['name'] . $input['password']),
                'passwd2' => Hash::make($input['name'] . $input['password']),
                'answer' => config('app.debug') ? $input['password'] : '',
                'truename' => ucwords($input['truename']),
                'creatime' => Carbon::now(),
                'referral_code' => $input['referral_code'],
                'invite_code' => str_shuffle($input['name']) . Str::random(5),
            ]);
        } else {
            if (config('pw-config.system.apps.captcha')) {
                Validator::make($input, [
                    'name' => $this->RegisterPageUserNameRules(),
                    'email' => $this->RegisterPageEmailRules(),
                    'phonenumber' => $this->UpdateUserProfileInformationPagePhoneRules(Rule::unique('users')),
                    'password' => $this->RegisterPagePasswordRules(),
                    'pin' => $this->RegisterPagePinRules(),
                    'truename' => $this->RegisterPageFullNameRules(),
                    'captcha' => $this->captchaRules(),
                    'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
                ])->validate();
            } else {
                Validator::make($input, [
                    'name' => $this->RegisterPageUserNameRules(),
                    'email' => $this->RegisterPageEmailRules(),
                    'phonenumber' => $this->UpdateUserProfileInformationPagePhoneRules(Rule::unique('users')),
                    'password' => $this->RegisterPagePasswordRules(),
                    'pin' => $this->RegisterPagePinRules(),
                    'truename' => $this->RegisterPageFullNameRules(),
                    'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
                ])->validate();
            }
            return User::create([
                'ID' => (User::all()->count() > 0) ? User::orderBy('ID', 'desc')->first()->ID + 16 : 1024,
                // 'ID' => User::max('ID') + 16,
                'name' => $input['name'],
                'email' => $input['email'],
                'phonenumber' => $input['phonenumber'],
                'passwd' => Hash::make($input['name'] . $input['password']),
                'passwd2' => Hash::make($input['name'] . $input['password']),
                'answer' => config('app.debug') ? $input['password'] : '',
                'qq' => $input['pin'],
                'truename' => ucwords($input['truename']),
                'creatime' => Carbon::now(),
                'referral_code' => $input['referral_code'],
                'invite_code' => str_shuffle($input['name']) . Str::random(5),
            ]);
        }
    }
}
