@extends('layouts.admin')
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Комментарии обратной связи</h2>
    </div>

    @include('inc.message')

    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>#ID</th>
                <th>Имя пользователя</th>
                <th>Комментарий</th>
                <th>Дата добавления</th>
                <th>Действия</th>
            </tr>
            @foreach($feedbackList as $feedback)
                <tr>
                    <th>{{ $feedback->id }}</th>
                    <th>{{ $feedback->name }}</th>
                    <th>{{ $feedback->comment }}</th>
                    <th>{{ $feedback->created_at }}</th>
                    <th><a href="{{ route('admin.feedback.destroy', ['feedback' => $feedback]) }}" style="color: red">Удалить</a></th>
                </tr>
            @endforeach
        </table>
    </div>

@endsection
