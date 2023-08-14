@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.css">

<style>
    .iti{
        display: block !important;
    }
</style>

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
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                    @include('layouts.error', ['fieldname' => 'name'])
                </div>
                <div class="mb-3">
                    <label for="number" class="form-label">Номер телефону*</label>
                    <input type="tel" class="form-control" id="number" name="number" value="{{old('number')}}">
                    @include('layouts.error', ['fieldname' => 'number'])
                </div>
                <div class="mb-3">
                    <label for="comment" class="form-label">Коментар</label>
                    <textarea class="form-control" id="comment" style="resize:none" name="comment">{{old('comment')}}</textarea>
                    @include('layouts.error', ['fieldname' => 'comment'])
                </div>
                <div class="mb-3">
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    @include('layouts.error', ['fieldname' => 'product_id'])
                </div>
                <button type="submit" class="btn btn-primary">Створити заявку</button>
            </form>
            <a href="{{route('home')}}" class="btn btn-secondary" style="margin-top: 30px;">Повернутись назад</a>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>
<script type="module">
  const input = document.querySelector("#number");
  window.intlTelInput(input, {
    utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js",
    defaultCountry: 'auto',
    preferredCountries: ['ua']
  });
</script>
@endsection