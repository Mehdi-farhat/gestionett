<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Profil</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap">
    <style>
        body {
            background-color: #2c3e50; /* Utilisez la couleur de fond de vos thèmes fournis */
            color: #ecf0f1; /* Utilisez la couleur de texte de vos thèmes fournis */
            font-family: 'Roboto', sans-serif;
        }

        .navbar {
            background-color: #34495e;
            color: #ecf0f1;
            border-bottom: 1px solid #555;
        }

        .container {
            margin-top: 4rem;
        }

        h1 {
            color: #3498db;
        }

        .btn-primary,
        .btn-warning,
        .btn-danger,
        .btn-success,
        .btn-secondary {
            color: #fff;
            border: none;
        }

        .btn-primary:hover,
        .btn-warning:hover,
        .btn-danger:hover,
        .btn-success:hover,
        .btn-secondary:hover {
            opacity: 0.8;
        }

        .btn-modify {
            background-color: #3498db;
        }
    </style>
</head>
<body>
    @auth
        @if(Auth::user()->isAdmin())
            {{-- Administrator View --}}
            {{-- Add Admin View Here if Necessary --}}
        @else
            {{-- Student View --}}
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#" style="color: #ecf0f1;">Bienvenue, {{ Auth::user()->name }}</a>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}" style="color: #ecf0f1;">Déconnexion</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container mt-4">
                <h1>Modifier le Profil</h1>

                <form action="{{ route('etudiants.update', $etudiant->id) }}" method="POST">
                    @method('PUT')
                    @csrf

                    <div class="mb-3">
                        <label for="user[email]" class="form-label">Nouvel Email:</label>
                        <input type="email" class="form-control" id="user[email]" name="user[email]" value="{{ $etudiant->user->email }}" placeholder="Nouvel Email">
                    </div>

                    <div class="mb-3">
                        <label for="user[password]" class="form-label">Nouveau Mot de Passe:</label>
                        <input type="password" class="form-control" id="user[password]" name="user[password]" placeholder="Nouveau Mot de Passe">
                    </div>

                    <button type="submit" class="btn btn-warning btn-modify">Enregistrer les Modifications</button>
                </form>

                <a href="{{ route('etudiants.index') }}" class="btn btn-primary">Retour à la Liste des Étudiants</a>
            </div>
        @endif
    @else
        {{-- Guest View --}}
        {{-- Add Guest View Here if Necessary --}}
    @endauth

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
