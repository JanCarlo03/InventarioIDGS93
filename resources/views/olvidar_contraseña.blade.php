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
</head>
<style>
    background: -webkit-linear-gradient(90deg, yellow 10%, orange 90%);
</style>
<body>
<div class="bg-image" 
     style="background-image: url('https://fondosmil.com/fondo/460.png');
            height: 920px">
            
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <br><br><br><br><br><br><br><br>
    <div class="row justify-content-center">
        <div class="col-md-5">
        <div class="card">
            <div class="text-center">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <p class="h4 mb-4">Restablecer contraseña</p>
            </div>
            <div class="text-center">
                        <h7>*Ingresa el correo electrónico al cual deseas restrablecer la contraseña*</h7>
                    </div>
            <div class="card-body">
                @if(Session::has('message'))
                    <div class="alert alert-danger" role="alert">
                    {{ Session::get('message') }}
                    </div>
                @endif
                <form action="{{route('contraseña')}}" method="POST" name="restablecer_contraseña">
                {{ csrf_field() }}
                    <!-- Material input -->
                    <div class="form-group">
                    <label> Correo electrónico</label>
                        <div class="md-form">
                        <i class="fas fa-envelope prefix"></i>
                        <input type="text" id="correo" name="correo" class="form-control">
                        </div>
                    </div>
                    <center>
                    <button class="btn btn-cyan btn-rounded my-4" type="submit">Validar</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>