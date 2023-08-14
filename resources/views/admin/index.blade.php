@extends('layouts.app')

@section('content')
<div class="container">
    <h2 style="margin-bottom: 50px;">Адмін Панель</h2>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title" style="margin-bottom: 0;">Продукти</h3>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Загальна кількість: {{$products->count()}}</li>
                    <li class="list-group-item">Активні: {{$products->activeProductsCount()}}</li>
                    <li class="list-group-item">Неактивні: {{$products->notActiveProductsCount()}}</li>
                </ul>
                <div class="card-body">
                    <a href="{{route('admin.product.index')}}" class="btn btn-primary">Переглянути всі</a>
                    <a href="{{route('admin.product.create')}}" class="btn btn-success">Створити новий</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title" style="margin-bottom: 0;">Заявки</h3>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Загальна кількість: {{$orders->count()}}</li>
                    <li class="list-group-item">Нових: {{$orders->newOrdersCount()}}</li>
                    <li class="list-group-item">В обробці: {{$orders->inProgressOrdersCount()}}</li>
                </ul>
                <div class="card-body">
                    <a href="{{route('admin.order.index')}}" class="btn btn-primary">Переглянути всі</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection