@extends('layouts.main')

@section('content')
    <h2>Форма обратной связи</h2>
    <div class="offset-2 col-8">
        @include('inc.message')
        <form method="post" action="">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Введите имя пользователя</label>
                <input class="form-control" name="name" id="name" placeholder="Имя пользователя"
                       value="{{ old('name') }}">
            </div>
            <div class="form-group mb-3">
                <label for="comment">Введите Ваш комментарий</label>
                <textarea class="form-control" name="comment" id="comment"
                          placeholder="Комментарий">{!! old('comment') !!}</textarea>
            </div>
            <button class="btn btn-success mb-3" type="submit">Отправить комментарий</button>
        </form>
    </div>
@endsection
