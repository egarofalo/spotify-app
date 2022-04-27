<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SetSpotifyAccesToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->has('code')) {
            $clientId = config('spotify.clientId');
            $clientSecret = config('spotify.clientSecret');
            $code = $request->input('code');

            $response = Http::withHeaders([
                'Authorization' => 'Basic ' . base64_encode("{$clientId}:{$clientSecret}")
            ])->asForm()
                ->post('https://accounts.spotify.com/api/token', [
                    'code' => trim($code),
                    'redirect_uri' => route('home'),
                    'grant_type' => 'authorization_code',
                ]);

            session(['spotify_access_token' => $response->json()['access_token']]);
        }

        return $next($request);
    }
}
