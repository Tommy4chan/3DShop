@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{route('admin.product.create')}}" class="btn btn-success">Створити новий</a>
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">Арт.</th>
                    <th scope="col">Назва</th>
                    <th scope="col">Ціна</th>
                    <th scope="col">Продано</th>
                    <th scope="col">Видимий</th>
                    <th scope="col">Дії</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <th scope="row">{{$product->id}}</th>
                        <td>{{$product->title}}</td>
                        <td>{{$product->price}} ₴</td>
                        <td>{{$product->soldCount()}}</td>
                        <td>@if($product->is_active){{'Так'}}@else{{'Ні'}}@endif</td>
                        <td>
                            <a href="{{route('product.show', $product)}}" class="btn btn-primary">Переглянути</a>
                            <a href="{{route('admin.product.edit', $product)}}" class="btn btn-dark" style="margin: 0 10px;">Редагувати</a>
                            <a class="btn btn-danger" onclick="event.preventDefault();document.getElementById('delete-product-{{$product->id}}').submit();">Видалити</a>
                            <form id="delete-product-{{$product->id}}" action="{{route('admin.product.destroy', $product)}}" method="post" class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>
@endsection