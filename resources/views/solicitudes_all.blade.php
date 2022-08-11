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
    
    <!-- <style>
        
input {
    padding: 22px 15px !important;
    border: 1px solid #CFD8DC !important;
    border-radius: 4px !important;
    box-sizing: border-box;
    background-color: #fff !important;
    color: #000 !important;
    font-size: 16px !important;
    letter-spacing: 1px;
    position: relative
}
.fa-calendar {
    position: absolute;
    top: 13px;
    font-size: 20px;
    color: #1976D2;
    z-index: 1000
}
#fa-1 {
    left: calc(50% - 40px)
}
#fa-2 {
    left: calc(100% - 40px)
}
.form-control-placeholder {
    position: absolute;
    top: -10px !important;
    padding: 12px 2px 0 2px;
    opacity: 0.5
}
#end-p {
    left: calc(50% + 4px)
}
.form-control:focus+.form-control-placeholder,
.form-control:valid+.form-control-placeholder {
    font-size: 95%;
    top: 10px;
    transform: translate3d(0, -100%, 0);
    opacity: 1
}
::placeholder {
    color: #BDBDBD;
    opacity: 1
}
:-ms-input-placeholder {
    color: #BDBDBD
}
::-ms-input-placeholder {
    color: #BDBDBD
}
.datepicker {
    background-color: #fff;
    border-radius: 0 !important;
    align-content: center !important;
    padding: 0 !important
}
.datepicker-dropdown.datepicker-orient-left:before {
    left: calc(50% - 6px) !important
}
.datepicker-dropdown.datepicker-orient-left:after {
    left: calc(50% - 5px) !important;
    border-bottom-color: #1976D2
}
.datepicker-dropdown.datepicker-orient-right:after {
    border-bottom-color: #1976D2
}
.datepicker table tr td.today,
span.focused {
    border-radius: 50% !important;
    background-image: linear-gradient(#FFF3E0, #FFE0B2)
}
thead tr:nth-child(2) {
    background-color: #1976D2 !important
}
thead tr:nth-child(3) th {
    font-weight: bold !important;
    padding: 20px 10px !important;
    color: #BDBDBD !important
}
tfoot tr:nth-child(2) th {
    padding: 10px !important;
    border-top: 1px solid #CFD8DC !important
}
.cw {
    font-size: 14px !important;
    background-color: #E8EAF6 !important;
    border-radius: 0px !important;
    padding: 0px 20px !important;
    margin-right: 10px solid #fff !important
}
.old,
.day,
.new {
    width: 40px !important;
    height: 40px !important;
    border-radius: 0px !important
}
.day.old,
.day.new {
    color: #E0E0E0 !important
}
.day.old:hover,
.day.new:hover {
    border-radius: 50% !important
}
.old-day:hover,
.day:hover,
.new-day:hover,
.month:hover,
.year:hover,
.decade:hover,
.century:hover {
    border-radius: 50% !important;
    background-color: #eee
}
.active {
    border-radius: 50% !important;
    background-image: linear-gradient(#1976D2, #1976D2) !important;
    color: #fff !important
}
.range-start,
.range-end {
    border-radius: 50% !important;
    background-image: linear-gradient(#1976D2, #1976D2) !important
}
.range {
    background-color: #E3F2FD !important
}
.prev,
.next,
.datepicker-switch {
    border-radius: 0 !important;
    padding: 10px 10px 10px 10px !important;
    font-size: 18px;
    opacity: 0.7;
    color: #fff
}
.prev:hover,
.next:hover,
.datepicker-switch:hover {
    background-color: inherit !important;
    opacity: 1
}
@media screen and (max-width: 726px) {
    .datepicker-dropdown.datepicker-orient-right:before {
        right: calc(50% - 6px)
    }
    .datepicker-dropdown.datepicker-orient-right:after {
        right: calc(50% - 5px)
    }
}
    </style>
    <script>
        $(document).ready(function(){
            $('.input-daterange').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            calendarWeeks : true,
            clearBtn: true,
            disableTouchKeyboard: true
            });
    });
    </script> -->
</header>
<body>
    
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @if(Session::has('message3'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('message3') }}
                </div>
            @endif
            @if(Session::has('message10'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('message10') }}
                </div>
            @endif
                <h4 class="card-header text-center font-weight-bold text-uppercase py-4">Solicitudes </h4>
                <div class="card-body">
                    <div id="table" class="table-editable">
                        <!-- <span class="table-add float-left mb-3 mr-2">
                            <div class="container px-1 px-sm-5 mx-auto">
                                <form autocomplete="off">
                                    <div class="flex-row d-flex justify-content-center">
                                        <div class="col-lg-6 col-11 px-1">
                                            <div class="input-group input-daterange"> <input type="text" id="start" class="form-control text-left mr-2"> <label class="ml-3 form-control-placeholder" id="start-p" for="start">Start Date</label> <span class="fa fa-calendar" id="fa-1"></span> <input type="text" id="end" class="form-control text-left ml-2"> <label class="ml-3 form-control-placeholder" id="end-p" for="end">End Date</label> <span class="fa fa-calendar" id="fa-2"></span> </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </span> -->
                        <span class="table-add float-right mb-3 mr-2">
                            <a class="btn purple-gradient btn-rounded" href="{{ route('generar') }}" role="button"><i class="bi bi-file-pdf"></i> Reporte</a>
                        </span>    
                        <table class="table table-bordered table-responsive-md table-striped text-center" >
                            <thead>
                                <tr>
                                    <th class="text-center">Código de Solicitud</th>
                                    <th class="text-center">Productos totales</th>
                                    <th class="text-center">Usuario de creación</th>
                                    <th class="text-center">Área</th>
                                    <th class="text-center">Estatus</th>
                                    <th class="text-center">Fecha de creación</th>
                                    <th style="width:1px" class="text-center">PDF</th>
                                    <th style="width:1px" class="text-center">Editar</th>
                                    
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
                                        @endif
                                        @if($solicitud->idestatus == 2)
                                    <span class="badge badge-pill badge-warning">{{ $solicitud->nombre_estatus }}</span>
                                        @endif
                                        @if($solicitud->idestatus == 3)
                                    <span class="badge badge-pill badge-success">{{ $solicitud->nombre_estatus }}</span>
                                        @endif
                                        
                                    </td> 
                                    <td>
                                        {{ $solicitud->created_at->format('Y-m-d')}} 
                                     </td>
                                     <td>
                                        @if($solicitud->idestatus == 3) 
                                            <a style="color: #3498DB; " href="{{ route('pdf_solicitudes',['id'=>$solicitud->codigo_solicitud]) }}" role="button"><i class="bi bi-filetype-pdf"></i></a> </td>
                                        @else
                                            <a style="color: #FF0000; " role="button"><i class="bi bi-filetype-pdf" data-bs-toggle="modal" data-bs-target="#modalsinc"></i></a> </td>
                            
                                            <div class="modal fade right" id="modalsinc" tabindex="-1" role="dialog"
                                            aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
                                            <div class="modal-dialog modal-sm modal-bottom-right modal-notify modal-info" role="document">
                                                <!--Content-->
                                                <div class="modal-content">
                                                <!--Header-->
                                                <div class="modal-header">
                                                    <p class="heading">PDF no disponible </p>

                                                    <button type="button" class="close" data-bs-dismiss="modal"  aria-label="Close">
                                                    <span aria-hidden="true" class="white-text">&times;</span>
                                                    </button>
                                                </div>

                                                <!--Body-->
                                                
                                                <!--/.Content-->
                                            </div>
                                            </div>
                                            <!--Modal: modalRelatedContent-->
                                        @endif
                                     <td>
                                    @if($solicitud->idestatus == 1 || $solicitud->idestatus == 2)
                                        @if( $solicitud->created_at->format('d') <= 05)
                                            <a style="color: #3498DB; " href="{{ route('detalles',['id'=>$solicitud->codigo_solicitud]) }}" role="button" ><i class="bi bi-pencil"></i></a>
                                        @else
                                        <a style="color: #3498DB; " role="button" data-bs-toggle="modal" data-bs-target="#solicitud_extra"><i class="bi bi-pencil"></i></a>
                                          <!-- Modal -->
                                            <div class="modal fade" id="solicitud_extra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-sm modal-bottom-right modal-notify modal-danger" role="document">
                                                <!--Content-->
                                                <div class="modal-content">
                                                    <!--Header-->
                                                    <div class="modal-header">
                                                        <p class="heading">SOLICITUD FUERA DE TIEMPO
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
                                                            <i class="fas fa-exclamation-triangle fa-2x"></i>
                                                            </p>
                                                        </div>

                                                        <div class="col-9">
                                                            <p>Solicitud fuera de tiempo establecido</p>
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
                                    @endif
                                    @if($solicitud->idestatus == 3)
                                    <a style="color: #3498DB; " href="{{ route('detalles',['id'=>$solicitud->codigo_solicitud]) }}" role="button" ><i class="bi bi-eye"></i></a>
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