@extends('layouts.admin')
@section('content')
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h2>Добавление категории</h2>
    </div>
    <div class="offset-2 col-8">
        <form method="post" action="{{ route('admin.categories.store') }}">
            @csrf
            <div class="form-group mb-3">
                <label for="title">Название</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Название категории"
                       value="{{ old('title') }}">
            </div>
            <div class="form-group mb-3">
                <label for="description">Описание</label>
                <textarea class="form-control" name="description" id="description"
                          placeholder="Описание категории">{!! old('description') !!}</textarea>
            </div>
            <button class="btn btn-success mb-3" type="submit">Сохранить</button>
        </form>
    </div>
@endsection
