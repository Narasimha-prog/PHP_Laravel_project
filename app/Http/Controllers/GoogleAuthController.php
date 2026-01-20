<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;


use Illuminate\Support\Facades\Auth;

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

        Auth::login($user);

        return redirect('http://localhost:5173/dashboard');
   
    }

}
