@extends('layouts.admin')
@section('content')
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h2>Добавление новости</h2>
    </div>
    <div class="offset-2 col-8">
        <form method="post" action="{{ route('admin.news.store') }}">
            @csrf
            <div class="form-group mb-3">
                <label for="title">Автор</label>
                <input class="form-control" name="author" id="author" placeholder="Автор новости"
                       value="{{ old('author') }}">
            </div>
            <div class="form-group mb-3">
                <label for="title">Заголовок</label>
                <input class="form-control" name="title" id="title" placeholder="Заголовок новости"
                       value="{{ old('title') }}">
            </div>
            <div class="form-group mb-3">
                <label for="description">Текст</label>
                <textarea class="form-control" name="description" id="description"
                          placeholder="Текст новости">{!! old('description') !!}</textarea>
            </div>
            <button class="btn btn-success mb-3" type="submit">Добавить новость</button>
        </form>
    </div>
@endsection
