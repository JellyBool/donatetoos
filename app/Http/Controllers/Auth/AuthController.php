<?php

namespace App\Http\Controllers\Auth;

use Socialite;
use App\User;
use App\Http\Controllers\Controller;

/**
 * Class AuthController
 *
 * @package App\Http\Controllers\Auth
 */
class AuthController extends Controller
{

    /**
     * @param $provider
     * @return mixed
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    
    /**
     * @param $provider
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleProviderCallback($provider)
    {

        $user = $this->findOrCreateOAuthUser(
            Socialite::driver($provider)->user(), $provider
        );
        
        auth()->login($user);
        
        return redirect('/');
    }

    /**
     * @param $oauthUser
     * @param $provider
     * @return mixed
     */
    protected function findOrCreateOAuthUser($oauthUser, $provider)
    {
        $user = User::firstOrNew(['provider_id' => $oauthUser->id, 'provider' => $provider]);

        if ($user->exists) return $user;

        $user->fill([
            'name'     => $oauthUser->nickname,
            'password' => bcrypt(str_random(12)),
            'email'    => is_null($oauthUser->email) ? str_random(8).'@youarehelpful.com': $oauthUser->email,
            'avatar'   => $oauthUser->avatar,
        ])->save();

        return $user;
    }
}
