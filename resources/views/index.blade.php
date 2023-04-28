@extends('layouts.main')

@section('content')
    <div class="row">
        @guest
            <h1>Приветствие пользователя</h1>
        @else
            <h1>Добро пожаловать, {{ Auth::user()->name }}!</h1>
        @endguest

        <p>{{ fake('ru_RU')->realText(1500) }}</p>
        <p>{{ fake('ru_RU')->realText(1500) }}</p>
        <p>{{ fake('ru_RU')->realText(1500) }}</p>
    </div>
@endsection
