@extends('layouts.app')

@section('content')

<div class="container">

    <h2>Détail Vente #{{ $sale->id }}</h2>

    <p>
        <strong>Méthode paiement :</strong> {{ $sale->payement_method }}
    </p>

    <p>
        <strong>Date :</strong> {{ $sale->created_at }}
    </p>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix</th>
                <th>Total</th>
            </tr>
        </thead>

        <tbody>

        @foreach($sale->items as $item)

        <tr>

            <td>{{ $item->product->name }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->price }}</td>
            <td>{{ $item->price * $item->quantity }}</td>

        </tr>

        @endforeach

        </tbody>

    </table>

    <h4>Total : {{ $sale->total }}</h4>

</div>

<div class="mt-4">

<a href="{{ route('sales.invoice', $sale->id) }}" class="btn btn-success">
Télécharger la facture
</a>

<a href="{{ route('sales.index') }}" class="btn btn-secondary">
Retour
</a>

</div>

@endsection