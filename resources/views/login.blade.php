<!DOCTYPE html>
<html lang="en-MX">
<head>
<link rel="icon" href="{{ asset('img/ms-icon-310x310.png') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion-Portal Web Inventario</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
    <link rel="stylesheet" href="{!! asset('css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="{!! asset('css/all.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/mdb.min.css') !!}">
    

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="bg-image" 
     style="background-image: url('https://fondosmil.com/fondo/460.png');
            height: 100vh">
            

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                    <div class="img" style="background-image: url(images/papel.jpg);">
                </div>
                <div class="login-wrap p-4 p-md-5">
                @if(Session::has('message'))
                    <div class="alert alert-danger" role="alert">
                    {{ Session::get('message') }}
                    </div>
                @endif
                @if(Session::has('message1'))
                    <div class="alert alert-success" role="alert">
                    {{ Session::get('message1') }}
                    </div>
                @endif
                @if(Session::has('message2'))
                    <div class="alert alert-danger" role="alert">
                    {{ Session::get('message2') }}
                    </div>
                @endif                
                    <div class="d-flex">
                        <div class="w-100">
                            <h3 class="mb-4">Inicio de Sesión</h3>
                        </div>  
                    </div>
                    <form action="{{ route('validar')}}" method="POST" name="login">
                    {{ csrf_field() }}
                        <div class="form-group mb-3">
                            <label class="email" for="name">Correo</label>
                            <input type="email" class="form-control" name="correo" placeholder="Correo"  required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="label" for="password">Contraseña</label>
                            <input type="password" class="form-control"  name="contraseña" placeholder="Contraseña" required>
                        </div>
                            <button type="submit" class="form-control btn btn-primary rounded submit px-3">Iniciar sesión</button>
                        <div class="form-group d-md-flex">
                            <div>          
                                <div >
                                    <a href="{{ route('olvidar_contraseña') }}">Restablecer contraseña</a>
                                </div>
                            </div>
                        </div>
                    </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    
    <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>