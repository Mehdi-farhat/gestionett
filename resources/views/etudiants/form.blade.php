<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Étudiant</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            padding: 30px;
        }

        .card {
            border: 1px solid #dee2e6;
            border-radius: .25rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
        }

        h1 {
            color: #007bff;
        }

        label {
            font-weight: bold;
        }

        .form-control {
            margin-bottom: 15px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #545b62;
            border-color: #545b62;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                @auth
                    <div class="text-end">
                        <span class="fw-bold">Bienvenue, {{ Auth::user()->name }}</span>
                        <a class="btn btn-outline-danger" href="{{ route('logout') }}">Logout</a>
                    </div>
                @endauth
            </div>
            <div class="card-body">
                <h1 class="card-title">Formulaire Étudiant</h1>

                @if(isset($etudiant))
                    <form action="{{ route('etudiants.update', $etudiant->id) }}" method="POST">
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $etudiant->id }}">
                @else
                    <form action="{{ route('etudiants.store') }}" method="POST">
                @endif
                        @csrf

                        <!-- Etudiant fields -->
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom:</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="{{ isset($etudiant) ? $etudiant->nom : '' }}">
                        </div>

                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prénom:</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" value="{{ isset($etudiant) ? $etudiant->prenom : '' }}">
                        </div>

                        <div class="mb-3">
                            <label for="sexe" class="form-label">Sexe:</label>
                            <select class="form-select" id="sexe" name="sexe">
                                <option value="homme" {{ isset($etudiant) && $etudiant->sexe === 'homme' ? 'selected' : '' }}>Homme</option>
                                <option value="femme" {{ isset($etudiant) && $etudiant->sexe === 'femme' ? 'selected' : '' }}>Femme</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="filiere_id" class="form-label">Filière:</label>
                            <select class="form-select" id="filiere_id" name="filiere_id">
                                @foreach($filieres as $filiere)
                                    <option value="{{ $filiere->id }}" @if(isset($etudiant) && $etudiant->filiere_id == $filiere->id) selected @endif>{{ $filiere->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="user[name]" class="form-label">User Name:</label>
                            <input type="text" class="form-control" id="user[name]" name="user[name]" value="{{ isset($etudiant->user) ? $etudiant->user->name : '' }}" placeholder="User Name">
                        </div>

                        <div class="mb-3">
                            <label for="user[email]" class="form-label">User Email:</label>
                            <input type="email" class="form-control" id="user[email]" name="user[email]" value="{{ isset($etudiant->user) ? $etudiant->user->email : '' }}" placeholder="User Email">
                        </div>

                        <div class="mb-3">
                            <label for="user[password]" class="form-label">User Password:</label>
                            <input type="password" class="form-control" id="user[password]" name="user[password]" placeholder="User Password">
                        </div>

                        <button type="submit" class="btn btn-primary">{{ isset($etudiant) ? 'Mettre à jour' : 'Ajouter' }}</button>
                    </form>

                <a href="{{ route('etudiants.index') }}" class="btn btn-secondary mt-3">Liste des Étudiants</a>
            </div>
        </div>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
