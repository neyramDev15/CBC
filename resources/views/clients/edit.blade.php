@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h3>Modifier client</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('clients.update',$client->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Nom</label>
                    <input type="text"
                           name="name"
                           value="{{ $client->name }}"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label>Téléphone</label>
                    <input type="text"
                           name="phone"
                           value="{{ $client->phone }}"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label>Adresse</label>
                    <input type="text"
                           name="address"
                           value="{{ $client->address }}"
                           class="form-control">
                </div>

                <button class="btn btn-primary">
                    Mettre à jour
                </button>

                <a href="{{ route('clients.index') }}" class="btn btn-secondary">
                    Retour
                </a>

            </form>

        </div>
    </div>

</div>

@endsection