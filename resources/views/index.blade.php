@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <div class="container p-3 my-3 d-flex">
        <div class="row col d-flex flex-wrap">
            <h1 class="top">Lista Articolelor</h1>
            <div class="article-container col-lg-12">
                @foreach ($articles as $article)
                <div class="article-list mr-3">
                        <div class="article">
                            <div class="image">
                                <img src="{{ asset('images/' . $article->image) }}" alt="{{ $article->title }}"
                                    style="width: 290px; height: 200px;">
                            </div>
                            <h5><a href="{{ route('articles.show', $article->id) }}"
                                    class="line">{{ $article->title }}</a>
                            </h5>
                            <div class="btn-group btn-group-justified col-sm-12">
                                
                                <div class="col-sm-12">
                                    <a class="d-flex align-items-center btn btn-primary"
                                        href="{{ route('articles.show', $article->id) }}">
                                        Citește
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-12 mt-3">
                <a href="{{ route('articles.viewAll') }}" class="btn btn-primary">Vezi toate articolele</a>
            </div>
        </div>
    </div>

@endsection