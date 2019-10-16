@extends('layouts.master')

@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h3>Producto: {{$productactualizar->id}}</h3>

                <form action="{{Route('product.update',$productactualizar->id)}}" method="post">
                    @method('put')
                    @csrf
                    <div class="form-row">

                        <div class="form-group col-md-5">
                            <label for="">Nombre Producto</label>
                            <input type="text" name="name" class="form-control" id="recipient-name" value="{{$productactualizar->name}}">
                        </div>

                        <div class="form-group col-md-5">
                            <label for="">Descripcion</label>
                            <input type="text" name="descripcion" class="form-control" id="recipient-description" value="{{$productactualizar->descripcion}}">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="">Categoria</label>
                            <select name="categoria" id="recipient-category" class="form-control" >
                                <option value="{{$productactualizar->categoria}}" ></option>
                                <option value="opcion1" >opcion1</option>
                                <option value="opcion2" >opcion2</option>
                                <option value="opcion3" >opcion3</option>
                                <option value="opcion4" >opcion4</option>
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="">Precio</label>
                            <input type="text" name="precio" class="form-control" id="recipient-precio" value="{{$productactualizar->precio}}">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" >cantidad</label>
                            <input type="text" name="cantidad" class="form-control" id="recipient-cantidad" value="{{$productactualizar->cantidad}}">
                        </div>
                        <div class="modal-footer col-md-12">

                            <button type="submit" class="btn btn-primary" >Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection



