<!DOCTYPE html>
<html lang="MX-ESP">
<header>
    <title>Nuevo usuario</title>
    <meta charset="UTF-8">
    <meta name="title" content="Administrador">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
    <link rel="stylesheet" href="{!! asset('css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="{!! asset('css/all.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/mdb.min.css') !!}">

    @include('barra')

</header>
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
<body>
 
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="text-center">
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <p class="h4 mb-4">Editar usuarios</p>
            </div>
            <div class="card-body">
            <form action="{{ route('modificar',['id'=>$usuario->idusuario]) }}" method="POST" name="nuevo" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }} 
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" onkeypress="return soloLetras(event)" class="form-control" id="nombre" name="nombre" value="{{ $usuario->nombre }}" required>
                    </div>

                    <div class="form-group">
                        <label for="apellido_paterno">Apellido paterno</label>
                        <input type="text" onkeypress="return soloLetras(event)" class="form-control" id="apellido_paterno" name="apellido_paterno" value="{{ $usuario->apellido_paterno }}" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido_materno">Apellido materno</label>
                        <input type="text" onkeypress="return soloLetras(event)" class="form-control" id="apellido_materno" name="apellido_materno" value="{{ $usuario->apellido_materno }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo</label>
                        <input type="email" class="form-control" id="correo" name="correo" value="{{ $usuario->correo }}" required>
                    </div>
                    <div class="form-group">
                        <label for="cantidad">Área</label>
                        <input type="int"  class="form-control"  @foreach($nuevos as $nuevo) value="{{ $nuevo->nombre_area }}"@endforeach readonly>
                    </div>
                    <div class="form-group">
                        <label for="cantidad">Perfil</label>
                        <input type="int"  class="form-control"  @foreach($nuevos as $nuevo) value="{{ $nuevo->nombre_perfil }}"@endforeach readonly>
                    </div>
                    <div class="form-group">
                        <label for="cantidad">Fecha de creación</label>
                        <input type="int"  class="form-control" value="{{ $usuario->created_at }}"readonly>
                    </div>
                    <span class="table-add float-right mb-3 mr-2"><a href="e" class="text-success"></a>
                        <button type="submit" class="btn btn-info btn-rounded">Guardar</button>
                        </span>
                    <span class="table-add float-left mb-3 mr-2"><a href="e" class="text-success"></a>
                            <button class="btn btn-danger btn-rounded" href="{{ route('usuarios') }}" >Cancelar</button>
                        </span>
            </form>
        </div>
    </div>
</div>
</div>
@include('footer')
</body>
</html>