@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-center">
    <div class="text-center">
        <h1 class="display-1 fw-bold">404</h1>
        <p class="fs-3"> <span class="text-danger">Ой лишеньки!</span> Сторінка не знайдена.</p>
        <p class="lead">
            {{$exception->getMessage()}}
            </p>
        <a href="{{route('home')}}" class="btn btn-primary">На головну</a>
    </div>
</div>
@endsection