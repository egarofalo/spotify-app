<?php

namespace App\Http\Controllers;

class SpotifyController extends Controller
{
    public function login()
    {
        $clientId = config('spotify.clientId');
        $redirectUri = route('home');

        return redirect(
            sprintf(
                'https://accounts.spotify.com/authorize?response_type=code&client_id=%s&redirect_uri=%s',
                $clientId,
                $redirectUri
            )
        );
    }
}
