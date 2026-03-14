@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between mb-3">
        <h3>Clients</h3>
        <a href="{{ route('clients.create') }}" class="btn btn-primary">
            Ajouter un client
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Téléphone</th>
                        <th>Adresse</th>
                        <th width="180">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($clients as $client)
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->phone }}</td>
                        <td>{{ $client->address }}</td>

                        <td>

                            <a href="{{ route('clients.edit',$client->id) }}"
                               class="btn btn-sm btn-warning">
                               Modifier
                            </a>

                            <form action="{{ route('clients.destroy',$client->id) }}"
                                  method="POST"
                                  style="display:inline">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('Supprimer ce client ?')">
                                        Supprimer
                                </button>

                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>

</div>

@endsection