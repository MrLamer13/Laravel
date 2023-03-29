@extends('layouts.admin')
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Заказы на получение выгрузки данных</h2>
    </div>

    @include('inc.message')

    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>#ID</th>
                <th>Имя заказчика</th>
                <th>Номер телефона</th>
                <th>Email</th>
                <th>Запрос</th>
                <th>Дата добавления</th>
                <th>Действия</th>
            </tr>
            @foreach($ordersfordata as $orderfordata)
                <tr>
                    <th>{{ $orderfordata->id }}</th>
                    <th>{{ $orderfordata->name }}</th>
                    <th>{{ $orderfordata->phone }}</th>
                    <th>{{ $orderfordata->email }}</th>
                    <th>{{ $orderfordata->order }}</th>
                    <th>{{ $orderfordata->created_at }}</th>
                    <th><a href="javascript:;" class="delete" rel="{{ $orderfordata->id }}" rev="/admin/orderfordata/"
                           style="color: red">Удалить</a></th>
                </tr>
            @endforeach
        </table>
    </div>

@endsection
