@extends('layouts.app')

@section('content')

<div class="card card-custom p-4">
    <h3>Ajouter une Catégorie</h3>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Retour</a>
    </form>
</div>

@endsection
