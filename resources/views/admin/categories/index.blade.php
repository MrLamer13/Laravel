@extends('layouts.admin')
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Категории</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-outline-secondary">Добавить
                    категорию</a>
            </div>
        </div>
    </div>

    @include('inc.message')

    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>#ID</th>
                <th>Категория</th>
                <th>Дата добавления</th>
                <th>Дата изменения</th>
                <th>Действия</th>
            </tr>
            @foreach($categories as $category)
                <tr>
                    <th>{{ $category->id }}</th>
                    <th>{{ $category->title }}</th>
                    <th>{{ $category->created_at }}</th>
                    <th>{{ $category->updated_at }}</th>
                    <th><a href="{{ route('admin.categories.edit', ['category' => $category]) }}">Редактировать</a> |
                        <a href="{{ route('admin.categories.destroy', ['category' => $category]) }}" style="color: red">Удалить</a></th>
                </tr>
            @endforeach
        </table>
    </div>

@endsection
