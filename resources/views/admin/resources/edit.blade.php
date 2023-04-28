@extends('layouts.admin')
@section('content')
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h2>Редактирование ресурса</h2>
    </div>

    @include('inc.message')

    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif

    <div class="offset-2 col-8">
        <form method="post" action="{{ route('admin.resources.update', ['resource' => $resource]) }}">
            @csrf
            @method('put')
            <div class="form-group mb-3">
                <label for="resource">Ресурс</label>
                <input type="text" class="form-control" name="resource" id="resource" placeholder="Ресурс"
                       value="{{ $resource->resource }}">
                @error('resource')<strong style="color: red">{{ $message }}</strong>@enderror
            </div>
            <button class="btn btn-success mb-3" type="submit">Сохранить</button>
        </form>
    </div>
@endsection
