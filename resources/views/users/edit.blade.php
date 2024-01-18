@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <h1 class="top mb-3">Editează Utilizator</h1>

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nume:</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="roles">Atribuie roluri:</label>
                <select id="roles" name="roles" class="form-control" multiple>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ $user->roles->name === $role->name ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Actualizează Utilizator</button>
        </form>
    </div>
@endsection