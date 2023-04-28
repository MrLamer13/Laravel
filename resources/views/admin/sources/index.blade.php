@extends('layouts.admin')
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Источники для новости {{ $news->title }}</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.sources.create', ['newsId' => $news->id]) }}"
                   class="btn btn-sm btn-outline-secondary">Добавить
                    источник</a>
            </div>
        </div>
    </div>

    @include('inc.message')

    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>#ID</th>
                <th>Источник</th>
                <th>Адрес</th>
                <th>Дата добавления</th>
                <th>Дата изменения</th>
                <th>Действия</th>
            </tr>
            @foreach($sources as $source)
                <tr>
                    <th>{{ $source->id }}</th>
                    <th>{{ $source->title }}</th>
                    <th>{{ $source->url }}</th>
                    <th>{{ $source->created_at }}</th>
                    <th>{{ $source->updated_at }}</th>
                    <th><a href="{{ route('admin.sources.edit', ['source' => $source->id]) }}">Редактировать</a> |
                        <a href="javascript:;" class="delete" rel="{{ $source->id }}" rev="/admin/sources/"
                           style="color: red">Удалить</a></th>
                </tr>
            @endforeach
        </table>
    </div>

@endsection
