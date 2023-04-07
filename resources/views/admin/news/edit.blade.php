@extends('layouts.admin')
@section('content')
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h2>Редактирование новости</h2>
    </div>

    @include('inc.message')

    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif

    <div class="offset-2 col-8">
        <form class="form-group" method="post" action="{{ route('admin.news.update', ['news' => $news]) }}">
            @csrf
            @method('put')

            <div class="form-group mb-3">
                <label for="title">Заголовок</label>
                <input class="form-control" name="title" id="title" placeholder="Заголовок новости"
                       value="{{ $news->title }}">
                @error('title')<strong style="color: red">{{ $message }}</strong>@enderror
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
                @error('categories')<strong style="color: red">{{ $message }}</strong>@enderror
            </div>

            <div class="form-group mb-3">
                <label for="author">Автор</label>
                <input class="form-control" name="author" id="author" placeholder="Автор новости"
                       value="{{ $news->author }}">
                @error('author')<strong style="color: red">{{ $message }}</strong>@enderror
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
                @error('description')<strong style="color: red">{{ $message }}</strong>@enderror
            </div>

            <div class="form-group mb-3">
                <label for="link">Ссылка на новость</label>
                <input type="text" class="form-control" name="link" id="link" placeholder="Ссылка на новость"
                       value="{{ $news->link }}">
                @error('link')<strong style="color: red">{{ $message }}</strong>@enderror
            </div>

            <div class="form-group mb-3">
                <label for="image">Изображение</label>
                <input type="text" class="form-control" name="image" id="image"placeholder="Ссылка на изображение"
                       value="{{ $news->image }}">
                @error('image')<strong style="color: red">{{ $message }}</strong>@enderror
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
                @error('isVisible')<strong style="color: red">{{ $message }}</strong>@enderror
            </div>

            <button class="btn btn-success mb-3" type="submit">Сохранить</button>
        </form>
    </div>
@endsection
