@extends('layouts.app')

@section('title', 'Toate Articolele')

@section('content')

    <div class="container p-3 my-3 d-flex">
        <div class="row col d-flex flex-wrap">
            <h1 class="top">Toate Articolele</h1>
            <div class="article-container col-lg-12">
            @include ('components.article')
            </div>
        </div>
    </div>

@endsection
