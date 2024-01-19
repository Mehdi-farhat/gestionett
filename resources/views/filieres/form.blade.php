<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Formulaire de Filière</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap">
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
    @auth
        <p>Welcome, {{ Auth::user()->name }}</p>
    @endauth

    <div class="container mt-5">
        <h1>Formulaire de Filière</h1>

        @if(isset($filiere))
            <form action="{{ route('filiere.update', $filiere->id) }}" method="POST">
                @method('PUT')
                <input type="hidden" name="id" value="{{ $filiere->id }}">
        @else
            <form action="{{ route('filiere.store') }}" method="POST">
        @endif
                @csrf
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom de la Filière:</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="{{ isset($filiere) ? $filiere->nom : '' }}">
                </div>

                <button type="submit" class="btn btn-primary">{{ isset($filiere) ? 'Mettre à jour' : 'Ajouter' }}</button>
            </form>

        <a href="{{ route('filiere.index') }}" class="mt-3 btn btn-secondary">Retour à la liste des Filières</a>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>