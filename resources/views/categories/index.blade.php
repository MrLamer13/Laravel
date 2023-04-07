@extends('layouts.main')

@section('content')
    <div class="row">
        <h1>Категории:</h1>
        @foreach ($categories as $category)
            <div class="col-12">
                <div class="card mb-4 box-shadow">
                    <div class="card-body">
                        <h2>
                            <a href="{{ route('categories.show', ['category' => $category]) }}">{{ $category->title }}</a>
                        </h2>
                        <img src="{{ $category->image }}">
                        <p>{{ $category->description }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $categories->links() }}
@endsection
