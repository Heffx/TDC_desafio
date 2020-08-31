@extends('layouts.app')

@section('content')

    <h1 class="text-center my-4">Produtos</h1>
    <div class="container">
        <a class="btn btn-primary" href={{route('products.create')}} class="text-light">Criar Produtos</a>
    </div>
    <div class="container">
        <table class="table table-striped my-4">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Preço</th>
                <th scope="col">Quantidade</th>
            </tr>
            </thead>
            <tbody>
            @foreach(\App\Product::where('store_id', \Illuminate\Support\Facades\Auth::user()->Store->id)->paginate(10) as $products)
                <tr>
                    <th scope="row">{{$products->id}}</th>
                    <td scope="row">{{$products->name}}</td>
                    <td scope="row">{{$products->price}}</td>
                    <td>{{$products->amount}}</td>
                    <td>{{$products->store_id}}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div id="pagination" class="span12" style="width: 300px; margin: 0 auto; float: none;">
        <div class="pagination align-content-center">
            {{\App\Product::where('store_id', \Illuminate\Support\Facades\Auth::user()->Store->id)->paginate(10)->links()}}
        </div>
    </div>
@endsection
