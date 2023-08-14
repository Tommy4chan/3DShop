@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row align-items-center">
        <div class="col-lg-4">
            <img src="{{Storage::url('images/' . $product->image)}}" class="card-img-top">
        </div>
        <div class="col-lg-8">
            <h2>{{$product->title}}</h2>
            <h4><span class="badge text-bg-success">{{$product->price}} ₴</span></h4>
            <span class="badge text-bg-secondary">Арт. {{$product->id}}</span>
            @admin<span class="badge text-bg-dark">Активний: @status($product->is_active)</span>@endadmin
            <p>{{$product->description}}</p>
            <a href="{{route('order.create', $product)}}" class="btn btn-dark">Залишити заявку</a>
            <a href="{{route('home')}}" class="btn btn-secondary">Повернутись назад</a>
        </div>
    </div>
</div>
@endsection