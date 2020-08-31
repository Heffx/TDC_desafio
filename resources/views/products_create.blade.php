@extends('layouts.app')

@section('content')
<style>
    .container_app{
        width: 600px;
    }
</style>
<h1 class="text-center my-4">Nova Produto</h1>

@include('errors')

<div class="container container_app">
    <form action="{{route('products.store')}}" method="post" data-toggle="validator">
        @csrf


        @include('products_form')

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Criar</button>
        </div>
    </form>
</div>
@endsection



