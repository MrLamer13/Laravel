@extends('layouts.admin')
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Пользователи</h2>

    </div>

    @include('inc.message')

    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>#ID</th>
                <th>Имя пользователя</th>
                <th>Тип авторизации</th>
                <th>E-mail</th>
                <th>Админ?</th>
                <th>Дата добавления</th>
                <th>Дата изменения</th>
                <th>Действия</th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <th>{{ $user->id }}</th>
                    <th>{{ $user->name }}</th>
                    <th>{{ $user->type_auth }}</th>
                    <th>{{ $user->email }}</th>
                    <th>@if($user->is_admin)
                            Да
                        @else
                            Нет
                    @endif</th>
                    <th>{{ $user->created_at }}</th>
                    <th>{{ $user->updated_at }}</th>
                    <th><a href="{{ route('admin.users.edit', ['user' => $user]) }}">Редактировать</a></th>
                </tr>
            @endforeach
        </table>
    </div>

@endsection
