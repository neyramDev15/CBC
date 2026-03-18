@extends('layouts.app')

@section('content')

<div style="background:#0d3b66; height:100vh;" class="d-flex justify-content-center align-items-center">

    <div class="card p-4" style="width:400px; border-radius:15px;">

        <h3 class="text-center mb-3">Inscription</h3>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label>Nom</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Mot de passe</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Confirmer mot de passe</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <button class="btn btn-success w-100">
                S'inscrire
            </button>

        </form>

        <div class="text-center mt-3">
            <a href="{{ route('login') }}">
                Déjà un compte ?
            </a>
        </div>

    </div>

</div>

@endsection