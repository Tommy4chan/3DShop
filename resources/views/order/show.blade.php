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
            <p>Коментар: @if($order->comment != null) {{$order->comment}} @else {{'Відсутній'}} @endif</p>
            <p>Статус: {{$order->status()}}</p>
            <a href="{{route('home')}}" class="btn btn-secondary" style="margin-top: 30px;">Повернутись назад</a>
        </div>
    </div>
</div>
@endsection