<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Étudiant</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <style>
        body {
            background-color: #f4f4f4;
        }

        .navbar {
            background-color: #3498db;
            color: white;
        }

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            padding: 20px;
        }

        h1 {
            color: #3498db;
        }

        p {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .btn-secondary {
            background-color: #2ecc71;
            border-color: #2ecc71;
        }

        .btn-secondary:hover {
            background-color: #27ae60;
            border-color: #27ae60;
        }

        .btn-warning {
            background-color: #f39c12;
            border-color: #f39c12;
        }

        .btn-warning:hover {
            background-color: #d35400;
            border-color: #d35400;
        }

        .btn-danger {
            background-color: #e74c3c;
            border-color: #e74c3c;
        }

        .btn-danger:hover {
            background-color: #c0392b;
            border-color: #c0392b;
        }
    </style>
</head>
<body>
    @auth
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Bienvenue, {{ Auth::user()->name }}</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Déconnexion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    @endauth

    <div class="container">
        <h1>Détails de l'Étudiant</h1>
        <p><strong>Nom:</strong> {{ $etudiant->nom }}</p>
        <p><strong>Prénom:</strong> {{ $etudiant->prenom }}</p>
        <p><strong>Sexe:</strong> {{ $etudiant->sexe }}</p>
        <p><strong>Filière:</strong> {{ $etudiant->filiere->nom }}</p>

        <a href="{{ route('etudiants.index') }}" class="btn btn-secondary">Liste des Étudiants</a>

        <a href="{{ route('etudiants.edit', $etudiant->id) }}" class="btn btn-warning">Modifier</a>
        
        <form action="{{ route('etudiants.destroy', $etudiant->id) }}" method="post" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
