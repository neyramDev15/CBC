@extends('layouts.app')

@section('content')

<div class="card-custom">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Gestion des Catégories</h4>
            <small class="text-muted">Organisez vos produits</small>
        </div>

        <a href="{{ route('categories.create') }}" class="btn btn-primary">
            + Ajouter Catégorie
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
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="fw-semibold">{{ $category->name }}</td>
                        <td class="text-end">

                            <a href="{{ route('categories.edit', $category->id) }}"
                               class="btn btn-sm btn-outline-warning">
                                Modifier
                            </a>

                            <form action="{{ route('categories.destroy', $category->id) }}"
                                  method="POST"
                                  class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Supprimer ?')">
                                    Supprimer
                                </button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center py-4 text-muted">
                            Aucune catégorie enregistrée
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection