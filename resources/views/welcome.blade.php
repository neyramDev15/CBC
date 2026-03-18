<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>COMPUTER BUSINESS CENTER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#0d3b66; color:white; height:100vh; margin:0;">

    <div class="d-flex justify-content-center align-items-center h-100">

        <div class="text-center">

            <h1 class="mb-4">Bienvenue sur</h1>

            <h2 class="mb-4 moving-text">COMPUTER BUSINESS CENTER</h2>

            <p>Application de gestion de boutique informatique</p>

            <div class="mt-4">

                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-success">
                        Accéder au Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-light me-2">
                        Se connecter
                    </a>

                    <a href="{{ route('register') }}" class="btn btn-warning">
                        S'inscrire
                    </a>
                @endauth

            </div>

        </div>

</body>

<style>
.moving-text {
    display: inline-block;
    white-space: nowrap;
    animation: moveText 6s linear infinite;
    color: #ffd166;
    font-weight: bold;
}

@keyframes moveText {
    0% {
        transform: translateX(-100%);
    }
    100% {
        transform: translateX(100%);
    }
}
</style>

</html>