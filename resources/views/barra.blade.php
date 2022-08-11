   
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

<style>
    @media only screen and (min-width: 1000px) {
    .header-blue{
        width: 1900px !important; 
        height:10px;
        margin: auto !important;
    }
</style>
<script>
function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = [8, 37, 39, 46];

    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}

function limpia() {
    var val = document.getElementById("miInput").value;
    var tam = val.length;
    for(i = 0; i < tam; i++) {
        if(!isNaN(val[i]))
            document.getElementById("miInput").value = '';
    }
}
</script>
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
<a class="navbar-brand" href="{{ route('grafica') }}"><i class="dropdown-item" href="{{ route('grafica') }}"></i> Grupo IIS  <i class="bi bi-lightning-charge-fill"></i> </i></a>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('grafica') }}">Inicio <i class="bi bi-house"></i></a>
        </li>
        @if(empty(session('session_tipo') != 1))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('usuarios') }}">Usuarios <i class="bi bi-people"></i></a>
        </li>
        @endif
        @if(empty(session('session_tipo') != 3))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('solicitudes') }}">Solicitudes <i class="bi bi-files"></i></a>
        </li>
        @endif
        @if(empty(session('session_tipo') == 3))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('solicitudes_all') }}">Solicitudes <i class="bi bi-files"></i></a>
        </li>
        @endif
        @if(empty(session('session_tipo') == 3))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('productos') }}" >Productos <i class="bi bi-bag-check"></i></a>
        </li>
        @endif
        @if(empty(session('session_tipo') != 1))
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#areaModal">Áreas <i class="bi bi-building"></i></a>
        
            <!-- Modal -->
                <div class="modal fade" id="areaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <!--Content-->
                    <div class="modal-content form-elegant">
                    <!--Header-->
                    <div class="modal-header text-center">
                        <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong>Registrar áreas</strong></h3>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!--Body-->
                    <div class="modal-body mx-4">
                        <!--Body-->
                        <form action="{{ route('area')}}" method="GET" name="nuevo" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" onkeypress="return soloLetras(event)" class="form-control" id="nombre_area" name="nombre_area" required>
                            </div>
                            <div class="text-center mb-3">
                                <button type="submit" class="btn aqua-gradient btn-rounded z-depth-1a">Guardar</button>
                            </div>
                        </form>
                    </div>
                    <!--/.Content-->
                </div>
            </div>
        </li>
        @endif
        @if(empty(session('session_tipo') != 1))
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#categoriasModal">Categorías <i class="bi bi-tags"></i></a>

            <!-- Modal -->
                <div class="modal fade" id="categoriasModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <!--Content-->
                    <div class="modal-content form-elegant">
                    <!--Header-->
                    <div class="modal-header text-center">
                        <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong>Registrar categoría</strong></h3>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!--Body-->
                    <div class="modal-body mx-4">
                        <!--Body-->
                        <form action="{{ route('categoria')}}" method="GET" name="nuevo" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" onkeypress="return soloLetras(event)" class="form-control" id="nomb  re_categoria" name="nombre_categoria" required>
                            </div>
                            <div class="text-center mb-3">
                                <button type="submit" class="btn blue-gradient btn-rounded z-depth-1a">Guardar</button>
                            </div>
                        </form>
                    </div>
                    <!--/.Content-->
                </div>
            </div>
        </li>
        @endif
        @if(empty(session('session_tipo') != 3))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('informacion') }}"><i class="bi bi-cart3"></i> Carrito
            <span class="badge badge-pill peach-gradient">{{ \Cart::session(session('session_id'))->getContent()->count() }}</span>
            </a>
        </li>
        @endif
        @if(empty(session('session_tipo') != 3))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('pago') }}"><i class="bi bi-paypal"></i> Suscripción
            
            </a>
        </li>
        @endif
        @if(empty(session('session_id')))
        <li class="nav-item">
            <a class="nav-link" href="">Iniciar sesión</a>
        </li>
        @endif
        
    </ul>
</div>
</nav>