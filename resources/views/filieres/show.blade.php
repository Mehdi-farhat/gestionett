<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Détails de la Filière</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <style>
        body {
            background-image: url('{{ asset('images/1.avif') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            color: #000;
            margin: 0; /* Remove default margin */
            padding: 0; /* Remove default padding */
        }

        {
            background-color: #f8f9fa;
        }

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            padding: 30px;
        }

        .btn-secondary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-secondary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-primary,
        .btn-warning,
        .btn-danger {
            color: #fff;
        }
    </style>
</head>
<body>
    @auth
    <div class="container mt-3">
        <p>Welcome, {{ Auth::user()->name }}</p>
    </div>
    @endauth
    
    <div class="container mt-5">
        <p><a href="{{ route('logout') }}" class="btn btn-secondary">Logout</a></p>
        <h1>Détails de la Filière</h1>

        <p><strong>Nom:</strong> {{ $filieres->nom }}</p>

        <a href="{{ route('filiere.index') }}" class="btn btn-primary">Liste des Filières</a>
        <a href="{{ route('filiere.edit', $filieres->id) }}" class="btn btn-warning">Modifier</a>

        <!-- Utilisation d'un formulaire pour la suppression pour des raisons de sécurité -->
        <form action="{{ route('filiere.destroy', $filieres->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cette filière?')">Supprimer</button>
        </form>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
