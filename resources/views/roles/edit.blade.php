@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <h1 class="top mb-3">Editează Rol</h1>

        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Numele Rolului:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $role->name }}" required>
            </div>

            <!-- Alte câmpuri pentru atribuții ale rolului, dacă este necesar -->

            <button type="submit" class="btn btn-primary">Actualizează Rol</button>
        </form>
    </div>
@endsection
