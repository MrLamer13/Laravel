@extends('layouts.admin')
@section('content')
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h2>Редактирование источника новости {{ $source->news->title }}</h2>
    </div>

    @include('inc.message')

    <div class="offset-2 col-8">
        <form method="post" action="{{ route('admin.sources.update', ['source' => $source, 'news' => $source->news]) }}">
            @csrf
            @method('put')
            <div class="form-group mb-3">
                <label for="title">Название</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Название источника"
                       value="{{ $source->title }}">
            </div>
            <div class="form-group mb-3">
                <label for="url">Адрес</label>
                <input type="text" class="form-control" name="url" id="url" placeholder="Адрес источника"
                       value="{{ $source->url }}">
            </div>
            <button class="btn btn-success mb-3" type="submit">Сохранить</button>
        </form>
    </div>
@endsection
