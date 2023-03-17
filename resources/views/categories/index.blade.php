@extends('layouts.main')

@section('content')
    <div class="row">
        <h1>Категории:</h1>
        @foreach ($categories as $key => $category)
            <div class="col-12">
                <div class="card mb-4 box-shadow">
                    <div class="card-body">
                        <h2><a href="{{ route('categories.show', ['id' => $key]) }}">{{ $category['title'] }}</a>
                        </h2>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
