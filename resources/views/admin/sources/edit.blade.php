@extends('layouts.admin')
@section('content')
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h2>Редактирование источника новости {{ $source->news->title }}</h2>
    </div>

    @include('inc.message')

    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif

    <div class="offset-2 col-8">
        <form method="post"
              action="{{ route('admin.sources.update', ['source' => $source, 'news' => $source->news]) }}">
            @csrf
            @method('put')
            <div class="form-group mb-3">
                <label for="title">Название</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Название источника"
                       value="{{ $source->title }}">
                @error('title')<strong style="color: red">{{ $message }}</strong>@enderror
            </div>
            <div class="form-group mb-3">
                <label for="url">Адрес</label>
                <input type="text" class="form-control" name="url" id="url" placeholder="Адрес источника"
                       value="{{ $source->url }}">
                @error('url')<strong style="color: red">{{ $message }}</strong>@enderror
            </div>
            <button class="btn btn-success mb-3" type="submit">Сохранить</button>
        </form>
    </div>
@endsection
