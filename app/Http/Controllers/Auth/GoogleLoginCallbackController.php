<?php

namespace App\Http\Controllers\Auth;


use Laravel\Socialite\Facades\Socialite;

class GoogleLoginCallbackController
{
    public function index()
    {
        $user = Socialite::driver('google')->user();
        return view('google_login_callback', [
            'dato_utente' => [
                'Nome e Cognome' => $user->getName(),
                'Id' => $user->getId(),
                'Email' => $user->getEmail(),
                'Token' => $user->token
            ]
        ]);
    }
}
