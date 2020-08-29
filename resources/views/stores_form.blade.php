<!--Name-->
<div class="form-group">
    <label for="name" class="col-sm-2 col-form-label .col-form-label">Nome</label>
    <div>
        <input placeholder="Nome" type="name" class="form-control" id="name" name="name" value="{{old('name',null)}}" required>
    </div>
</div>


<!--Document_Number-->
<div class="form-group">
    <label for="document_number" class="col-sm-2 col-form-label .col-form-label">CNPJ</label>
    <div>
        <input placeholder="CNPJ" type="text" class="form-control" id="document_number" name="document_number" value="{{old('document_number',null)}}" required>
    </div>
</div>

<!--Address-->
<div class="form-group">
    <label for="address" class="col-sm-2 col-form-label .col-form-label">Endereço</label>
    <div>
        <input placeholder="Endereço" type="text" class="form-control" id="address" name="address" value="{{old('address',null)}}" required>
    </div>
</div>

<!--Phone-->
<div class="form-group">
    <label for="phone" class="col-sm-2 col-form-label .col-form-label">Telefone</label>
    <div>
        <input placeholder="Telefone" type="text" class="form-control" id="phone" name="phone" value="{{old('phone',null)}}" required>
    </div>
</div>
