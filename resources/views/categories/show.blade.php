@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 box-shadow">
                    <div class="card-body">
                        <h2>{{ $category[1]['title'] }}</h2>
                        <div class="card-group">
                            @foreach ($category[1]['news'] as $key => $news)
                                <div class="col-md-4">
                                    <div class="card mb-4 box-shadow">
                                        <img class="card-img-top" src="{{ $news['image'] }}" alt="{{ $news['title'] }}">
                                        <div class="card-body">
                                            <h3>{{ $news['title'] }}</h3>
                                            <p class="card-text">{!! $news['description'] !!}</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <a href="{{ route('news.show', ['id' => $key]) }}"
                                                       class="btn btn-sm btn-outline-secondary">Подробнее</a>
                                                </div>
                                                <small class="text-muted"><em>{{ $news['author'] }}
                                                        | {{ $news['created_at'] }}</em></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
