@extends('layouts.app')

@section('content')

<div class="card card-custom p-4">
    <h3>Modifier Catégorie</h3>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nom</label>
            <input type="text" 
                   name="name" 
                   value="{{ $category->name }}" 
                   class="form-control" 
                   required>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Retour</a>
    </form>
</div>

@endsection
