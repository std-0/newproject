@extends('layouts.app')

@section('title', 'Главная страница')

@section('content')
    <h2>Добро пожаловать на главную страницу!</h2>
    <p>Это основное содержание страницы.</p>

    @include('partials.news') <!-- Включение боковой панели -->
@endsection