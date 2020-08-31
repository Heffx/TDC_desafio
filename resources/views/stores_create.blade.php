@extends('layouts.app')

@section('content')
        <style>
            .app{
                width: 600px;
            }
        </style>
        <h1 class="text-center my-4">Nova Loja</h1>

        @include('errors')

        <div class="container app">
            <form action="{{route('stores.store')}}" method="post" data-toggle="validator">
                @csrf

                @include('stores_form')

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Criar</button>
                </div>
            </form>
        </div>

@endsection



