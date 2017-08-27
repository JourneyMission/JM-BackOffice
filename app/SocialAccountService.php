<?php

namespace App;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\Entities\Profile;

class SocialAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = Profile::whereProfileProviderid($providerUser->getId())
            ->first();

        if ($account) {
            if (Profile::whereProfileProviderid($providerUser->getId())->whereProfileRole(1)->first()) {
                return $account->user;
            }else{
                
            }
        } else {

            $account = new Profile([
                'Profile_ProviderID' => $providerUser->getId(),
                'Profile_Email' => $providerUser->getEmail(),
                'Profile_Name' => $providerUser->getName(),
                'Profile_Role' => 0,
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {

                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName()
                ]);

            }

            $account->user()->associate($user);
            $account->save();
            if (Profile::whereProfileProviderid($providerUser->getId())->whereProfileRole(1)->first()) {
                return $user;
            }else{
                
            }

        }

    }
}