@extends('layouts.app')

@section('content')
    <div class="container p-3 my-3 d-flex">
        <div class="row col d-flex flex-wrap">
            <h1 class="top">Crează un articol</h1>
            <form id="articleForm" method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
                @csrf
                <label for="title" class="title">Titlu:</label>
                <input type="text" id="title" name="title" required class="title">
                <label for="image" class="title">Imagine:</label>
                <input type="file" id="image" name="image" class="title">
                <label for="category" class="title">Categorie:</label>
                <select id="category" name="category" required class="title">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" class="title">{{ $category->name }}</option>
                    @endforeach
                </select>
                <label for="body" class="title">Conţinut:</label>
                <textarea id="editor" name="body"></textarea>
                <br>
                <button type="submit" class="btn btn-primary">Crează articol</button>
            </form>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
    </script>
@endsection
