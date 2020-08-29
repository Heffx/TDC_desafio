<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Stores</title>
</head>
<body>
<h1 class="text-center my-4">Lojas</h1>
<div class="container">
    <a class="btn btn-primary" href={{route('stores.create')}} class="text-light">Criar Loja</a>
</div>
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

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
