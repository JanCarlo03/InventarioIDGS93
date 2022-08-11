<!DOCTYPE html>
<html lang="en">
    <header></header>
<head>
<link rel="stylesheet" href="{!! asset('js/jquery-3.5.1min.js') !!}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
    <link rel="stylesheet" href="{!! asset('css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/all.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/mdb.min.css') !!}">

    @include('barra')
</head>
<style type="text/css">
/* CLIENT-SPECIFIC STYLES */
body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
img { -ms-interpolation-mode: bicubic; }
/* RESET STYLES */
img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
table { border-collapse: collapse !important; }
body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }
/* iOS BLUE LINKS */
a[x-apple-data-detectors] {
    color: inherit !important;
    text-decoration: none !important;
    font-size: inherit !important;
    font-family: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
}
/* MEDIA QUERIES */
@media screen and (max-width: 480px) {
    .mobile-hide {
        display: none !important;
    }
    .mobile-center {
        text-align: center !important;
    }
}
/* ANDROID CENTER FIX */
div[style*="margin: 16px 0;"] { margin: 0 !important; }
</style>
<script>
    function goBack() {
        window.history.back();
        }
</script>
<body>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="row justify-content-center">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    
    <tr>
        <td align="center" style="padding: 35px 35px 20px 35px; background-color: #ffffff;" bgcolor="#ffffff">
        
        <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
        <tr>
        <td align="center" valign="top" width="600">
        @if(Session::has('message'))
            <div class="alert alert-danger" role="alert">
            {{ Session::get('message') }}
            </div>
        @endif
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
            <tr>
                <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;">
                    <br>
                    <h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;">
                        Detalle de la solicitud
                    </h2>
                </td>
            </tr>
            <tr>
                <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;">
                    <br>
                    <span class="table-add float-left mb-3 mr-2">
                    @foreach($sol as $soli)
                    <h4>Datos de la solicitud</h4>
                    <h6>Código de Solicitud: {{ $soli->codigo_solicitud }} </h6>
                    <h6>Fecha de creación: {{ \Carbon\Carbon::parse($soli->created_at )->format('Y-m-d')}}</h6>
                    <h6>Estatus: {{ $soli->nombre_estatus }}  </h6>
                    @endforeach
                </span>
                <span class="table-add float-right mb-3 mr-2">
                    @foreach($sol as $soli)
                    <h4>Datos del usuario </h4>
                    <h6>Nombre: {{ $soli->nombre }} </h6>
                    <h6>Apellido Paterno: {{ $soli->apellido_paterno }}</h6>
                    <h6>Apellido Materno: {{ $soli->apellido_materno }}</h6>
                    @endforeach
                </span>
                    
                </td>
            </tr>
            <tr>
                <td align="left" style="padding-top: 20px;">
                    <table cellspacing="0" cellpadding="0" border="0" width="100%">
                        <tr>
                            <td width="455px" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                                Codigo del producto
                            </td>
                            <td width="100%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                                Nombre del producto
                            </td>
                            <td width="100%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                            Cantidad
                            </td>
                            @foreach($sol as $soli)
                            <td width="10%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                            Categoria
                            </td>
                            <td width="10%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                            Eliminar
                            </td>
                            @endforeach
                        </tr>
                        @foreach($info as $detalle)
                        <tr>
                        <td width="455px" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                            {{ $detalle->codigo_producto }} 
                            </td>
                            <td width="50%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                            {{ $detalle->nombre_producto }} 
                            </td>
                            <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                            <center>
                            {{ $detalle->cantidad }} 
                            </center>
                            </td>
                            <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                            {{ $detalle->nombre_categoria }} 
                            </td>
                            <td>
                                <center>
                                <a style="color: #E74C3C;" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal{{$detalle->idproducto}}" >
                                    <i class="bi bi-trash"></i></a>                                      
                                    <div class="modal fade" id="exampleModal{{$detalle->idproducto}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
                                            <div class="modal-content text-center">
                                                <div class="modal-header d-flex justify-content-center">
                                                    <p class="heading">¿Estas seguro de eliminar el producto?</p>
                                                </div>
                                                <div class="modal-body">
                                                    <i class="fas fa-times fa-4x animated rotateIn"></i>
                                                </div>
                                                <div class="modal-footer flex-center">
                                                    <form action="{{ route('eliminar_producto',['id' => $detalle->idproducto,'codigo'=> $detalle->codigo_solicitud]) }}" method="GET" name="nuevo" enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                        <button class="btn  btn-outline-danger" type="submit" >Si</button>
                                                    </form>
                                                    <a type="button" class="btn  btn-danger waves-effect" data-bs-dismiss="modal" aria-label="Close">No</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </center>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </td>
            </tr>
            <tr>
                <td align="left" style="padding-top: 20px;">
                    <table cellspacing="0" cellpadding="0" border="0" width="100%">
                        <tr>
                            <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">
                                TOTAL
                            </td>
                            <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">
                             {{ $total->Total }} productos
                            </td>
                        </tr>
                    </table>
                    <span class="table-add float-lefth mb-3 mr-2">
                        <a class="btn btn-danger btn-rounded" href="{{ route('solicitudes') }}" role="button">Cancelar</a>
                    </span>
                    <span class="table-add float-right mb-3 mr-2">
                    <a class="btn btn-info btn-rounded" href="{{ route('productos_editar',['codigo'=>$soli->codigo_solicitud]) }}" role="button">Agregar</a>
                    </span>
                   
                </td>
            </tr>
        </table>
        
        </td>
        </tr>
        </table>
    </div>
</body>
<footer>
@include('footer')
</footer>
</html>