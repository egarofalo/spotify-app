@extends('layouts.app')

@section('title', 'Albumes')

@section('content')
    <div id="app-albums"></div>
@endsection

@section('scripts')
    <script src="{{ asset('js/app.albums.js') }}" defer></script>
@endsection
