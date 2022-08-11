<!DOCTYPE html>
<html lang="en-MX">
<head>
<link rel="icon" href="{{ asset('img/ms-icon-310x310.png') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/mdb.min.css">
    <script src=" {{ asset('js/jquery-3.3.1.js') }}"></script>
    <script src=" {{ asset('js/jquery-ui.js') }}"></script>
    
</head>
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
<div class="bg-image" 
     style="background-image: url('https://fondosmil.com/fondo/460.png');
            height: 920px">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <br><br><br><br><br><br>
    <div class="row justify-content-center">
        <div class="col-md-5">
        <div class="card">
            <div class="text-center">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <p class="h4 mb-4">Restablecer contraseña</p>
            </div>
            <div class="text-center">
                        <h7>*Ingresa la nueva contraseña*</h7>
                    </div>
            <div class="card-body">
                <form action="{{ route('reset_contraseña', ['id' => session('session_id')]) }}" method="post" name="restablecer_contraseña"> 
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label> Contraseña</label>
                    <div class="md-form">
                        <div class="input-group">
                            <i class="fas fa-key prefix"></i>
                            <input type="password" id="contraseña" name="contraseña" class="form-control" required>
                            <div class="input-group-append">
                                <button id="show_password" class="btn btn-outline-pink btn-rounded waves-effect" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                            </div>
                        </div>
                            <span  id="mensaje"></span>
                                <ul>
                                    <li id="primayus"> Primera letra mayúscula       </li>
                                    <li id="numbers">  Números                       </li>   
                                    <li id="lower">    Minúsculas                    </li>   
                                    <li id="len">      Mnimo 8 caracteres           </li>   
                                </ul>
                                <br>
                    </div>
                    <div class="form-group">
                    <label> Confirmar contraseña</label>
                        <div class="md-form">
                            <i class="fas fa-key prefix"></i>
                            <input type="password" id="confirma_contraseña" name="confirma_contraseña" class="form-control" required>
                        
                                <td><span id="spass1" class="spass1"></td>
                        </div>
                    </div>
                    <center>
                        <button class="btn btn-cyan btn-rounded my-4" type="submit">Validar</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>