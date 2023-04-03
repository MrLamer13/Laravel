@extends('layouts.main')
@section('content')
    <div class="container">
        <h2>Добро пожаловать, {{ Auth::user()->name }}!</h2>
        <br>
        @if(Auth::user()->is_admin)
            <a href="{{ route('admin.index') }}">Переход в админку</a>
        @endif

    </div>
@endsection
