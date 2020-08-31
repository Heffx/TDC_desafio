@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-striped my-4">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Avaliação</th>
                <th scope="col">Comentário</th>
            </tr>
            </thead>
            <tbody>
            @foreach(\App\Ranking::paginate(10) as $rankings)
                <tr>
                    <th scope="row">{{$rankings->id}}</th>
                    <td scope="row">{{$rankings->rating}}</td>
                    <td scope="row">{{$rankings->comment}}</td>

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
