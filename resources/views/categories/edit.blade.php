@extends('layouts.app')

@section('title', 'Editează Categorie')

@section('content')
    <h1 class="title">Editează Categorie</h1>

    <form action="{{ route('categories.update', $category->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="name" class="title">Nume Categorie:</label>
        <input type="text" name="name" id="name" value="{{ $category->name }}" required class="title"> 
        <button type="submit" class="btn btn-primary">Actualizează Categorie</button>
    </form>
@endsection
