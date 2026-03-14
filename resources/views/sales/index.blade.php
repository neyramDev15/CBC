@extends('layouts.app')

@section('content')

    <div class="container">

        <h2>Liste des ventes</h2>

        <a href="{{ route('sales.create') }}" class="btn btn-primary mb-3">
            Nouvelle vente
        </a>

        <table class="table">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Client</th>
                    <th>Total</th>
                    <th>Méthode paiement</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                @foreach($sales as $sale)

                    <tr>

                        <td>{{ $sale->id }}</td>
                        <td>{{ $sale->client->name ?? 'Client occasionnel' }}</td>
                        <td>{{ $sale->total }}</td>
                        <td>{{ $sale->payement_method }}</td>
                        <td>{{ $sale->created_at }}</td>
                        <td>
                            <a href="{{ route('sales.show',$sale->id) }}">Voir</a>
                            <a href="{{ route('sales.invoice', $sale->id) }}">Facture</a>
                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

    

@endsection