<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:700,600" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            font-family: 'Open Sans', sans-serif;
            background-color: #f4f6f8;
        }
        .container {
            display: flex;
            min-height: 100vh;
        }
        /* Partie gauche */
        .left-side {
            flex: 1;
            background: url('{{ asset("assets/images/loginbg.jpg") }}') no-repeat center center/cover;
            position: relative;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .overlay {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.5);
        }
        .left-content {
            position: relative;
            text-align: center;
            z-index: 2;
        }
        .left-content h1 {
            font-size: 2rem;
            margin-bottom: 10px;
        }
        .left-content p {
            font-size: 1rem;
            opacity: 0.9;
        }

        /* Partie droite */
        .right-side {
            flex: 1;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }
        form {
            width: 100%;
            max-width: 350px;
        }
        h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }
        input {
            width: 100%;
            padding: 12px 15px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            transition: border 0.3s;
        }
        input:focus {
            border-color: #007bff;
            outline: none;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #007bff;
            border: none;
            border-radius: 6px;
            color: white;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }
        button:hover {
            background: #0056b3;
        }
        .error {
            color: red;
            font-size: 13px;
            margin-bottom: 10px;
            text-align: center;
        }

        /* Responsive */
        @media(max-width: 768px) {
            .container {
                flex-direction: column;
            }
            .left-side {
                height: 200px;
            }
            .right-side {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Gauche -->
    <div class="left-side">
        <div class="overlay"></div>
        <div class="left-content">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" style="height: 100px;">


<h1>Centre Jehovah Jireh</h1>
            <h5>Bienvenue</h5>
            <p>Connectez-vous pour accéder à votre espace</p>
        </div>
    </div>

    <!-- Droite -->
    <div class="right-side">
        <form method="post" action="{{ route('handlelogin') }}">
            @csrf
            @method('POST')

            <h2>Espace de connexion</h2>

            @if(Session::get('error_msg'))
                <div class="error">{{ Session::get('error_msg') }}</div>
            @endif

            <input type="email" name="email" placeholder="Adresse email" required>
            <input type="password" name="password" placeholder="Mot de passe" required>

            <button type="submit">Connexion</button>
        </form>
    </div>
</div>
<footer><small>{{Hash::make('azerty')}}</small></footer>
</body>
</html>
