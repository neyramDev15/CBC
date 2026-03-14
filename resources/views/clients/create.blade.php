@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h3>Ajouter un client</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('clients.store') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label>Nom</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Téléphone</label>
                    <input type="text" name="phone" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Adresse</label>
                    <input type="text" name="address" class="form-control">
                </div>

                <button class="btn btn-success">
                    Enregistrer
                </button>

                <a href="{{ route('clients.index') }}" class="btn btn-secondary">
                    Retour
                </a>

            </form>

        </div>
    </div>

</div>

@endsection