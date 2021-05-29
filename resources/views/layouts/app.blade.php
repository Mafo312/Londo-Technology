<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="shadow p-3 mb-5 bg-white btn-sm rounded mt-1">
        <nav class="navbar navbar-expand-sm navbar-light bg-white">
            <a class="navbar-brand" href="/"><i class="fas fa-home" style="color: rgb(9, 142, 230);"></i> Mon carnet d'adresse</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
              <ul class="navbar-nav mr-auto my-2 my-lg-0 navbar-nav-scroll" style="max-height: 100px;">
                <li class="nav-item active">
                </li>
              </ul>
              <form class="d-flex" action="{{ route('seach.index') }}" method="POST">
                @csrf
                <input class="form-control mr-2 btn-sm @error('valeur') is-invalid @enderror" type="search"  name="valeur" placeholder="Recherchez ici..." aria-label="Search">
                @error('valeur')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <button class="btn btn-outline-primary btn-sm" type="submit">Recherche</button>
              </form>
            </div>
        </nav>
    </div>

    <main class="py-4">
        @yield('content')
    </main>
</body>
</html>
