@extends('layouts.main')

@section('content')
    <h2>Форма обратной связи</h2>
    <div class="offset-2 col-8">
        @if (session('status'))
            <x-alert type="success" message="{{ session('status') }}"></x-alert>
        @endif
        <form method="post" action="">
            @csrf
            <div class="form-group mb-3">
                <label for="nickname">Введите имя пользователя</label>
                <input class="form-control" name="nickname" id="nickname" placeholder="Имя пользователя"
                       value="{{ old('nickname') }}">
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
