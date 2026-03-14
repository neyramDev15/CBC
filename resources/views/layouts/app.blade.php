<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Application Gestion Boutique PC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #eef1f6;
        }

        .sidebar {
            width: 240px;
            height: 100vh;
            position: fixed;
            background: linear-gradient(180deg, #1e3c72, #2a5298);
            padding: 25px 15px;
            color: white;
        }

        .sidebar h5 {
            font-weight: bold;
            margin-bottom: 30px;
        }

        .sidebar a {
            display: block;
            color: #dbeafe;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 8px;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }

        .content {
            margin-left: 260px;
            padding: 30px;
        }

        .topbar {
            background: white;
            padding: 15px 25px;
            border-radius: 12px;
            margin-bottom: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .card-custom {
            background: white;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.05);
            padding: 25px;
        }

        .btn-primary {
            background: #2a5298;
            border: none;
        }

        .btn-primary:hover {
            background: #1e3c72;
        }

        .table thead {
            background: #f8fafc;
        }

        .table {
            border-radius: 10px;
            overflow: hidden;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <h5>🖥 PC STORE</h5>

        <a href="{{ route('dashboard') }}">Tableau de Bord</a>
        <a href="{{ route('categories.index') }}">Catégories</a>
        <a href="{{ route('products.index') }}">Produits</a>
        <a href="{{ route('clients.index') }}">Clients</a>
        <a href="{{ route('sales.index') }}">Ventes</a>
        <a href="#">Rapports</a>
        <a href="#">Paramètre</a>
    </div>

    <div class="content">

        <div class="topbar d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Gestion Boutique PC</h4>
            <div>
                👤 {{ auth()->user()->name ?? 'Admin' }}
            </div>
        </div>

        @if(session('success'))
            <div class="container mt-3">
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="container mt-3">
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            </div>
        @endif

        @yield('content')

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>

</html>