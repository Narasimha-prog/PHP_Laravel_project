<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;


class GoogleAuthController extends Controller
{

    public function redirectToGoogle()
    {
        /** @var \Laravel\Socialite\Two\AbstractProvider $provider */
 

        $provider=Socialite::driver('google');

        return $provider->stateless()->redirect();
    }

    public function handleGoogleCallback()
    {
         /** @var \Laravel\Socialite\Two\AbstractProvider $provider */
          $provider=Socialite::driver('google');

        $googleUser = $provider->stateless()->user();

        // find or create user in your DB
        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'google_id' => $googleUser->getId(),
                'password' => bcrypt(Str::random(16)), // optional
            ]
        );

        // generate API token (e.g. Sanctum, Passport) for your SPA
        $token = $user->createToken('google_login')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ]);
    }

}
