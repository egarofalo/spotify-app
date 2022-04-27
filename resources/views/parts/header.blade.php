<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-xl">
        <a class="navbar-brand" href="{{ route('home') }}">
            {{ config('app.name', 'Spotify API') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        HOME
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('albums') }}">
                        ALBUMES
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<h1 class="page-title">
    @section('title')
        {{ config('app.name', 'Spotify API') }}
    @show
</h1>
