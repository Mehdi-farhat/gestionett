<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Étudiants</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap">
    <style>
        body {
            background-image: url('images/1.avif');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            color: #000; /* Change text color to black for better visibility */
        }

        .navbar {
            background-color: rgba(44, 62, 80, 0.9);
        }

        .card {
            margin-top: 20px;
            background-color: rgba(236, 240, 241, 0.9);
            border: 1px solid #bdc3c7;
            border-radius: 10px;
        }

        .card-header {
            background-color: #3498db;
            color: white;
            border-bottom: 1px solid #2980b9;
        }

        .btn-custom {
            color: #fff;
            background-color: #4CAF50; /* Green */
            border-color: #4CAF50;
        }

        .btn-custom:hover {
            color: #fff;
            background-color: #45a049; /* Darker Green */
            border-color: #45a049;
        }

        .btn-back {
            color: #fff;
            background-color: #e74c3c;
            border-color: #e74c3c;
        }

        .btn-back:hover {
            color: #fff;
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
                    <a class="navbar-brand" href="#" style="color: #fff;">Welcome, {{ Auth::user()->name }}</a>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}" style="color: #fff;">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container mt-4">
                <h1>Liste des Étudiants</h1>

                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $etudiant)
                            <tr>
                                <td>{{ $etudiant->nom }}</td>
                                <td>{{ $etudiant->prenom }}</td>
                                <td>
                                    <a href="{{ route('etudiants.show', $etudiant->id) }}" class="btn btn-primary btn-sm">Détails</a>
                                    <a href="{{ route('etudiants.edit', $etudiant->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                                    <form action="{{ route('etudiants.destroy', $etudiant->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <h2 class="mt-3"><a href="{{ route('etudiants.create') }}" class="btn btn-success">Ajouter un étudiant</a></h2>
                <h2><a href="{{ route('index') }}" class="btn btn-secondary">Retour vers la page d'accueil</a></h2>
            </div>
        @else
            {{-- Student View --}}
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#" style="color: #fff;">Bienvenue, {{ Auth::user()->name }}</a>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}" style="color: #fff;">Déconnexion</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container mt-4">
                <h1>Liste des Étudiants</h1>

                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $etudiant)
                            <tr>
                                <td>{{ $etudiant->nom }}</td>
                                <td>{{ $etudiant->prenom }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <h2><a href="{{ route('index') }}" class="btn btn-secondary">Retour vers la page d'accueil</a></h2>
            </div>
        @endif
    @else
        {{-- Guest View --}}
        <div class="container mt-4">
            <h1>Liste des Étudiants</h1>

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $etudiant)
                        <tr>
                            <td>{{ $etudiant->nom }}</td>
                            <td>{{ $etudiant->prenom }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h2><a href="{{ route('index') }}" class="btn btn-secondary">Retour vers la page d'accueil</a></h2>
        </div>
    @endauth

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>