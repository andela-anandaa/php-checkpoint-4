<?php

namespace KnowTube\Http\Controllers\Auth;

use Auth;
use Socialite;
use KnowTube\User;
use KnowTube\Http\Requests;
use Illuminate\Http\Request;
use KnowTube\Http\Controllers\Controller;

class SocialAuthController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from Google
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $socialUser = Socialite::driver($provider)->user();

        $nativeUser = User::firstOrNew([
            'email' => $socialUser->email,
        ]);

        $nativeUser = User::where('email', $socialUser->email)->first();
        
        // if the user did not exist in the database save
        // register them.
        if ($nativeUser == null) {
            $nativeUser = new User();
            $nativeUser->email = $socialUser->email;
            $nativeUser->name = $socialUser->name;
            $nativeUser->provider = $provider;
            $nativeUser->provider_id = $socialUser->id;
            $nativeUser->avatar = $socialUser->avatar;

            $nativeUser->save();
        } elseif ($nativeUser->provider !== $provider) {
            // the user may already have an account but
            // is using the wrong provider. We hint at the
            // correct provider.
            return redirect()
                        ->action('Auth\\AuthController@getLogin')
                        ->with("message", "you originally registered with {$nativeUser->provider}!");
        }

        Auth::login($nativeUser);

        return redirect('/');
    }
}
