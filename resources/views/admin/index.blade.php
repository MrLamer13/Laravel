@extends('layouts.admin')
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Админка</h1>
    </div>
    <h2>Добро пожаловать в Админку!</h2>
    @php
        $message = 'Сообщение типа ';
        $types = [
            'danger',
            'primary',
            'secondary',
            'success',
            'warning',
            'info',
            'light',
            'dark',
            ];
    @endphp
    @foreach($types as $type)
        <x-alert :type="$type" :message="$message . $type"></x-alert>
    @endforeach
@endsection
