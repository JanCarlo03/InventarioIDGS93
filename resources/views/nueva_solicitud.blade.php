<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="{{ asset('img/ms-icon-310x310.png') }}">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Productos</title>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/mdb.min.css">
    <script src=" {{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src=" {{ asset('js/jquery-ui.js') }}"></script>

    @include('barra')
</head>
<script>
    function goBack() {
        window.history.back();
        }
</script>
<body>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Productos </h3>
                <div class="card-body">
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">
                    {{ Session::get('message') }}
                    </div>
                @endif
                    <div id="table" class="table-editable">
                    <span class="table-add float-left mb-3 mr-2"><a href="e" class="text-success"></a>
                        <a class="btn-floating btn-primary" href="{{ route('solicitudes') }}"><i class="bi bi-arrow-left"></i></a>
                    </span>
                    <span class="table-add float-right mb-3 mr-2"><a href="e" class="text-success"></a>
                        <div class="input-group rounded">
                            <input type="text" class="form-control rounded" id="texto" placeholder="Buscar producto">
                            <div class="input-group-append">
                                <span class="input-group-text border-0">
                                    <i class="bi bi-search"></i>
                                </span>
                            </div>
                        </div>
                    </span>
                   
                    
                    <div class="table-responsive" id="resultados">
                            <table class="table  ">
                                <thead>
                                    <tr>
                                    <th class="text-center"> <b> Código del producto</b></th>
                                    <th class="text-center"> <b> Nombre del producto</b></th>
                                    <th class="text-center"> <b> Categoría </b></th>
                                    <th class="text-center"> <b> Añadir </b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach($busqueda as $producto)
                                        <td class="text-center">{{ $producto->codigo_producto }}</td>
                                        <td class="text-center">{{ $producto->nombre_producto }} {{ $producto->descripcion }}</td>
                                        <td class="text-center">{{ $producto->nombre_categoria }}</td>
                                        <td class="text-center">
                                        @if($producto->cantidad > 0)
                                            <a class="btn-floating btn-sm btn-secondary" href="{{ route('add',['id' => $producto->idproducto]  ) }}"><i class="bi bi-cart-plus"></i>
                                        @else
                                             <a class="btn-floating btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#solicitud_extra"><i class="bi bi-cart-plus"></i></a>
                                          <!-- Modal -->
                                            <div class="modal fade" id="solicitud_extra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-sm modal-bottom-right modal-notify modal-danger" role="document">
                                                <!--Content-->
                                                <div class="modal-content">
                                                    <!--Header-->
                                                    <div class="modal-header">
                                                        <p class="heading">PRODUCTOS SIN STOCK
                                                        </p>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true" class="white-text">&times;</span>
                                                        </button>
                                                    </div>

                                                    <!--Body-->
                                                    <div class="modal-body">

                                                        <div class="row">
                                                        <div class="col-3">
                                                            <p></p>
                                                            <p class="text-center">
                                                            <i class="fas fa-ban fa-2x"></i>
                                                            </p>
                                                        </div>

                                                        <div class="col-9">
                                                            <p>No se encuentra en inventario actualmente </p>
                                                        </div>
                                                        </div>
                                                    </div>

                                                    <!--Footer-->
                                                    <div class="modal-footer flex-center">
                                                        <a type="button" class="btn btn-danger btn-rounded" data-bs-dismiss="modal">Cerrar</a>
                                                    </div>
                                                    </div>
                                                <!--/.Content-->
                                            </div>
                                        </div>
                                        @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                          
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <span class="table-add float-right mb-3 mr-2"><a href="e" class="text-success"></a>
                {{ $busqueda->links() }}
            </span>
        </div>
    </div>
</body>
<script>
    window.addEventListener('load',function(){
        document.getElementById("texto").addEventListener("keyup",() => {
            if((document.getElementById("texto").value.length)>=1)
            fetch('buscador?texto='+document.getElementById("texto").value,{method:'get'})
            .then(response => response.text() )
            .then(html => {document.getElementById("resultados").innerHTML = html })
            else
                document.getElementById("resultados").innerHTML = ""
        })
    })
</script>
</html>
@include('footer')
