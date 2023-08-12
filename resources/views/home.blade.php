@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($products as $product)
        <div class="col-lg-3">
            <div class="card">
                <img src="https://www.anycubic.com/cdn/shop/products/AnycubicKobra_7_1800x1800.jpg?v=1684458780" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$product->title}}</h5>
                    <h4><span class="badge text-bg-success">{{$product->price}} ₴</span></h4>
                    <p class="card-text">{{$product->short_description}}</p>
                    <a href="{{route('product.show', $product)}}" class="btn btn-primary" style="margin-bottom: 10px">Переглянути детальніше</a>
                    <a href="{{route('order.create', $product)}}" class="btn btn-dark">Залишити заявку</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection