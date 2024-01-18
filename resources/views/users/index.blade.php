@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <h1 class="top mb-3">Listă Utilizatori</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nume</th>
                    <th>Email</th>
                    <th>Roluri</th>
                    <th>Acțiuni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            {{ $user->roles->name }}<br>
                        </td>
                        <td>
                            <div class="btn-group btn-group-justified col-sm-11" role="group">
                                <div class="col-sm-5">
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Sigur doriți să ștergeți utilizatorul?')">Șterge</button>
                                    </form>
                                </div>
                                <div class="col-sm-5">
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">Editează</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
