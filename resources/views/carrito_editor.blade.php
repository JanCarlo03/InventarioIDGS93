<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="{{ asset('img/ms-icon-310x310.png') }}">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Productos</title>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">  
    <link rel="stylesheet" href="{!! asset('css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/all.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/mdb.min.css') !!}">
    <script src=" {{ asset('js/jquery-3.3.1.js') }}"></script>
    <script src=" {{ asset('js/jquery-ui.js') }}"></script>
</head>
<style>
    @media only screen and (min-width: 1000px) {
        .header-blue{
            width: 1900px !important; 
            height:10px;
            margin: auto !important;
        }
    button{
    height:40px; 
    width:10px; 
    margin: -20px -50px; 
    top:50%; 
    
}
</style>
        <div class="header-blue" >
        <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
            <a class="nav-link">ㅤㅤㅤㅤ</a>
        <img  src="https://www.grupoiis.com/wp-content/uploads/2020/12/logoGrupoIIS-bco.png"  height="80" width="80" >
            <ul class="navbar-nav ml-auto">
                <li  class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle float-right" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
                    <i class="bi bi-person-bounding-box"></i>  {{session('session_name')}} 
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#"><i class="far fa-user-circle"></i> Perfil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}"><i class="bi bi-toggle2-off"></i> Cerrar sesión</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">ㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤ</a>
                </li>
            </ul>
        </div>     
    </nav>
        </div> 
        <nav class="navbar navbar-expand-lg navbar-light bg-">
            <a class="navbar-brand" href="{{ route('grafica') }}"><i class="dropdown-item" href="{{ route('grafica') }}"></i> Grupo IIS  <i class="fas fa-vials"></i></i></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('grafica') }}">Inicio <i class="fas fa-home"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('solicitudes') }}">Solicitudes <i class="far fa-file-alt"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
        <body>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="card card-cascade narrower">
                                <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
                                    <div>
                                        <a href="{{ route('eliminar_carrito') }}" class="btn btn-outline-white btn-rounded btn-sm px-2" role="button">
                                            <i class="far fa-trash-alt mt-0"></i> Vaciar Solicitud 
                                        </a>
                                    </div>
                                        <a  class="white-text mx-3">Productos agregados</a>
                                    <div>
                                    @foreach($sol as $soli)
                                        <a href="{{ route('editar_solicitud',['codigo'=>$soli->codigo_solicitud]) }}" class="btn btn-outline-white btn-rounded btn-sm px-2" role="button">
                                        <i class="far fa-file-pdf"></i> Generar solicitud 
                                        </a>
                                    @endforeach
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Nombre</th>
                                                <th class="text-center">Cantidad</th>
                                                <th class="text-center">Eliminar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <tr>
                                                    @foreach($cartItems as $items)
                                                    <td class="text-center">{{ $items->name }}</td>
                                                    <td class="text-center">
                                                        <form action="{{ route('actualizar',['id' => $items->id] ) }}">
                                                            <input type="number" name="quantity" min="1" value="{{ $items->quantity }}"/>
                                                            <button type="submit" class="btn btn-outline-info btn-rounded waves-effect"><i class="fas fa-save"></i></button>
                                                        </form>
                                                    </td>
                                                    <td class="text-center">
                                                    <a class="btn-floating btn-sm btn-danger" href="{{ route('destruir',['id' => $items->id]) }}" data-bs-toggle="modal" data-bs-target="#exampleModal{{$items->id}}" ><i class="fas fa-trash-alt"></i></a>                                      
                                                        <div class="modal fade" id="exampleModal{{$items->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
                                                                <div class="modal-content text-center">
                                                                    <div class="modal-header d-flex justify-content-center">
                                                                        <p class="heading">¿Estas seguro de eliminar el producto?</p>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <i class="fas fa-times fa-4x animated rotateIn"></i>
                                                                    </div>
                                                                    <div class="modal-footer flex-center">
                                                                        <form action="{{ route('destruir',['id' => $items->id]) }}" method="GET" name="nuevo" enctype="multipart/form-data">
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
                                    <center>
                                        <a class="btn btn-cyan btn-rounded" type="button" href="{{ route('productos_editar',['codigo'=>$soli->codigo_solicitud]) }}" >Añadir mas productos</a>
                                    </center>
                                    <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('footer')
        </body>
    </html>