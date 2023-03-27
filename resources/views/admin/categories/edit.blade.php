@extends('layouts.admin')
@section('content')
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h2>Редактирование категории</h2>
    </div>

    @include('inc.message')

    <div class="offset-2 col-8">
        <form method="post" action="{{ route('admin.categories.update', ['category' => $category]) }}">
            @csrf
            @method('put')
            <div class="form-group mb-3">
                <label for="title">Название</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Название категории"
                       value="{{ $category->title }}">
            </div>
            <div class="form-group mb-3">
                <label for="description">Описание</label>
                <textarea class="form-control" name="description" id="description"
                          placeholder="Описание категории">{!! $category->description !!}</textarea>
            </div>
            <button class="btn btn-success mb-3" type="submit">Сохранить</button>
        </form>
    </div>
@endsection
