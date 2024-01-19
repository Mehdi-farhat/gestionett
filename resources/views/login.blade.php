<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <style>
        body {
            background-image: url('{{ asset('images/background4.avif') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            font-family: 'Arial', sans-serif;
            color: #fff; /* Adjust text color for better visibility on the background */
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8); /* Adjust background color opacity */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            text-align: center; /* Center align the contents */
        }

        .form-control {
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #4caf50;
            border-color: #4caf50;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #45a049;
            border-color: #45a049;
        }

        h1 {
            color: #333333;
        }

        label {
            font-weight: bold;
            color: #333333;
        }

        .form-check-label {
            color: #333333;
        }

        .logo-container {
            margin-bottom: 20px;
        }

        .logo {
            max-width: 300px; /* Adjust the max-width as needed */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="col-md-6 offset-md-3">
            <!-- Logo Section -->
            <div class="logo-container">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
            </div>

            <h1 class="text-center">Log in</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail:</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input id="password" type="password" name="password" class="form-control" required autocomplete="current-password">
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" name="remember" id="remember" class="form-check-input">
                    <label for="remember" class="form-check-label">Remember me</label>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
