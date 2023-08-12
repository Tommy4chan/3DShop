@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row align-items-center">
        <div class="col-lg-4">
            <img src="https://www.anycubic.com/cdn/shop/products/AnycubicKobra_7_1800x1800.jpg?v=1684458780" class="card-img-top" alt="...">
        </div>
        <div class="col-lg-8">
            <h2>{{$product->title}}</h2>
            <h4><span class="badge text-bg-success">{{$product->price}} ₴</span></h4>
            <span class="badge text-bg-secondary">Арт. {{$product->id}}</span>
            <p>{{$product->description}}</p>
            <a href="{{route('order.create', $product)}}" class="btn btn-dark">Залишити заявку</a>
            <a href="{{route('home')}}" class="btn btn-secondary">Повернутись назад</a>
        </div>
    </div>
</div>
@endsection