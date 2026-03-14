@extends('layouts.app')

@section('content')

<div class="card-custom">

    <div class="mb-4">
        <h4 class="fw-bold mb-1">Modifier le Produit</h4>
        <small class="text-muted">Mettre à jour les informations</small>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger rounded-3">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row g-3">

            <div class="col-md-6">
                <label class="form-label">Nom du produit</label>
                <input type="text"
                       name="name"
                       class="form-control"
                       value="{{ old('name', $product->name) }}"
                       required>
            </div>

            <div class="col-md-3">
                <label class="form-label">Prix</label>
                <input type="number"
                       step="0.01"
                       name="price"
                       class="form-control"
                       value="{{ old('price', $product->price) }}"
                       required>
            </div>

            <div class="col-md-3">
                <label class="form-label">Stock</label>
                <input type="number"
                       name="stock"
                       class="form-control"
                       value="{{ old('stock', $product->stock) }}"
                       required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Catégorie</label>
                <select name="category_id"
                        class="form-select"
                        required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">
                Mettre à jour
            </button>

            <a href="{{ route('products.index') }}"
               class="btn btn-secondary">
                Annuler
            </a>
        </div>

    </form>

</div>

@endsection