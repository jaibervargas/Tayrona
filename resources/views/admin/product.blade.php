@extends('layouts.master')


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8"><h2>Productos </h2></div>
                            <div class="col-sm-4 text-right">
                                <button type="button" class="btn btn-info add-new" data-toggle="modal" data-target="#modal" ><i class="fa fa-plus"></i> Add New</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>NOMBRE</th>
                                <th>DESCRIPCION</th>
                                <th>CATEGORIAS</th>
                                <th>PRECIO</th>
                                <th>CANTIDAD</th>
                                <th class="">ACCIONES</th>
                            </thead>

                            <tbody>
                               @foreach($product as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->descripcion}}</td>
                                    <td>{{$item->categoria}}</td>
                                    <td >{{$item->precio}}</td>
                                    <td>{{$item->cantidad}}</td>
                                    <td class="td-actions ">

                                        <!--<button  type="button" rel="tooltip" class="btn btn-round btn-info btn-icon">
                                            <i class="now-ui-icons users_single-02"></i>
                                        </button>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                            <label  class="custom-control-label" for="customSwitch1">Activo</label>
                                        </div>-->
                                        <a href="{{Route('product.edit',$item->id)}}"><button  type="button" rel="tooltip" class="btn btn-round btn-success btn-icon">
                                            <i class="now-ui-icons ui-2_settings-90"></i>
                                        </button></a>
                                        <form action="{{Route('product.destroy',$item->id)}}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button  type="submit" rel="tooltip"  class="btn btn-round btn-danger btn-icon">
                                                <i class="now-ui-icons ui-1_simple-remove"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                        @if(session('eliminar'))
                            <div class="alert alert-success alert-dismissible fade show " role="alert">
                                <strong>Exito!</strong>  {{session('eliminar')}}
                                <button class="close" type="button" data-dismiss="alert" aria-label="close">
                                    <span aria-label="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        {{$product->links()}}
                    </div>
                </div>
            </div>
        </div>
        <!--modal para agregar productos-->
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal">Nuevo producto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <spam aria-hidden="true">&times;</spam>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{Route('product.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name"  class="col-form-label">Nombre</label>
                                <input type="text" name="name" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                                <label for="recipient-description" class="col-form-label">Descripcion</label>
                                <input type="text" name="descripcion" class="form-control" id="recipient-description">
                            </div>
                            <div class="form-group">
                                <label for="recipient-" class="col-form-label">Categoria</label>
                                <select name="categoria" id="recipient-category" class="form-control" >
                                    <option value="" ></option>
                                    <option value="perros" >Perros</option>
                                    <option value="gatos" >Gatos</option>
                                    <option value="otras mascotas" >Otras Mascotas</option>
                                    <option value="accesorios" >Accesorios</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="recipient-precio" class="col-form-label">Valor</label>
                                <input type="text" name="precio" class="form-control" id="recipient-precio">
                            </div>
                            <div class="form-group">
                                <label for="recipient-cantidad" class="col-form-label">Cantidad</label>
                                <input type="text" name="cantidad" class="form-control" id="recipient-cantidad">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                                <button type="submit" class="btn btn-primary" >Enviar</button>
                            </div>
                        </form>
                    </div>

                    @if(session('agregar'))
                        <div class="alert alert-info alert-with-icon" data-notify="container">
                            <button type="button" aria-hidden="true" class="close">
                                <i class="now-ui-icons ui-1_simple-remove"></i>
                            </button>
                            <span data-notify="icon" class="now-ui-icons ui-1_bell-53"></span>
                            <span data-notify="message">{{session('agregar')}}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
    <!--<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap Table with Add and Delete Row Feature</title>
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans"> <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet"
              href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style type="text/css">     body {         color: #404E67;         background: #F5F7FA; font-family: 'Open Sans', sans-serif;
            }
            .table-wrapper { width: 700px; margin: 30px auto;
                background: #fff;         padding: 20px;
                box-shadow: 0 1px 1px rgba(0,0,0,.05);
            }
            .table-title {
                padding-bottom: 10px;
                margin: 0 0 10px;
            }
            .table-title h2 {         margin: 6px 0 0;
                font-size: 22px;
            }
            .table-title .add-new {         float: right; height: 30px; font-weight: bold; font-size: 12px; text-shadow: none;
                min-width: 100px; border-radius: 50px;
                line-height: 13px;
            }
            .table-title .add-new i { margin-right: 4px;
            }     table.table {         table-layout: fixed;
                  }
            table.table tr th, table.table tr td {
                border-color: #e9e9e9;
            }     table.table th i {         font-size: 13px;         margin: 0 5px;
                      cursor: pointer;
                  }
            table.table th:last-child {
                width: 100px;
            }
            table.table td a { cursor: pointer;
                display: inline-block;         margin: 0 5px; min-width: 24px;
            }  table.table td a.add {
                   color: #27C46B;
               }
            table.table td a.edit {
                color: #FFC107;
            }
            table.table td a.delete {
                color: #E34724;
            }     table.table td i {         font-size: 19px;
                  }
            table.table td a.add i {
                font-size: 24px;
                margin-right: -1px;
                position: relative;
                top: 3px;     }
            table.table .form-control {         height: 32px;         line-height: 32px;         box-shadow: none;
                border-radius: 2px;
            }
            table.table .form-control.error { border-color: #f50000;
            }
            table.table td .add { display: none;
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip(); var actions = $("table td:last-child").html();
// Append table with add row form on add new button click
                $(".add-new").click(function(){
                    $(this).attr("disabled", "disabled");
                    var index = $("table tbody tr:last-child").index();
                    var row = '<tr>' +
                        '<td><input type="text" class="form-control" name="name" id="name"></td>' +
                        '<td><input type="text" class="form-control" name="department" id="department"></td>' +
                        '<td><input type="text" class="form-control" name="phone" id="phone"></td>' +
                        '<td>' + actions + '</td>' +
                        '</tr>';
                    $("table").append(row);
                    $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();         $('[data-toggle="tooltip"]').tooltip();
                });
// Add row on add button click
                $(document).on("click", ".add", function(){ var empty = false;
                    var input = $(this).parents("tr").find('input[type="text"]');
                    input.each(function(){
                        if(!$(this).val()){
                            $(this).addClass("error"); empty = true;
                        } else{
                            $(this).removeClass("error");
                        }
                    });
                    $(this).parents("tr").find(".error").first().focus(); if(!empty){ input.each(function(){
                        $(this).parent("td").html($(this).val());
                    });
                        $(this).parents("tr").find(".add, .edit").toggle();
                        $(".add-new").removeAttr("disabled");
                    }
                });
// Edit row on edit button click
                $(document).on("click", ".edit", function(){
                    $(this).parents("tr").find("td:not(:last-child)").each(function(){
                        $(this).html('<input type="text" class="form-control" value="' +
                            $(this).text() + '">');
                    });
                    $(this).parents("tr").find(".add, .edit").toggle();
                    $(".add-new").attr("disabled", "disabled");
                });
// Delete row on delete button click
                $(document).on("click", ".delete", function(){
                    $(this).parents("tr").remove();
                    $(".add-new").removeAttr("disabled");
                });
            });
        </script>
    </head>
    <body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Employee <b>Details</b></h2></div>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">                 <thead>
                <tr>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>John Doe</td>
                    <td>Administration</td>
                    <td>(171) 555-2222</td>
                    <td>
                        <a class="add" title="Add"
                           data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>                             <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        <a class="delete" title="Delete" data-toggle="tooltip"><i
                                class="material-icons">&#xE872;</i></a>
                    </td>
                </tr>
                <tr>
                    <td>Peter Parker</td>
                    <td>Customer Service</td>
                    <td>(313) 555-5735</td>
                    <td>
                        <a class="add" title="Add"
                           data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>                             <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        <a class="delete" title="Delete" data-toggle="tooltip"><i
                                class="material-icons">&#xE872;</i></a>
                    </td>
                </tr>
                <tr>
                    <td>Fran Wilson</td>
                    <td>Human Resources</td>
                    <td>(503) 555-9931</td>
                    <td>
                        <a class="add" title="Add"
                           data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>                             <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        <a class="delete" title="Delete" data-toggle="tooltip"><i
                                class="material-icons">&#xE872;</i></a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    </body>
    </html>

//modal de añadir productos
    <script>
        $('#modal').on('show.bs.modal',function (event) {
            var button = $(event.relatedTarget)
            var recipient = button.data('whatever')

            var modal=$(this)
            modal.find('.modal-title').text('New message to' + recipient)
            modal.find('.modal-body input').val(recipient)
        })
    </script>-->

@endsection



