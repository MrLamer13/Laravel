@extends('layouts.admin')
@section('content')
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h2>Добавление источника для новости {{ $news->title }}</h2>
    </div>
    <div class="offset-2 col-8">
        <form method="post" action="{{ route('admin.sources.store', ['news_id' => $news]) }}">
            @csrf
            <div class="form-group mb-3">
                <label for="title">Название</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Название источника"
                       value="{{ old('title') }}">
            </div>
            <div class="form-group mb-3">
                <label for="url">Адрес</label>
                <input type="text" class="form-control" name="url" id="url" placeholder="Адрес источника"
                       value="{{ old('url') }}">
            </div>
            <button class="btn btn-success mb-3" type="submit">Сохранить</button>
        </form>
    </div>
@endsection
