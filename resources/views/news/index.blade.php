@extends('layouts.main')

@section('content')
    <div class="row">
        <h1>Новости</h1>
        @forelse ($newsList as $news)
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{ $news->image }}" alt="photo">
                    <div class="card-body">
                        <h3>{{ $news->title }}</h3>
                        @if(!$news->isVisible) <b>Приватная новость</b> @endif
                        <p class="card-text">{!! $news->description !!}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ route('news.show', ['news' => $news]) }}"
                                   class="btn btn-sm btn-outline-secondary">Подробнее</a>
                            </div>
                            <small class="text-muted"><em>{{ $news->author }}
                                    | {{ $news->created_at }}</em></small>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <h2>Новостей нет</h2>
        @endforelse
    </div>
    {{ $newsList->links() }}
@endsection

