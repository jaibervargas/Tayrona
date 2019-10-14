@extends('layouts.master')

@section('content')
<h3>editar el producto {{$productactualizar->id}}</h3>

<form action="{{Route('product.update',$productactualizar->id)}}" method="post">
    @method('put')
    @csrf
    <div class="form-group">
        <input type="text" name="name" class="form-control" id="recipient-name" value="{{$productactualizar->name}}">
    </div>
    <div class="form-group">
        <input type="text" name="descripcion" class="form-control" id="recipient-description" value="{{$productactualizar->descripcion}}">
    </div>
    <div class="form-group">
        <select name="categoria" id="recipient-category" class="form-control" >
            <option value="{{$productactualizar->categoria}}" ></option>
            <option value="opcion1" >opcion1</option>
            <option value="opcion2" >opcion2</option>
            <option value="opcion3" >opcion3</option>
            <option value="opcion4" >opcion4</option>
        </select>
    </div>
    <div class="form-group">
        <input type="text" name="precio" class="form-control" id="recipient-precio" value="{{$productactualizar->precio}}">
    </div>
    <div class="form-group">
        <label for="recipient-cantidad" class="col-form-label"></label>
        <input type="text" name="cantidad" class="form-control" id="recipient-cantidad" value="{{$productactualizar->cantidad}}">
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary" >Enviar</button>
    </div>
</form>

@endsection



