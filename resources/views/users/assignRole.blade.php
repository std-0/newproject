
@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <h1>Atribuire Roluri pentru {{ $user->name }}</h1>

        <form action="{{ route('users.processRoleAssignment', $user) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="roles">Alege Roluri:</label>
                <select name="roles[]" id="roles" class="form-control" multiple>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Atribuie Roluri</button>
        </form>
    </div>
@endsection
