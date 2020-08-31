@extends('layouts.app')
@section('content')
<div class="container">
    <table class="table table-striped my-4">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="row">Email</th>
            <th scope="col">Senha</th>
            <th scope="col">Tipo de Usuário</th>
        </tr>
        </thead>
        <tbody>
        @foreach(\App\User::paginate(10) as $users)
            <tr>
                <th scope="row">{{$users->id}}</th>
                <td scope="row">{{$users->name}}</td>
                <td scope="row">{{$users->email}}</td>
                <td scope="row">{{$users->password}}</td>
                <td>{{$users->type_user}}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<div id="pagination" class="span12" style="width: 300px; margin: 0 auto; float: none;">
    <div class="pagination align-content-center">
        {{\App\User::paginate(10)->links()}}
    </div>
</div>
@endsection
