@extends('layouts.admin')
@section('content')
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h2>Редактирование учётных данных</h2>
    </div>

    @include('inc.message')

    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif

    <div class="offset-2 col-8">
        <form class="form-group" method="post" action="{{ route('admin.profile.update') }}">
            @csrf
            @method('put')

            <div class="form-group mb-3">
                <label for="name">Имя пользователя</label>
                <input class="form-control" name="name" id="name" placeholder="Имя пользователя"
                       value="{{ $user->name }}">
                @error('name')<strong style="color: red">{{ $message }}</strong>@enderror
            </div>

            <div class="form-group mb-3">
                <label for="email">E-mail</label>
                <input class="form-control" name="email" id="email" placeholder="E-mail"
                       value="{{ $user->email }}">
                @error('email')<strong style="color: red">{{ $message }}</strong>@enderror
            </div>

            <div class="form-group mb-3">
                <label for="password">Текущий пароль</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Текущий пароль">
                @error('password')<strong style="color: red">{{ $message }}</strong>@enderror
            </div>

            <div class="form-group mb-3">
                <label for="newPassword">Новый пароль</label>
                <input type="password" class="form-control" name="newPassword" id="newPassword" placeholder="Новый пароль">
                @error('newPassword')<strong style="color: red">{{ $message }}</strong>@enderror
            </div>

            <button class="btn btn-success mb-3" type="submit">Сохранить</button>
        </form>
    </div>
@endsection
