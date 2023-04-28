@extends('layouts.admin')
@section('content')
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h2>Редактирование пользователя</h2>
    </div>

    @include('inc.message')

    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif

    <div class="offset-2 col-8">
        <form method="post" action="{{ route('admin.users.update', ['user' => $user]) }}">
            @csrf
            @method('put')
            <div class="form-group mb-3">
                <label for="name">Имя пользователя</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Имя пользователя"
                       value="{{ $user->name }}">
                @error('name')<strong style="color: red">{{ $message }}</strong>@enderror
            </div>

            <div class="form-group mb-3">
                <label for="email">E-mail пользователя</label>
                <input type="text" class="form-control" name="email" id="email"
                       value="{{ $user->email }}" readonly>

            </div>

            <div class="form-group mb-3">
                <fieldset class="form-control">
                    <legend>Флаг администратора</legend>

                    <div class="form-check-inline">
                        <input type="radio" id="true" name="is_admin" value="1"
                               @if($user->is_admin) checked @endif>
                        <label for="true">Администратор</label>
                    </div>

                    <div class="form-check-inline">
                        <input type="radio" id="false" name="is_admin" value="0"
                               @if(!$user->is_admin) checked @endif>
                        <label for="false">Не администратор</label>
                    </div>

                </fieldset>
                @error('is_admin')<strong style="color: red">{{ $message }}</strong>@enderror
            </div>

            <button class="btn btn-success mb-3" type="submit">Сохранить</button>
        </form>
    </div>
@endsection
