@extends('layouts.admin')
@section('content')
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h2>Редактирование новости</h2>
    </div>

    @include('inc.message')

    <div class="offset-2 col-8">
        <form class="form-group" method="post" action="{{ route('admin.news.update', ['news' => $news]) }}">
            @csrf
            @method('put')

            <div class="form-group mb-3">
                <label for="title">Заголовок</label>
                <input class="form-control" name="title" id="title" placeholder="Заголовок новости"
                       value="{{ $news->title }}">
            </div>

            <div class="form-group mb-3">
                <fieldset class="form-control">
                    <legend>Выбрать категории</legend>
                    @foreach($categories as $category)
                        <div class="form-check-inline">
                            <input type="checkbox" class="form-check-input" name="categories[{{ $category->id }}]"
                                   @if(in_array($category->id, $news->categories->pluck('id')->toArray())) checked
                                   @endif
                                   id="{{ $category->id }}" value="{{ $category->id }}">
                            <label class="form-check-label"
                                   for="categories[{{ $category->id }}]">{{ $category->title }}</label>
                        </div>
                    @endforeach
                </fieldset>
            </div>

            <div class="form-group mb-3">
                <label for="author">Автор</label>
                <input class="form-control" name="author" id="author" placeholder="Автор новости"
                       value="{{ $news->author }}">
            </div>

            <div class="form-group mb-3">
                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    @foreach($statuses as $status)
                        <option @if($news->status === $status) selected @endif>{{ $status }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="description">Текст</label>
                <textarea class="form-control" name="description" id="description"
                          placeholder="Текст новости">{!! $news->description !!}</textarea>
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
                               @if($news->isVisible) checked @endif>
                        <label for="true">Видимая</label>
                    </div>

                    <div class="form-check-inline">
                        <input type="radio" id="false" name="isVisible" value="0"
                               @if(!$news->isVisible) checked @endif>
                        <label for="false">Не видимая</label>
                    </div>

                </fieldset>
            </div>

            <button class="btn btn-success mb-3" type="submit">Сохранить</button>
        </form>
    </div>
@endsection
