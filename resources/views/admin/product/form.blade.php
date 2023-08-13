@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="offset-lg-4 col-lg-4">
            <form method="post" action="@isset($product){{route('admin.product.update', $product)}}@else{{route('admin.product.store')}}@endisset" enctype="multipart/form-data">
                @isset($product)@method('PUT')@endisset
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Назва</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{old('title', isset($product) ? $product->title : null)}}">
                    @include('layouts.error', ['fieldname' => 'title'])
                </div>
                <div class="mb-3">
                    <label for="short_description" class="form-label">Короткий опис</label>
                    <input type="text" class="form-control" id="short_description" name="short_description" value="{{old('short_description', isset($product) ? $product->short_description : null)}}">
                    @include('layouts.error', ['fieldname' => 'short_description'])
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Опис</label>
                    <textarea class="form-control" id="description" rows="8" name="description">{{old('description', isset($product) ? $product->description : null)}}</textarea>
                    @include('layouts.error', ['fieldname' => 'description'])
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Зображення</label>
                    <input class="form-control" type="file" id="image" name="image">
                    @include('layouts.error', ['fieldname' => 'image'])
                    @isset($product)
                        <input type="hidden" name="previous_image" value="$product->image">
                        <img class="w-100" src="{{Storage::url('images/' . $product->image)}}">
                    @endisset
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Ціна, ₴</label>
                    <input type="number" step="any" class="form-control" id="price" name="price" value="{{old('price', isset($product) ? $product->price : null)}}">
                    @include('layouts.error', ['fieldname' => 'price'])
                </div>
                <div class="mb-3">
                    <label for="is_active" class="form-label">Активність</label>
                    <select class="form-select" name="is_active" id="is_active">
                        <option value="0" @selected(old('is_active') == 0)>Неактивний</option>
                        <option value="1" @selected(old('is_active', isset($product) ? $product->is_active : true) == 1)>Активний</option>
                    </select>
                    @include('layouts.error', ['fieldname' => 'is_active'])
                </div>
                <button type="submit" class="btn btn-primary">@isset($product){{'Оновити'}}@else{{'Створити'}}@endisset  заявку</button>
            </form>
        </div>
    </div>
</div>
@endsection