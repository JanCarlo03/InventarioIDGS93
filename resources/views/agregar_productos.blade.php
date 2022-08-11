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
    <link rel="stylesheet" href="{!! asset('css/all.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/mdb.min.css') !!}">
    <script src=" {{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src=" {{ asset('js/jquery-ui.js') }}"></script>

</head>
<script>
    function goBack() {
        window.history.back();
        }
</script>
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
                <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Productos </h3>
                <div class="card-body">
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">
                    {{ Session::get('message') }}
                    </div>
                @endif
                    <div id="table" class="table-editable">
                        @foreach($sol as $soli)
                    <span class="table-add float-left mb-3 mr-2"><a href="e" class="text-success"></a>
                        <a class="btn-floating btn-primary" href="{{ route('editar_soli',['id'=>$soli->codigo_solicitud]) }}"><i class="fas fa-arrow-left"></i></a>
                    </span>
                     @endforeach
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
                                        <td class="text-center">{{ $producto->nombre_producto }}</td>
                                        <td class="text-center">{{ $producto->nombre_categoria }}</td>
                                        <td class="text-center">
                                        @if( $producto->cantidad != 0 )
                                            <a class="btn-floating btn-sm btn-secondary" href="{{ route('add',['id' => $producto->idproducto]  ) }}"><i class="fas fa-cart-plus"></i>
                                        @else
                                             <a class="btn-floating btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#solicitud_extra"><i class="fas fa-cart-plus"></i></a>
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
                            @foreach($sol as $soli)
                                <center>
                                    <a class="btn btn btn-cyan btn-rounded" href="{{ route('mostrar_carrito',['codigo'=>$soli->codigo_solicitud]) }}" role="button"><i class="fas fa-cart-plus"></i> Carrito <span class="badge badge-pill peach-gradient">{{ \Cart::session(session('session_id'))->getTotalQuantity() }}</span></a>
                                </center>
                            @endforeach
                        </div>
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