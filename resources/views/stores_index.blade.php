@extends('layouts.app')
    <title>Stores</title>
@section('content')
    <h1 class="text-center my-4">Lojas</h1>
    @if(\Illuminate\Support\Facades\Auth::check())
        @php
            $user = \Illuminate\Support\Facades\Auth::user()
        @endphp
        @if($user->can('create', \App\Store::class))
        <div class="container">
            <a class="btn btn-primary" href={{route('stores.create')}} class="text-light">Criar Loja</a>
        </div>
        @endif
    @endif

    <div class="container">
        <table class="table table-striped my-4">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">CNPJ</th>
                <th scope="col">Endereço</th>
                <th scope="col">Telefone</th>
            </tr>
            </thead>
            <tbody>
            @foreach(\App\Store::paginate(10) as $stores)
                <tr>
                    <th scope="row">{{$stores->id}}</th>
                    <td scope="row">{{$stores->name}}</td>
                    <td scope="row">{{$stores->document_number}}</td>
                    <td>{{$stores->address}}</td>
                    <td scope="row">{{$stores->phone}}</td>
                    <td scope="row">{{$stores->user_id}}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div id="pagination" class="span12" style="width: 300px; margin: 0 auto; float: none;">
        <div class="pagination align-content-center">
            {{\App\Store::paginate(10)->links()}}
        </div>
    </div>
@endsection
