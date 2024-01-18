@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <div class="container p-3 my-3 d-flex">
        <div class="row col d-flex flex-wrap">
            <h1 class="top">Lista Articolelor</h1>
            <div class="article-container col-lg-12">
            @include ('components.article')
            </div>
            <div class="col-lg-12 mt-3">
                <a href="{{ route('articles.viewAll') }}" class="btn btn-primary">Vezi toate articolele</a>
            </div>
        </div>
    </div>

@endsection