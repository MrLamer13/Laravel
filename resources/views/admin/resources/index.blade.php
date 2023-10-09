@extends('layouts.admin')
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Ресурсы</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.resources.create') }}" class="btn btn-sm btn-outline-secondary">Добавить
                    ресурс</a>
            </div>
        </div>
    </div>

    <form method="get" action="{{ route('admin.parser') }}">
        <button class="btn btn-success mb-5" type="submit">Запарсить новости</button>
    </form>

    @include('inc.message')

    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>#ID</th>
                <th>Ресурс</th>
                <th>Дата добавления</th>
                <th>Дата изменения</th>
                <th>Действия</th>
            </tr>
            @foreach($resources as $resource)
                <tr>
                    <th>{{ $resource->id }}</th>
                    <th>{{ $resource->resource }}</th>
                    <th>{{ $resource->created_at }}</th>
                    <th>{{ $resource->updated_at }}</th>
                    <th><a href="{{ route('admin.resources.edit', ['resource' => $resource]) }}">Редактировать</a> |
                        <a href="javascript:;" class="delete" rel="{{ $resource->id }}" rev="/admin/resources/"
                           style="color: red">Удалить</a></th>
                </tr>
            @endforeach
        </table>
{{--        {{ $resources->links() }}--}}
    </div>

@endsection
