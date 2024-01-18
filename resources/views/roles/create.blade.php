
@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <h1 class="top mb-3">Adaugă Rol</h1>

        <form action="{{ route('roles.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Numele Rolului:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <!-- Alte câmpuri pentru atribuții ale rolului, dacă este necesar -->

            <button type="submit" class="btn btn-primary">Adaugă Rol</button>
        </form>
    </div>
@endsection
