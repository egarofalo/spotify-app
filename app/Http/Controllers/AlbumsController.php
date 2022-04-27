<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class AlbumsController extends Controller
{
    public function showPage()
    {
        return view('albums');
    }

    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'artist' => 'required|min:3'
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 422);
        }

        $token = session('spotify_access_token');
        $data = $validator->validated();

        $response = Http::withHeaders([
            'Authorization' => "Bearer {$token}"
        ])->get('https://api.spotify.com/v1/search', [
            'q' => "artist:{$data['artist']}",
            'type' => 'album',
        ]);

        return response($response->json(), $response->status());
    }
}
