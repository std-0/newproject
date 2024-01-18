@foreach ($articles as $article)
<div class="article-list mr-3">
    <div class="article">
        <div class="image">
            @if($article->image)
            <img src="{{ asset('images/' . $article->image) }}" alt="{{ $article->title }}"
                style="width: 290px; height: 200px;">

            @else
            <img src="{{ asset('images/logo.png') }}" alt="{{ $article->title }}" style="width: 290px; height: 200px;">
            @endif

        </div>
        <h5><a href="{{ route('articles.show', $article->id) }}" class="line">{{ $article->title }}</a>
        </h5>
        <div class="btn-group btn-group-justified col-sm-12">
            <div class="col-sm-12">
                <a class="d-flex align-items-center btn btn-primary" href="{{ route('articles.show', $article->id) }}">
                    Citește
                </a>
            </div>
        </div>
    </div>
</div>
@endforeach