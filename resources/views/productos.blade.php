<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="{{ asset('img/ms-icon-310x310.png') }}">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Productos</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/mdb.min.css">
    @include('barra')
</head>
<body>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @if(Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('message') }}
                </div>
            @endif
            @if(Session::has('message2'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('message2') }}
                </div>
            @endif
            @if(Session::has('message5'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('message5') }}
                </div>
            @endif
                <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Productos </h3>
                <div class="card-body">
                    <div id="table" class="table-editable">
                        <span class="table-add float-lefth mb-3 mr-2"><a href="e" class="text-success"></a>
                            <a class="btn peach-gradient btn-rounded" href="{{ route('reporte_productos') }}" role="button"><i class="bi bi-file-pdf"></i> Reporte</a>
                        </span>
                        <span class="table-add float-right mb-3 mr-2"><a href="e" class="text-success"></a>
                            <a class="btn btn-info btn-rounded" href="{{ route ('nuevo_producto') }}" role="button"><i class="bi bi-clipboard2-plus"></i>  Añadir</a>
                        </span>
                        <span class="table-add float-center mb-3 mr-2"><a href="e" class="text-success"></a>
                            <a class="btn btn-info btn-rounded" href="{{ route ('excel') }}" role="button"><i class="bi bi-clipboard2-plus"></i>  Excel</a>
                        </span>
                        <table class="table table-bordered table-responsive-md table-striped text-center" >
                            <thead>
                                <tr>
                                    <th style="width:200px" class="text-center">Código de producto</th>
                                    <th style="width:200px" class="text-center">Nombre</th>
                                    <th style="width:1px" class="text-center">Cantidad en stock</th>
                                    <th style="width:150px" class="text-center">Categoría</th>
                                    <th style="width:150px" class="text-center">Tipo de unidad</th>
                                    <th style="width:1px" class="text-center">Estatus</th>
                                    <th style="width:1px" class="text-center">Editar</th>
                                    <th style="width:1px" class="text-center">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody HEIGHT="10">
                                @foreach($productos as $producto)
                                <tr>
                                    <td >{{ $producto->codigo_producto }}</td>
                                    <td >{{ $producto->nombre_producto }} {{ $producto->descripcion }}</td>
                                    <td class="danger" >{{ $producto->cantidad }}</td>
                                    <td>{{ $producto->nombre_categoria }}</td>
                                    <td>{{ $producto->nombre_unidad }}</td>
                                    <td> {{ $producto->activo ==1? 'Activo': 'Inactivo'}}</td> 
                                    <td>
                                        <a style="color: #3498DB; " href="{{ route('editar_producto',['id'=>$producto->idproducto]) }}" role="button" ><i class="bi bi-pencil"></i></a>
                                    </td>
                                    <td>
                                        <a style="color: #E74C3C;" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal{{$producto->idproducto}}" >
                                        <i class="bi bi-trash"></i></a>                                        
                                            <div class="modal fade" id="exampleModal{{$producto->idproducto}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
                                                    <div class="modal-content text-center">
                                                        <div class="modal-header d-flex justify-content-center">
                                                            <p class="heading">¿Estas seguro de eliminar el producto?</p>
                                                        </div>
                                                        <div class="modal-body">
                                                            <i class="fas fa-times fa-4x animated rotateIn"></i>
                                                        </div>
                                                        <div class="modal-footer flex-center">
                                                        <form action="{{ route('borrar_producto',['id'=>$producto->idproducto]) }}" method="GET" name="nuevo" enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                            <button class="btn  btn-outline-danger" type="submit" >Si</button>
                                                            </form>
                                                            <a type="button" class="btn  btn-danger waves-effect" data-bs-dismiss="modal" aria-label="Close">No</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            <span class="table-add float-right mb-3 mr-2"><a href="e" class="text-success"></a>
                {{ $productos->links() }}
            </span>
        </div>
    </div>
</body>
<footer>
    @include('footer')
</footer>
</html>