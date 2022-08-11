<!DOCTYPE html>
<html lang="MX-ESP">
    <head>
    <link rel="icon" href="{{ asset('img/ms-icon-310x310.png') }}">
    </head>
<header>
    <title>Nuevo usuario</title>
    <meta charset="UTF-8">
    <meta name="title" content="Administrador">
    
    <link rel="icon" href="assets/favicon.icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/mdb.min.css">
    <script src=" {{ asset('js/jquery-3.3.1.js') }}"></script>
    <script src=" {{ asset('js/jquery-ui.js') }}"></script>

</header>
@include('barra')
<script type="text/javascript">

        $(document).ready(function(){

             //--------contraseña-----------------------
             $(function(){
                var primayus = new RegExp(/^[A-Z\s\xF1\xD1]+/);
                var numbers  = new RegExp("^(?=.*[0-9])");
                var lower    = new RegExp("^(?=.*[a-z])");
                var len      = new RegExp("^(?=.{8,})");

                var regExp = [primayus, numbers, lower, len];
                var elementos = [$("#primayus"), $("#numbers"), $("#lower"), $("#len")];
                

                $("#contraseña").on("keyup", function(){
                    var contraseña = $("#contraseña").val();
                    var check = 0;

                    for(var i = 0; i < 4; i++){
                        if(regExp[i].test(contraseña)){
                            elementos[i].hide().css({"border": "1px solid #f00"});
                            check++;
                        }
                        else{
                            elementos[i].show();
                        }
                    }
                    if(check >= 0 && check <= 1 ){
                        $("#mensaje").text("Contraseña insegura").css({"border": "1px solid #f00", "background": "#f00"});
                    }else if(check >= 2 && check <= 3){
                        $("#mensaje").text("Contraseña poco segura").css({"border": "1px solid #ff8000", "background": "#ff8000"});
                    }else if(check == 4){
                        $("#mensaje").text("Contraseña segura").css({"border": "1px solid #58D68D", "background": "#58D68D"});
                    }
                });
            });
            //-----------------------------------------------------------------
           
            $("#confirma_contraseña").keyup(function(){
                var txtpass1 = $("#contraseña").val();
                var txtpass2 = $("#confirma_contraseña").val();

                if(txtpass1 == txtpass2){
                    $("#spass1").text("Correcto");
                    $("#spass1").css({ "border": "1px solid #58D68D", "background": "#58D68D"}).fadeIn(2000);
                    $("#guardar").prop("disabled", false);
                }
                else{
                    $("#spass1").text("Incorrecto");
                    $("#spass1").css({ "border": "1px solid #f00", "background": "#f00" }).fadeIn(2000);
                    $("#guardar").prop("disabled", true);
                }
            });

        });
    </script>
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
  <script type="text/javascript">
function mostrarPassword(){
		var cambio = document.getElementById("contraseña");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	} 
</script>
<body>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            {{ $message=Session::get('message') }} 
  <!-- Muestro el mensaje de validación -->
  @include('alerts')
            <div class="text-center">
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <p class="h4 mb-4">Nuevo usuario</p>
            </div>
            <div class="card-body">
                <form action="{{ route('guardar_registro')}}" method="POST" name="nuevo" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" onkeypress="return soloLetras(event)" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="apellido_paterno">Apellido Paterno</label>
                            <input type="text" onkeypress="return soloLetras(event)" class="form-control" id="apellido_paterno" name="apellido_paterno" value="{{ old('apellido_paterno') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="apellido_materno">Apellido Materno</label>
                            <input type="text" onkeypress="return soloLetras(event)" class="form-control" id="apellido_materno" name="apellido_materno" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Correo</label>
                            <input type="email" class="form-control" id="correo" name="correo" required>
                            
                        </div>
                        <div class="form-group">
                        <label>Contraseña</label>
                            <div class="input-group">
                                <input type="password" class="form-control " id="contraseña" name="contraseña" required>
                                <div class="input-group-append">
                                    <button id="show_password" class="btn btn-outline-warning btn-rounded waves-effect" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                                </div>
                            </div>
                            <span  id="mensaje"></span>
                        </div>
                            <ul>
                                <li id="primayus"> Primera letra mayúscula       </li>
                                <li id="numbers">  Números                       </li>   
                                <li id="lower">    Minúsculas                    </li>   
                                <li id="len">      Mínimo 8 caracteres           </li>   
                            </ul>
                        <div class="form-group">
                            <label for="password">Confirmar Contraseña</label>
                            <input type="password" class="form-control form-control-sm" id="confirma_contraseña" name="confirma_contraseña" required>
                            <td><span id="spass1" class="spass1"></td>
                        </div>
                        
                        <span class="table-add float-right mb-3 mr-2"><a href="e" class="text-success"></a>
                            <button class="btn btn-default btn-rounded" id="guardar" type="submit">Registrarse</button>
                        </span>
                </form>
            </div>
        </div>
    </div>
</div>

</body>

