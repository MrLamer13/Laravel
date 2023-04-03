@extends('layouts.main')

@section('content')
    <h2>Форма заказа на получение выгрузки данных</h2>
    <div class="offset-2 col-8">

        @include('inc.message')

        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif

        <form method="post">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Введите имя заказчика</label>
                <input class="form-control" name="name" id="name" placeholder="Имя заказчика"
                       value="{{ old('name') }}">
                @error('name')<strong style="color: red">{{ $message }}</strong>@enderror
            </div>
            <div class="form-group mb-3">
                <label for="phone">Введите номер телефона</label>
                <input type="tel" class="form-control" name="phone" id="phone" placeholder="Номер телефона"
                       value="{{ old('phone') }}">
                @error('phone')<strong style="color: red">{{ $message }}</strong>@enderror
            </div>
            <div class="form-group mb-3">
                <label for="email">Введите Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                       value="{{ old('email') }}">
                @error('email')<strong style="color: red">{{ $message }}</strong>@enderror
            </div>
            <div class="form-group mb-3">
                <label for="order">Введите Ваш запрос</label>
                <textarea class="form-control" name="order" id="order"
                          placeholder="Запрос">{!! old('order') !!}</textarea>
                @error('order')<strong style="color: red">{{ $message }}</strong>@enderror
            </div>
            <button class="btn btn-success mb-3" type="submit">Отправить запрос</button>
        </form>
    </div>
@endsection
