@extends('layouts.app')

@section('content')
<div class="container">
    <form class="row g-3" method="get" action="{{route('admin.order.index')}}">
        <div class="col-auto">
            <div class="input-group mb-3">
                <span class="input-group-text">Фільтр</span>
                <select class="form-select" name="filter" id="filter">
                    <option value="">Всі</option>
                    
                    @foreach($statuses as $status)
                        <option value="{{$loop->index}}" @selected(request()->get('filter') != null && $loop->index == request()->get('filter'))>{{$status}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Застосувати</button>
            <a href="{{route('admin.order.index')}}" class="btn btn-secondary mb-3">Очистити</a>
        </div>
    </form>
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">Ім'я</th>
                <th scope="col">Номер телефону</th>
                <th scope="col">Коментар</th>
                <th scope="col">Статус</th>
                <th scope="col">Дії</th>
            </tr>
        </thead>
        <tbody class="align-middle">
            @foreach($orders as $order)
            <tr>
                <th scope="row">{{$order->id}}</th>
                <td>{{$order->name}}</td>
                <td>{{$order->number}}</td>
                <td>@comment(Str::limit($order->comment, 50))</td>
                <td>{{$order->status($statuses)}}</td>
                <td>
                    <a href="{{route('order.show', $order)}}" class="btn btn-primary">Переглянути</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        {!! $orders->links() !!}
    </div>
</div>
@endsection