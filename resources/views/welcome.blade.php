<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMPUTER BUSINESS CENTER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            overflow: hidden;
        }

        /* Arrière-plan Dynamique */
        .carousel-item {
            height: 100vh;
            background: no-repeat center center scroll;
            background-size: cover;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background: rgba(13, 59, 102, 0.75);
            z-index: 1;
        }

        .hero-container {
            position: relative;
            z-index: 2;
            color: white;
        }

        /* --- LE LOGO ANIMÉ --- */
        .logo-box {
            width: 100px;
            height: 100px;
            background: rgba(255, 209, 102, 0.1);
            border: 2px solid #ffd166;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            position: relative;
            animation: pulse-glow 2s infinite alternate;
        }

        .logo-box i {
            font-size: 3rem;
            color: #ffd166;
            animation: rotate-hardware 4s infinite linear;
        }

        @keyframes pulse-glow {
            from {
                box-shadow: 0 0 10px rgba(255, 209, 102, 0.2);
                transform: scale(1);
            }

            to {
                box-shadow: 0 0 30px rgba(255, 209, 102, 0.6);
                transform: scale(1.05);
            }
        }

        @keyframes rotate-hardware {
            0% {
                transform: rotateY(0deg);
            }

            50% {
                transform: rotateY(180deg);
            }

            100% {
                transform: rotateY(360deg);
            }
        }

        /* ---------------------- */

        .main-title {
            font-weight: 800;
            letter-spacing: 2px;
            color: #ffd166;
            text-transform: uppercase;
        }

        .btn-custom {
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-transform: uppercase;
        }

        .btn-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.4);
        }

        .fade-in-up {
            animation: fadeInUp 1s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active"
                style="background-image: url('https://images.unsplash.com/photo-1587202372775-e229f172b9d7?q=80&w=1920&auto=format&fit=crop');">
            </div>
            <div class="carousel-item"
                style="background-image: url('https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?q=80&w=1920&auto=format&fit=crop');">
            </div>
            <div class="carousel-item"
                style="background-image: url('https://images.unsplash.com/photo-1550745165-9bc0b252726f?q=80&w=1920&auto=format&fit=crop');">
            </div>
        </div>
        <div class="overlay"></div>
    </div>

    <div class="position-absolute top-50 start-50 translate-middle text-center w-100 hero-container p-3">
        <div class="fade-in-up">

            <div class="logo-box">
                <i class="fas fa-microchip"></i>
            </div>

            <p class="lead mb-1 fw-light text-uppercase tracking-widest">Expertise Informatique & Vente</p>
            <h1 class="display-3 main-title mb-4">Computer Business Center</h1>

            <p class="mb-5 fs-5 mx-auto" style="max-width: 700px; color: rgba(255,255,255,0.8);">
                Pilotez votre activité avec une solution de gestion intelligente et robuste.
            </p>

            <div class="d-flex justify-content-center gap-3">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-success btn-custom shadow">
                        <i class="fas fa-desktop me-2"></i>Tableau de bord
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-light btn-custom">
                        <i class="fas fa-user-lock me-2"></i>Connexion
                    </a>

                    <a href="{{ route('register') }}" class="btn btn-warning btn-custom text-dark">
                        <i class="fas fa-plus-circle me-2"></i>Créer un compte
                    </a>
                @endauth
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>