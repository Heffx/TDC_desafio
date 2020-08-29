<!--Name-->
<div class="form-group">
    <label for="name" class="col-sm-2 col-form-label .col-form-label">Nome</label>
    <div>
        <input placeholder="Nome" type="name" class="form-control" id="name" name="name" value="{{old('name',null)}}" required>
    </div>
</div>


<!--Price-->
<div class="form-group">
    <label for="price" class="col-sm-2 col-form-label .col-form-label">Preço</label>
    <div>
        <input placeholder="Preço" type="text" class="form-control" id="price" name="price" value="{{old('price',null)}}" required>
    </div>
</div>

<!--Amount-->
<div class="form-group">
    <label for="amount" class="col-sm-2 col-form-label .col-form-label">Quantidade</label>
    <div>
        <input placeholder="Quantidade" type="number" class="form-control" id="amount" name="amount" value="{{old('amount',null)}}" required>
    </div>
</div>
