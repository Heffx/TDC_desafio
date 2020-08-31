@extends('layouts.app')

@section('content')
    <style>
        .container_app{
            width: 800px;
        }
        .estrelas input[type=radio] {
            display: none;
        }
        .estrelas label i.fa:before {
            content:'\f005';
            color: #FC0;
        }
        .estrelas input[type=radio]:checked ~ label i.fa:before {
            color: #CCC;
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
            @foreach(\App\Store::paginate(10)   as $stores)
                <tr>
                    <th scope="row">{{$stores->id}}</th>
                    <td scope="row">{{$stores->name}}</td>
                    <td scope="row"><a class="btn btn-primary" href="#">Ver Produtos</a></td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-{{$stores->id}}">
                            Avaliar
                        </button>
                    </td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="modal-{{$stores->id}}" tabindex="-1" role="dialog" aria-labelledby="myModal- {{ $stores->name }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Avaliação</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{route('rankings.store')}}" method="POST" data-toggle="validator">
                                @csrf
                                <div class="modal-body">
                                    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
                                    <div class="estrelas">
                                        <input type="radio" id="cm_star-empty" name="rating" value="" checked/>
                                        <label for="cm_star-1"><i class="fa"></i></label>
                                        <input type="radio" id="cm_star-1" name="rating" value="1"/>
                                        <label for="cm_star-2"><i class="fa"></i></label>
                                        <input type="radio" id="cm_star-2" name="rating" value="2"/>
                                        <label for="cm_star-3"><i class="fa"></i></label>
                                        <input type="radio" id="cm_star-3" name="rating" value="3"/>
                                        <label for="cm_star-4"><i class="fa"></i></label>
                                        <input type="radio" id="cm_star-4" name="rating" value="4"/>
                                        <label for="cm_star-5"><i class="fa"></i></label>
                                        <input type="radio" id="cm_star-5" name="rating" value="5"/>
                                    </div>
                                    <div class="container">
                                        <input placeholder="Comentário" type="text" class="form-control" id="comment" name="comment">
                                    </div>
                                    <input type="hidden" id="store_id" name="store_id" value="{{$stores->id}}">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary">Avaliar</button>
                                </div>
                            </form>
                        </div>
                    </div>
            @endforeach
            </tbody>
        </table>
    </div>

    <div id="pagination" class="span12" style="width: 200px; margin: 0 auto; float: none;">
        <div class="pagination align-content-center">
            {{\App\Store::paginate(10)->links()}}
        </div>
    </div>



@endsection
