@extends('layouts.admin')
@section('content')
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h2>Добавление новости</h2>
    </div>

    @include('inc.message')

    <div class="offset-2 col-8">
        <form method="post" action="{{ route('admin.news.store') }}">
            @csrf
            <div class="form-group mb-3">
                <fieldset class="form-control" name="category_id" id="category_id">
                    <legend>Выбрать категории</legend>
                    @foreach($categories as $category)
                        <div class="form-check-inline">
                            <input type="checkbox" class="form-check-input" name="category[{{ $category->id }}]"
                                   id="{{ $category->id }}">
                            <label class="form-check-label"
                                   for="category[{{ $category->id }}]">{{ $category->title }}</label>
                        </div>
                    @endforeach
                </fieldset>
            </div>

            <div class="form-group mb-3">
                <label for="title">Автор</label>
                <input class="form-control" name="author" id="author" placeholder="Автор новости"
                       value="{{ old('author') }}">
            </div>

            <div class="form-group mb-3">
                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    <option @if(old('status') === 'ACTIVE') selected @endif>ACTIVE</option>
                    <option @if(old('status') === 'DRAFT') selected @endif>DRAFT</option>
                    <option @if(old('status') === 'PUBLISHED') selected @endif>PUBLISHED</option>
                    <option @if(old('status') === 'BLOCKED') selected @endif>BLOCKED</option>
                    <option @if(old('status') === 'DELETED') selected @endif>DELETED</option>
                </select>
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

            <div class="form-group mb-3">
                <label for="image">Изображение</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>

            <div class="form-group mb-3">
                <fieldset class="form-control">
                    <legend>Отображение новости</legend>

                    <div class="form-check-inline">
                        <input type="radio" id="true" name="isVisible" value="1"
                               @if(old('isVisible') === 1) checked @endif>
                        <label for="true">Видимая</label>
                    </div>

                    <div class="form-check-inline">
                        <input type="radio" id="false" name="isVisible" value="0"
                               @if(old('isVisible') === 0) checked @endif>
                        <label for="false">Не видимая</label>
                    </div>

                </fieldset>
            </div>

            <button class="btn btn-success mb-3" type="submit">Добавить новость</button>
        </form>
    </div>
@endsection
