@extends('layouts.app')

@section('content')

<div class="card-custom">

    <div class="mb-4">
        <h4 class="fw-bold mb-1">Ajouter un Produit</h4>
        <small class="text-muted">Remplissez les informations du produit</small>
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

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <div class="row g-3">

            <div class="col-md-6">
                <label class="form-label">Nom du produit</label>
                <input type="text"
                       name="name"
                       class="form-control"
                       value="{{ old('name') }}"
                       required>
            </div>

            <div class="col-md-3">
                <label class="form-label">Prix</label>
                <input type="number"
                       step="0.01"
                       name="price"
                       class="form-control"
                       value="{{ old('price') }}"
                       required>
            </div>

            <div class="col-md-3">
                <label class="form-label">Stock</label>
                <input type="number"
                       name="stock"
                       class="form-control"
                       value="{{ old('stock') }}"
                       required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Catégorie</label>
                <select name="category_id"
                        class="form-select"
                        required>
                    <option value="">-- Sélectionner --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">
                Enregistrer
            </button>

            <a href="{{ route('products.index') }}"
               class="btn btn-secondary">
                Annuler
            </a>
        </div>

    </form>

</div>

@endsection