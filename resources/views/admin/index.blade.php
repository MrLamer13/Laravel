@extends('layouts.admin')
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Админка</h1>
    </div>
    <h2>Добро пожаловать в Админку!</h2>
    @php $message = 'Сообщение типа ' @endphp
    <x-alert type="danger" :message="$message . 'danger'"></x-alert>
    <x-alert type="primary" :message="$message . 'primary'"></x-alert>
    <x-alert type="secondary" :message="$message . 'secondary'"></x-alert>
    <x-alert type="success" :message="$message . 'success'"></x-alert>
    <x-alert type="warning" :message="$message . 'warning'"></x-alert>
    <x-alert type="info" :message="$message . 'info'"></x-alert>
    <x-alert type="light" :message="$message . 'light'"></x-alert>
    <x-alert type="dark" :message="$message . 'dark'"></x-alert>
@endsection
