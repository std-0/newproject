@extends('layouts.app')

@section('content')
    <div class="container p-3 my-3 d-flex ">
        <div class="row col d-flex flex-wrap">
            <h1 class="top">Lista Articolelor</h1>
            <a href="{{ route('articles.create') }}" class="btn btn-primary" style="margin-left: -8px">Adaugă articol</a>
            <div class="article-container col-lg-12">
                @foreach ($articles as $article)
                    <div class="article-list mr-3">
                        <div class="article">
                            <div class="image">
                                @if($article->image) 
                                    <img src="{{ asset('images/' . $article->image) }}" alt="{{ $article->title }}"
                                    style="width: 290px; height: 200px;">
                                
                                @else
                                    <img src="{{ asset('images/logo.png') }}" alt="{{ $article->title }}"
                                        style="width: 290px; height: 200px;">
                                @endif
                                
                            </div>
                            <h5><a href="{{ route('articles.show', $article->id) }}"
                                    class="line">{{ $article->title }}</a>
                            </h5>
                            <div class="btn-group btn-group-justified col-sm-12">
                                <div class="col-sm-3">
                                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="d-flex align-items-center btn btn-danger">Șterge</button>
                                    </form>

                                </div>
                                <div class="col-sm-3">
                                    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-info">Editează
                                    </a>
                                </div>
                                <div class="col-sm-5">
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
        </div>
    </div>
@endsection
@if (session('success'))
    <div id="success-message" class="alert alert-success" style="position: fixed; top: 10px; right: 10px;">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"
            style="font-size: smaller; color: #ffffff; background: #5d2d2e;">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
