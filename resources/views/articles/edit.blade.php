@extends('layouts.app')
@section('content')
    <div class="container p-3 my-3 d-flex">
        <div class="row col d-flex flex-wrap">
            <h1 class="title">Editează Articolul</h1>
            <form class="col-lg-10" action="{{ route('articles.update', $article->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label for="title" class="title">Titlu:</label>
                <input type="text" name="title" value="{{ $article->title }}" class="title">
                <label for="image" class="title">Imagine:</label>
                <input type="file" id="image" name="image" class="title">
                <label for="category" class="title">Categorie:</label>
                <select id="category" name="category_id" required class="title">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $article->category_id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
                <label for="body" class="title">Conţinut:</label>
                <textarea id="editor" name="body">{{ $article->body }}</textarea>
                <button type="submit" class="modifi btn btn-primary">Modifică Articolul</button>
            </form>
        </div>
    </div>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                autoParagraph: false,
                dataProcessor: {
                    htmlToData: (html) => {
                        return html;
                    },
                    dataToHtml: (data, writer) => {
                        writer.setHtml(data);
                    }
                }
            })
            .catch(error => {
                console.error(error);
            });

        function submitForm(event) {
            event.preventDefault();
            document.getElementById('articleForm').submit();
        }
    </script>
@endsection
