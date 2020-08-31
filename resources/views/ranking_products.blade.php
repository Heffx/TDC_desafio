@extends('layouts.app')

@section('content')
    <style>
        .container_app{
            width: 800px;
        }
    </style>
    <h1 class="text-center my-4">Avaliação</h1>
    <div class="container container_app">
        <table class="table table-striped my-4">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach(\App\Product::all() as $product)
                <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td scope="row">{{$product->name}}</td>
                    <td scope="row"><a class="btn btn-primary">Avaliar</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div id="pagination" class="span12" style="width: 300px; margin: 0 auto; float: none;">
        <div class="pagination align-content-center">
            {{\App\Product::paginate(10)->links()}}
        </div>
    </div>
@endsection
