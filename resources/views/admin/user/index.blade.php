@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">Ім'я</th>
                <th scope="col">Електронна адреса</th>
                <th scope="col">Адмін</th>
                <th scope="col">Дії</th>
            </tr>
        </thead>
        <tbody class="align-middle">
            @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>@status($user->is_admin)</td>
                <td>
                    @if($user->is_admin)
                        <a href="{{route('admin.user.make.admin', $user)}}" class="btn btn-primary">Видалити адміністратора</a>
                    @else
                        <a href="{{route('admin.user.make.admin', $user)}}" class="btn btn-primary">Зробити адміністратором</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        {!! $users->links() !!}
    </div>
</div>
@endsection