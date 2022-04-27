<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSpotifyAccesToken
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
        if (!session('spotify_access_token', false)) {
            return response(
                [
                    "status" => 401,
                    "statusText" => "You must be logged in to use the Spotify API"
                ],
                401
            );
        }

        return $next($request);
    }
}
