@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <h1 class="top mb-3">Listă categoriilor</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Numele categoriei</th>
                    <th>Acțiuni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td class="col-lg-2">{{ $category->id }}</td>
                        <td class="col-lg-6">{{ $category->name }}</td>
                        <td>
                            <div class="btn-group btn-group-justified col-sm-11" role="group">
                            <div class="col-sm-5">
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Sigur doriți să ștergeți categoria?')">Șterge</button>
                                </form>
                                </div>
                                <div class="col-sm-5">
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info">Editează</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('categories.create') }}" class="btn btn-primary">Adaugă Categorie</a>
    </div>
@endsection
 @if(session('success'))
        <div id="success-message" class="alert alert-success" style="position: fixed; top: 10px; right: 10px;">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif