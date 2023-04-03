@extends('layouts.admin')
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Новости</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.news.create') }}" class="btn btn-sm btn-outline-secondary">Добавить новость</a>
            </div>
        </div>
    </div>

    @include('inc.message')

    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>#ID</th>
                <th>Категория</th>
                <th>Заголовок</th>
                <th>Автор</th>
                <th>Статус</th>
                <th>Видимость</th>
                <th>Дата добавления</th>
                <th>Дата изменения</th>
                <th>Действия</th>
            </tr>
            @foreach($news as $newsItem)
                <tr>
                    <th>{{ $newsItem->id }}</th>
                    <th>{{ $newsItem->categories->pluck('title')->implode(', ')}}</th>
                    <th>{{ $newsItem->title }}</th>
                    <th>{{ $newsItem->author }}</th>
                    <th>{{ $newsItem->status }}</th>
                    <th>@if($newsItem->isVisible)
                            Видимая
                        @else
                            Не видимая
                        @endif</th>
                    <th>{{ $newsItem->created_at }}</th>
                    <th>{{ $newsItem->updated_at }}</th>
                    <th><a href="{{ route('admin.news.edit', ['news' => $newsItem]) }}">Редактировать</a> |
                        <a href="{{ route('admin.news.sources', ['news' => $newsItem]) }}">Источники</a> |
                        <a href="javascript:;" class="delete" rel="{{ $newsItem->id }}" rev="/admin/news/"
                           style="color: red">Удалить</a>
                    </th>
                </tr>
            @endforeach
        </table>

        {{ $news->links() }}
    </div>

@endsection
