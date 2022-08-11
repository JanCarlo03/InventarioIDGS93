<!DOCTYPE html>
<html lang="en">
    <link rel="icon" href="{{ asset('img/ms-icon-310x310.png') }}">
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
    $(function(){
        $('input').on('click','#input[type=checkbox]', function(event){
            alert('hola');
        });
    });
</script>
<style type="text/css">
<!--
.inputcentrado {
   text-align: center
   }
-->
</style>
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
                     <table>
                         <th>
                        @foreach($sol as $soli)
                        <h4>Datos de la solicitud</h4>
                        <h6>Código de Solicitud: {{ $soli->codigo_solicitud }} </h6>
                        <h6>Fecha de creación: {{ \Carbon\Carbon::parse($soli->created_at )->format('Y-m-d')}} </h6>
                        
                        @if($soli->idestatus == 3) 
                        <h6>Estatus: {{ $soli->nombre_estatus }}  </h6>
                        @endif
                        @if($soli->idestatus == 1 || $soli->idestatus == 2)                                     
                                <form action="{{ route('modi',['id'=>$soli->codigo_solicitud]) }}" method="POST" name="nuevo" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }} 
                                    <h6>Estatus:
                                    <select class="form-select" aria-label="Default select example" id="idestatus" name="idestatus" required>
                                        <option selected></option>
                                        @foreach($estados as $estado)
                                            <option value="{{ $estado->idestatus }}">{{ $estado->nombre_estatus }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    
                                
                            @endif
                        </h6>
                        @endforeach
                        </th>
                        <th style="width:150px">
                        </th>
                        <th>
                        @foreach($sol as $soli)
                        <h4>Datos del usuario </h4>
                        <h6>Nombre: {{ $soli->nombre }} </h6>
                        <h6>Apellido Paterno: {{ $soli->apellido_paterno }}</h6>
                        <h6>Apellido Materno: {{ $soli->apellido_materno }}</h6>
                        @endforeach
                        </th>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="left" style="padding-top: 20px;">
                    <table cellspacing="0" cellpadding="0" border="0" width="100%">
                        <tr>
                            <td width="455px" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                                Código del producto
                            </td>
                            <td width="100%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                                Nombre del producto
                            </td>
                            <td width="100%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                            Cantidad
                            </td>
                            <td width="10%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                            Categoría
                            </td>
                            @foreach($estatus as $detalle)
                            @if($detalle->idestatus  == 2)
                            <td width="10%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                            Verificación
                            </td>
                            @endif
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
                            @if($detalle->idestatus  == 2)
                            <td>
                                <center>
                                    <div class="form-check " id="prueba">
                                        <input type="checkbox"
                                            class="form-check-input"
                                            
                                            name="nombres[]"
                                            value="{{$detalle->idproducto}},{{$detalle->cantidad}}" 
                                            id="flexCheckDefault{{$detalle->idproducto}}"
                                        />
                                        <label class="form-check-label" name="nombres" for="flexCheckDefault{{$detalle->idproducto}}"> 
                                             
                                        </label>
                                    </div>
                                    
                                    </center>
                            </td>
                            @endif
                            @endforeach
                        </tr>
                        
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
                    <span class="table-add float-right mb-3 mr-2">
                        <button type="submit" class="btn btn-info btn-rounded">Guardar</button>
                    </span>
                    </form>
                    <span class="table-add float-left mb-3 mr-2">
                    <a class="btn btn btn-danger btn-rounded" href="{{ route('solicitudes_all') }}" role="button">Cancelar</a>
                </td>
            </tr>
        </table>
        
        </td>
        </tr>
        </table>
    </div>
    <table id="resultados"> </table>
</body>
@include('footer')
</html>