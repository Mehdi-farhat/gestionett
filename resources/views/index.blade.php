<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page d'accueil</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap">
    <style>
        body {
            background-image: url('{{ asset('images/background1.jpg') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            font-family: 'Roboto', sans-serif;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: rgba(0, 0, 0, 0.7);
            container-fluid:
        }

        .logo-container {
            text-align: right;
            margin-top: 10px; /* Adjusted margin for better alignment */
        }

        .logo {
            max-width: 150px;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            background-color: rgba(0, 0, 0, 0.7);
            border: 1px solid #fff;
            color: #fff;
            margin-bottom: 20px;
        }

        .card-title {
            color: #fff;
        }

        .btn-primary {
            background-color: #fff;
            color: #000;
            border-color: #fff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            color: #fff;
        }

        .display-4 {
            font-weight: 300;
        }

        .navbar-brand,
        .nav-link {
            color: #fff;
            font-weight: bold; /* Added font-weight for better visibility */
        }

        .navbar-toggler-icon {
            background-color: #fff; /* Adjusted color of the toggle icon */
        }

        /* Fixed margin for the container */
        .mt-4 {
            margin-top: 20px;
        }
        .logo-container {
            margin-bottom: 20px;
        }

        .logo {
            max-width: 200px; /* Adjust the max-width as needed */
        }
    </style>
</head>

<body>
     
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <div class="logo-container">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    @auth
                        @if (Auth::user()->isAdmin())
                            <!-- Si l'utilisateur est un administrateur -->
                            <li class="nav-item">
                                <a class="nav-link" href="#" style="color: #fff;">Welcome, {{ Auth::user()->name }}
                                    (Admin)</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}" style="color: #fff;">Logout</a>
                            </li>
                        @else
                            <!-- Si l'utilisateur est un étudiant -->
                            <li class="nav-item">
                                <a class="nav-link" href="#" style="color: #fff;">Welcome, {{ Auth::user()->name }}
                                    (Student)</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}" style="color: #fff;">Logout</a>
                            </li>
                        @endif
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 class="display-4"></h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Liste des Filières</h5>
                        <p class="card-text">Répertoire des Filières.</p>
                        <a href="{{ route('filiere.index') }}" class="btn btn-primary">Liste</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Liste des Étudiants</h5>
                        <p class="card-text">Registre des étudiants</p>
                        <a href="{{ route('etudiants.index') }}" class="btn btn-primary">Liste </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
