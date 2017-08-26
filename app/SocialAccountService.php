<?php

namespace App;

use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = Profile::whereProviderUserId($providerUser->getId())->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new Profile([
                'provider_user_id' => $providerUser->getId(),
                
            ]);

            $user = Profile::whereEmail($providerUser->getEmail())->first();

            if (!$user) {

                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }
}