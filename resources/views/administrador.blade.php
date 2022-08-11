
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    @include('barra')
    <script> 
        function alertaEliminacion(){
            var idusuario = $(this).data('idusuario');
            Swal.fire({
            title: '¿Estas seguro?',
            text: "Deseas eliminar este usuario",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si'
            })
        }

    </script>
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
            @if(Session::has('message2'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('message2') }}
                </div>
            @endif
            @if(Session::has('message3'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('message3') }}
                </div>
            @endif
            @if(Session::has('message4'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('message4') }}
                </div>
            @endif
            @if(Session::has('message5'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('message5') }}
                </div>
            @endif
            <!-- Muestro el mensaje de validación -->
            @include('alerts')
                <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Usuarios </h3>
                <div class="card-body">
                    <div id="table" class="table-editable">
                    <span class="table-add float-lefth mb-3 mr-2"><a href="e" class="text-success"></a>
                            <a class="btn purple-gradient btn-rounded" href="{{ route('reporte_usuario') }}" role="button"><i class="bi bi-file-earmark-pdf"></i> Reporte</a>
                        </span>
                        <span class="table-add float-right mb-3 mr-2"><a href="e" class="text-success"></a>
                            <a class="btn aqua-gradient btn-rounded" href="{{ route ('registro') }}" role="button"><i class="bi bi-person-plus"></i>  Añadir</a>
                        </span>
                        <table class="table table-bordered table-responsive-md table-striped text-center" >
                            <thead>
                                <tr>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Apellido paterno</th>
                                    <th class="text-center">Apellido materno</th>
                                    <th class="text-center">Correo</th>
                                    <th style="width:1px" class="text-center">Estado</th>
                                    <th style="width:130px" class="text-center">Fecha de creación</th>
                                    <th style="width:1px" class="text-center">Fecha de actualización</th>
                                    <th style="width:1px" class="text-center">Editar</th>
                                    <th style="width:1px" class="text-center">Eliminar</th>
                                    
                                </tr>
                            </thead>
                            <tbody HEIGHT="10">
                                @foreach($usuarios as $usuario)
                                <tr>
                                    <td >{{ $usuario->nombre }}</td>
                                    <td>{{ $usuario->apellido_paterno }}</td>
                                    <td>{{ $usuario->apellido_materno }}</td>
                                    <td> {{ $usuario->correo }}</td>
                                    <td> {{ $usuario->activo ==1? 'Activo': 'Inactivo'}}</td> 
                                    <td> {{ $usuario->created_at }}</td>
                                    <td> {{ $usuario->updated_at }}</td>
                                    <td>
                                    <!-- <a class="btn btn-warning btn-rounded" href="{{ route('editar_usuarios',['id'=>$usuario->idusuario]) }}" role="button" ><i class="far fa-edit"></i></a> -->
                                    <a style="color: #3498DB; " href="{{route('editar_usuarios',['id'=>$usuario->idusuario]) }}" role="button" ><i class="bi bi-pencil"></i></a>
                                    </td>
                                    <td>
                                        <!-- <a style="color: #E74C3C; " href="{{ route('borrar',['id'=>$usuario->idusuario]) }}" role="button" data-mdb-toggle="modal" data-mdb-target="#exampleModal"> -->
                                        <!-- <i class="bi bi-trash"></i></a> -->
                                        <a style="color: #E74C3C; "  role="button" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $usuario->idusuario }}"><i class="bi bi-trash"></i></a>
                                            <div class="modal fade" id="exampleModal{{ $usuario->idusuario }}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
                                                    <div class="modal-content text-center">
                                                        <div class="modal-header d-flex justify-content-center">
                                                            <p class="heading">¿Estas seguro de eliminar el usuario?</p>
                                                        </div>
                                                        <div class="modal-body">
                                                            <i class="bi bi-x-lg fa-4x animated rotateIn"></i>
                                                        </div>
                                                        <div class="modal-footer flex-center">
                                                        <form action="{{ route('borrar',['id'=>$usuario->idusuario]) }}" method="GET" name="nuevo" enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                            <button class="btn  btn-outline-danger" type="submit" > Si</button>
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
            <hr>
            {{ $usuarios->links() }}
        </div>
    </div>
    
</body>
<footer>
    @include('footer')
</footer>
</html>