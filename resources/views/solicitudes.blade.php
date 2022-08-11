<!DOCTYPE html>
<html lang="MX-ESP">
    <head>
    <link rel="icon" href="{{ asset('img/ms-icon-310x310.png') }}">
    </head>
<header>
    <title>Administrador</title>
    <meta charset="UTF-8">
    <meta name="title" content="Administrador">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/mdb.min.css">
    
    @include('barra')
    
</header>
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
                <h4 class="card-header text-center font-weight-bold text-uppercase py-4">Solicitudes </h4>
                <div class="card-body">
                    <div id="table" class="table-editable">
                        <span class="table-add float-right mb-3 mr-2"><a href="e" class="text-success"></a>
                            <a class="btn btn-success btn-rounded" href="{{ route('nueva_solicitud') }}" role="button"><i class="bi bi-file-earmark-plus"></i>  Nueva solicitud</a>
                        </span>
                        <table class="table table-bordered table-responsive-md table-striped text-center" >
                            <thead>
                                <tr>
                                    <th class="text-center">Código de Solicitud</th>
                                    <th class="text-center">Productos totales</th>
                                    <th class="text-center">Usuario</th>
                                    <th class="text-center">Área</th>
                                    <th class="text-center">Estatus</th>
                                    <th class="text-center">Editar</th>
                                    <th class="text-center">Enviar</th>
                                </tr>
                            </thead>
                            <tbody HEIGHT="10">
                                @foreach($solicitudes as $solicitud)
                               
                                <tr>
                                    <td>{{ $solicitud->codigo_solicitud }}</td>
                                    <td>{{ $solicitud->num_productos }}</td>
                                    <td>{{ $solicitud->nombre }} {{ $solicitud->apellido_paterno }}</td>
                                    <td>{{ $solicitud->nombre_area }}</td>
                                    <td>
                                         @if($solicitud->idestatus == 1)
                                    <span class="badge badge-pill badge-info">{{ $solicitud->nombre_estatus }}</span>
                                    <td>
                                    <a style="color: #3498DB; " href="{{ route('editar_soli',['id'=>$solicitud->codigo_solicitud]) }}" role="button" ><i class="bi bi-pen"></i></a>
                                    </td> 
                                    <td>
                                    <a style="color: #3498DB; " href="{{ route('reporte_solicitud',['id'=>$solicitud->codigo_solicitud]) }}" role="button" ><i class="bi bi-send"></i></a>
                                    </td> 
                                        @endif
                                        @if($solicitud->idestatus == 2)
                                    <span class="badge badge-pill badge-warning">{{ $solicitud->nombre_estatus }}</span>
                                    <td>
                                        <a style="color: #3498DB; " href="{{ route('pdf_solicitudes',['id'=>$solicitud->codigo_solicitud]) }}" role="button"><i class="fas fa-file-pdf"></i></a> </td>
                                    </td>
                                    <td>
                                    <a style="color: #3498DB;" role="button" data-bs-toggle="modal" data-bs-target="#envioModal"><i class="bi bi-send"></i></a>
                                    </td> 
                                        <div class="modal fade" id="envioModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog cascading-modal" role="document">

                                            <!--Content-->
                                            <div class="modal-content">

                                            <!--Header-->
                                            <div class="modal-header light-blue darken-3 white-text">
                                                <h4 class="title"><i class="far fa-paper-plane"></i>Envio no disponible</h4>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                                                    aria-hidden="true">&times;</span></button>
                                            </div>

                                            <!--Body-->
                                            <div class="modal-body mb-0 text-center">
                                                <p>Su solicitud ya fue enviada </p>
                                            </div>

                                            </div>
                                            <!--/.Content-->

                                        </div>
                                        </div> 
                                    </td> 
                                        @endif
                                        @if($solicitud->idestatus == 3)
                                    <span class="badge badge-pill badge-success">{{ $solicitud->nombre_estatus }}</span>
                                    <td>
                                        <a style="color: #3498DB; " href="{{ route('pdf_solicitudes',['id'=>$solicitud->codigo_solicitud]) }}" role="button"><i class="bi bi-filetype-pdf"></i></a> </td>
                                    </td>
                                    <td>
                                    <a style="color: #3498DB;" role="button" data-bs-toggle="modal" data-bs-target="#envioModal"><i class="bi bi-send"></i></a>
                                    </td> 
                                        <div class="modal fade" id="envioModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog cascading-modal" role="document">

                                            <!--Content-->
                                            <div class="modal-content">

                                            <!--Header-->
                                            <div class="modal-header light-blue darken-3 white-text">
                                                <h4 class="title"><i class="far fa-paper-plane"></i>Envio no disponible</h4>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                                                    aria-hidden="true">&times;</span></button>
                                            </div>

                                            <!--Body-->
                                            <div class="modal-body mb-0 text-center">
                                                <p>Su solicitud ya fue enviada </p>
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
            <br>
            <span class="table-add float-right mb-3 mr-2"><a href="e" class="text-success"></a>
                {{ $solicitudes->links() }}
            </span>
        </div>
    </div>
</body>
<footer>
    @include('footer')
</footer>
</html>