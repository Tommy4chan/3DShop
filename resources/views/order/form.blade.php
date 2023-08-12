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
            <form method="post" action="{{route('order.store')}}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Ім'я*</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="number" class="form-label">Номер телефону*</label>
                    <input type="text" class="form-control" id="number" name="number">
                </div>
                <div class="mb-3">
                    <label for="comment" class="form-label">Коментар</label>
                    <textarea class="form-control" id="comment" style="resize:none" name="comment"></textarea>
                </div>
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <button type="submit" class="btn btn-primary">Створити заявку</button>
            </form>
            <a href="{{route('home')}}" class="btn btn-secondary" style="margin-top: 30px;">Повернутись назад</a>
        </div>
    </div>
</div>
@endsection