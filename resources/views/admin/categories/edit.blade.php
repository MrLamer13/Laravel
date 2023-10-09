@extends('layouts.admin')
@section('content')
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h2>Редактирование категории</h2>
    </div>

    @include('inc.message')

    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif

    <div class="offset-2 col-8">
        <form method="post" action="{{ route('admin.categories.update', ['category' => $category]) }}">
            @csrf
            @method('put')
            <div class="form-group mb-3">
                <label for="title">Название</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Название категории"
                       value="{{ $category->title }}">
                @error('title')<strong style="color: red">{{ $message }}</strong>@enderror
            </div>
            <div class="form-group mb-3">
                <label for="link">Ссылка на категорию</label>
                <input type="text" class="form-control" name="link" id="link" placeholder="Ссылка на категорию"
                       value="{{ $category->link }}">
                @error('link')<strong style="color: red">{{ $message }}</strong>@enderror
            </div>
            <div class="form-group mb-3">
                <label for="image">Ссылка на изображение</label>
                <input type="text" class="form-control" name="image" id="image" placeholder="Ссылка на изображение"
                       value="{{ $category->image }}">
                @error('image')<strong style="color: red">{{ $message }}</strong>@enderror
            </div>
            <div class="form-group mb-3">
                <label for="description">Описание</label>
                <textarea class="form-control" name="description" id="description"
                          placeholder="Описание категории">{!! $category->description !!}</textarea>
                @error('description')<strong style="color: red">{{ $message }}</strong>@enderror
            </div>
            <button class="btn btn-success mb-3" type="submit">Сохранить</button>
        </form>
    </div>
@endsection
