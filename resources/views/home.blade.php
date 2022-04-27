@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div id="app-home"></div>
@endsection

@section('scripts')
    <script src="{{ asset('js/app.home.js') }}" defer></script>
@endsection
