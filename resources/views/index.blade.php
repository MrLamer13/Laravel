@extends('layouts.main')

@section('content')
    <div class="row">
        <h1>Приветствие пользователя</h1>
        <p>{{ fake('ru_RU')->realText(1500) }}</p>
        <p>{{ fake('ru_RU')->realText(1500) }}</p>
        <p>{{ fake('ru_RU')->realText(1500) }}</p>

    </div>
@endsection
