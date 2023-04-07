<?php

namespace App\Services;

use App\Models\User;
use App\Services\Contracts\SocialInterface;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as SocialUser;
use Exception;

class SocialService implements SocialInterface
{

    public function loginAndGetRedirectUrl(SocialUser $socialUser, string $socialName): string
    {
        $user = User::query()
            ->where('email', '=', $socialUser->getEmail())
            ->first();

        if ($user === null) {
            $user = new User();

            $user->fill([
                'name' => !empty($socialUser->getName()) ? $socialUser->getName() : '',
                'email' => !empty($socialUser->getEmail()) ? $socialUser->getEmail() : '',
                'password' => '',
                'social_id' => !empty($socialUser->getId()) ? $socialUser->getId() : '',
                'type_auth' => $socialName,
                'avatar' => !empty($socialUser->getAvatar()) ? $socialUser->getAvatar() : '',
            ]);

//            return route('register');

        } else {
            $user->name = $socialUser->getName();
            $user->avatar = $socialUser->getAvatar();
            $user->type_auth = $socialName;
            $user->social_id = $socialUser->getId();
        }

        if ($user->save()) {
            Auth::loginUsingId($user->id);

            return route('account');
        }

        throw new Exception('Не удалось сохранить пользователя');
    }
}
