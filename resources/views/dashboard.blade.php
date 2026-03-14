@extends ('layouts.app')

@section('content')

<div class="container">

    <h2 class="mb-4">Tableau de bord</h2>

    <div class="row">

        <div class="col-md-3">
            <div class="card shadow p-3">
                <h6>Produits en Stock</h6>
                <h3>{{ $products }}</h3>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow p-3">
                <h6>Ventes du Jour</h6>
                <h3>{{ $salesToday }}</h3>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow p-3">
                <h6>Commandes</h6>
                <h3>{{ $salesToday }}</h3>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow p-3">
                <h6>Clients Enregistrés</h6>
                <h3>{{ $clients }}</h3>
            </div>
        </div>

    </div>

    <br>

    <div class="row">

        <div class="col-md-8">

            <div class="card p-3 shadow">

                <h5>Ventes du Mois</h5>

                <canvas id="salesChart"></canvas>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card p-3 shadow">

                <h5>Produits en rupture</h5>

                <ul>

                    @foreach($ruptureProducts as $product)

                        <li>{{ $product->name }}</li>

                    @endforeach

                </ul>

            </div>

        </div>

    </div>

</div>

<script>

    const ctx = document.getElementById('salesChart');

    new Chart(ctx, {

        type: 'bar',

        data: {

            labels: ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil'],

            datasets: [{
                label: 'Ventes',

                data: [12, 19, 3, 5, 2, 3, 10],

                borderWidth: 1
            }]

        }

    });

</script>

@endsection