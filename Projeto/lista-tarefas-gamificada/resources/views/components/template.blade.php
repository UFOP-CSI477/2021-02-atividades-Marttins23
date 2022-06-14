<!doctype html>
<html lang=pt-BR>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>{{ $title }} - TO-DO List</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark justify-content-between">
        <span class="navbar-brand text-white">TO-DO List</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse flex-grow-0" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @auth
                    <li class="nav-item active">
                        <a class="nav-link text-white" href="{{ route('tarefas.index') }}">Tarefas <span class="sr-only">(current)</span></a>
                    </li>
                @endauth
                @auth
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('users.show') }}">Perfil</a>
                    </li>
                    @endauth

                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('users.index') }}">Ranking</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="{{ route('logout') }}">Logout</a>
                    </li>
                @endauth
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="{{ route('login') }}">Login</a>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
</header>
<main>
    <div class="container mt-3">
        <div class="jumbotron">
            <h1> {{ $title }}</h1>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('mensagem'))
            <div class="alert alert-success">
                {{ session('mensagem') }}
            </div>
        @endif

        {{ $slot }}

    </div>
</main>
<footer class="footer bg-secondary mt-auto py-3 fixed-bottom">
    <div class="container">
        <span class="text-white">2022.02 - Trabalho Prático - Web I - Mateus Ferreira Martins </span>
    </div>
</footer>
<script src="https://kit.fontawesome.com/91cdb689ba.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>
