<!doctype html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        crossorigin="anonymous">

    <title>Controle de Séries</title>
    <style>
        .navbar a {
            color: #fff !important;
            font-weight: bold;
        }

        .navbar a:hover {
            color: red !important;
            font-weight: bold;
        }

    </style>

</head>

<body>

    <div class="row">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-2">


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('listaseries') }}">Home</a>
                        </li>

                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        @auth
                            <a href="/sair" class="btn btn-warning my-2 mr-2 my-sm-0">Sair</a>
                        @endauth
                        @guest
                            <a href="/entrar" class="btn btn-dark my-2 mr-2 my-sm-0">Entrar</a>
                        @endguest
                    </form>
                </div>
            </nav>
        </div>
    </div>
    <div class="container">

        <div class="jumbotron bg-primary text-light mb-5">
            <h1>@yield('cabecalho')</h1>
        </div>

        @yield('conteudo')
    </div>

</body>

</html>
