<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Filières</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap">
    <style>
        body {
            background-image: url('images/background2.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            color: #000; /* Change text color to black for better visibility */
        }

        .navbar {
            background-color: rgba(0, 0, 0, 0.7);
        }

        .card {
            margin-top: 20px;
            background-color: rgba(236, 240, 241, 0.7);
            border: 1px solid #bdc3c7;
            border-radius: 10px;
        }

        .card-header {
            background-color: #3498db;
            color: black; /* Change text color to black */
            border-bottom: 1px solid #2980b9;
        }

        .btn-custom {
            color: #000; /* Change text color to black */
            background-color: #27ae60;
            border-color: #27ae60;
        }

        .btn-custom:hover {
            color: #000; /* Change text color to black */
            background-color: #219d54;
            border-color: #1e8449;
        }

        .btn-back {
            color: #000; /* Change text color to black */
            background-color: #e74c3c;
            border-color: #e74c3c;
        }

        .btn-back:hover {
            color: #000; /* Change text color to black */
            background-color: #c0392b;
            border-color: #c0392b;
        }

        .logo {
            max-width: 150px; /* Adjust the max-width as needed */
        }
    </style>
</head>
<body>
    @auth
        @if(Auth::user()->isAdmin())
            {{-- Administrator View --}}
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#" style="color: #000;">Welcome, {{ Auth::user()->name }}</a>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}" style="color: #000;">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container mt-4">
                <h1 style="color: black;">Liste des Filières</h1>

                <ul class="list-group">
                    @foreach($filieres as $filiere)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{ route('filiere.show', $filiere->id) }}">
                                {{ $filiere->nom }}
                            </a>
                            <div class="btn-group" role="group">
                                <a href="{{ route('filiere.show', $filiere->id) }}" class="btn btn-primary btn-sm">Détails</a>
                                <a href="{{ route('filiere.edit', $filiere->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                                <form action="{{ route('filiere.destroy', $filiere->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <h2 class="mt-3"><a href="{{ route('filiere.create') }}" class="btn btn-success">Ajouter une filière</a></h2>
                <h2><a href="{{ route('index') }}" class="btn btn-secondary">Accueil</a></h2>
            </div>
        @else
            {{-- Student View --}}
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#" style="color: #000;">Bienvenue, {{ Auth::user()->name }}</a>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}" style="color: #000;">Déconnexion</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container mt-4">
                <h1 style="color: black;">Liste des Filières</h1>

                <ul class="list-group">
                    @foreach($filieres as $filiere)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{ route('filiere.show', $filiere->id) }}">
                                {{ $filiere->nom }}
                            </a>
                            <div class="btn-group" role="group">
                                <a href="{{ route('filiere.show', $filiere->id) }}" class="btn btn-primary btn-sm">Détails</a>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <h2 class="mt-3"><a href="{{ route('index') }}" class="btn btn-secondary">Accueil</a></h2>
            </div>
        @endif
    @else
        {{-- Guest View --}}
        <div class="container mt-4">
            <h1 style="color: black;">Liste des Filières</h1>

            <ul class="list-group">
                @foreach($filieres as $filiere)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="{{ route('filiere.show', $filiere->id) }}">
                            {{ $filiere->nom }}
                        </a>
                        <div class="btn-group" role="group">
                            <a href="{{ route('filiere.show', $filiere->id) }}" class="btn btn-primary btn-sm">Détails</a>
                        </div>
                    </li>
                @endforeach
            </ul>

            <h2 class="mt-3"><a href="{{ route('index') }}" class="btn btn-secondary">Accueil</a></h2>
        </div>
    @endauth

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
