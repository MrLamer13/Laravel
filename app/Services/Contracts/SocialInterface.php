<?php

namespace App\Services\Contracts;

use Laravel\Socialite\Contracts\User as SocialUser;

interface SocialInterface
{
    public function loginAndGetRedirectUrl(SocialUser $socialUser, string $socialName):string;
}
