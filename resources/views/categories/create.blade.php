@extends('layouts.app')

@section('title', 'Adaugă Categorie')

@section('content')
    <h1 class="title">Adaugă Categorie</h1>

    <form action="{{ route('categories.store') }}" method="post">
        @csrf
        <label for="name" class="title">Nume Categorie:</label>
        <input type="text" name="name" id="name" required class="title">
        <button type="submit" class="btn btn-primary">Adaugă Categorie</button>
    </form>
@endsection
