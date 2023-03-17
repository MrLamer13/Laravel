@extends('layouts.main')

@section('content')
    <h2>Форма заказа на получение выгрузки данных</h2>
    <div class="offset-2 col-8">
        @if (session('status'))
            <x-alert type="success" message="{{ session('status') }}"></x-alert>
        @endif
        <form method="post">
            @csrf
            <div class="form-group mb-3">
                <label for="customer">Введите имя заказчика</label>
                <input class="form-control" name="customer" id="customer" placeholder="Имя заказчика"
                       value="{{ old('customer') }}">
            </div>
            <div class="form-group mb-3">
                <label for="phone">Введите номер телефона</label>
                <input type="tel" class="form-control" name="phone" id="phone" placeholder="Номер телефона"
                       value="{{ old('phone') }}">
            </div>
            <div class="form-group mb-3">
                <label for="email">Введите Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                       value="{{ old('email') }}">
            </div>
            <div class="form-group mb-3">
                <label for="order">Введите Ваш запрос</label>
                <textarea class="form-control" name="order" id="order"
                          placeholder="Запрос">{!! old('order') !!}</textarea>
            </div>
            <button class="btn btn-success mb-3" type="submit">Отправить запрос</button>
        </form>
    </div>
@endsection
