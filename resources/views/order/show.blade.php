@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row align-items-center">
        <div class="col-lg-4">
            <h2>{{$product->title}}</h2>
            <h4><span class="badge text-bg-success">{{$product->price}} ₴</span></h4>
            <span class="badge text-bg-secondary">Арт. {{$product->id}}</span>
            <img src="https://www.anycubic.com/cdn/shop/products/AnycubicKobra_7_1800x1800.jpg?v=1684458780" class="card-img-top" alt="...">
        </div>
        <div class="col-lg-8">
            <p>Номер замовлення: {{$order->id}}</p>
            <p>Ім'я: {{$order->name}}</p>
            <p>Номер: {{$order->number}}</p>
            <p>Коментар: @comment($order->comment)</p>
            @admin
                <form method="post" action="{{route('admin.order.update', $order)}}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3" style="width: 250px;">
                        <label for="status" class="form-label">Статус заявки:</label>
                        <select class="form-select" name="status" id="status">
                            @foreach($statuses as $status)
                            <option value="{{$loop->index}}" @selected($order->status == $loop->index)>{{$status}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Змінити</button>
                </form>
            @else
                <p>Статус: {{$order->status($statuses)}}</p>
            @endadmin
            <a href="{{route('home')}}" class="btn btn-secondary" style="margin-top: 30px;">Повернутись назад</a>
        </div>
    </div>
</div>
@endsection