@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="{{ $news->image }}" alt="photo">
                <div class="card-body">
                    <h3>{{ $news->title }}</h3>
                    <p class="card-text">{!! $news->description !!}</p>
                    <a href="{{ $news->link }}">Перейти к новости</a><br>
                    <p class="card-text">Источники:</p>
                    @foreach($news->sources as $source)
                        <a href="{{ $source->url }}">{{ $source->title }}</a><br>
                    @endforeach
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted"><em>{{ $news->author }} | {{ $news->created_at }}</em></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
