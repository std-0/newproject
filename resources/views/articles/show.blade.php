@extends('layouts.app')

@section('content')
    <div class="container p-3 my-3 d-flex back">
        <button id="scrollBtn" onclick="topFunction()" title="Go to top">Sus</button>
        <div class="row col d-flex flex-wrap">
            <div class="image-container text-center">
                <img src="{{ asset('images/' . $article->image) }}" alt="{{ $article->title }}" class="center-image">
            </div>
            <h2 style="text-align: center; color: #00d12fd6;">{{ $article->title }}</h2>
            <h4>Categoria: {{ $article->category->name }}</h4>
            <p>{!! $article->body !!}</p>
        </div>
    </div>
@endsection
<script>
    //scroll in sus
    window.onscroll = function() {
        scrollFunction();
    };

    function scrollFunction() {
        var scrollBtn = document.getElementById("scrollBtn");
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            scrollBtn.style.display = "block";
        } else {
            scrollBtn.style.display = "none";
        }
    }

    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>
