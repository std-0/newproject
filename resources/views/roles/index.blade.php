
@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <h1 class="top mb-3">Listă roluri</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Numele rolului</th>
                    <th>Acțiuni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td class="col-lg-2">{{ $role->id }}</td>
                        <td class="col-lg-6">{{ $role->name }}</td>
                        <td>
                            <div class="btn-group btn-group-justified col-sm-11" role="group">
                                <div class="col-sm-5">
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Sigur doriți să ștergeți rolul?')">Șterge</button>
                                    </form>
                                </div>
                                <div class="col-sm-5">
                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info">Editează</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('roles.create') }}" class="btn btn-primary">Adaugă Rol</a>
    </div>
@endsection
