@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-center">
    <div class="text-center">
        <h1 class="display-1 fw-bold">Дякуємо за заявку</h1>
        <p class="fs-3">Заявка номер {{session('order')}}</p>
        <p class="lead">
            Очікуйте, протягом доби з вам зв’яжеться менеджер.
        </p>
        <a href="{{route('home')}}" class="btn btn-primary">На головну</a>
        <a href="{{route('order.show', session('order'))}}" class="btn btn-dark">Заявка</a>
    </div>
</div>
@endsection