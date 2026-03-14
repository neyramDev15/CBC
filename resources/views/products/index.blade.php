@extends('layouts.app')

@section('content')

<div class="card-custom">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Gestion des Produits</h4>
            <small class="text-muted">Liste de vos produits en stock</small>
        </div>

        <a href="{{ route('products.create') }}" class="btn btn-primary">
            + Ajouter Produit
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success rounded-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Catégorie</th>
                    <th>Prix</th>
                    <th>Stock</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="fw-semibold">{{ $product->name }}</td>
                        <td>{{ $product->category->name ?? '-' }}</td>
                        <td>{{ number_format($product->price, 2, ',', ' ') }} fcfa</td>
                        <td>{{ $product->stock }}</td>
                        <td class="text-end">

                            <a href="{{ route('products.edit', $product->id) }}"
                               class="btn btn-sm btn-outline-warning">
                                Modifier
                            </a>

                            <form action="{{ route('products.destroy', $product->id) }}"
                                  method="POST"
                                  class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Supprimer ce produit ?')">
                                    Supprimer
                                </button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">
                            Aucun produit enregistré
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection