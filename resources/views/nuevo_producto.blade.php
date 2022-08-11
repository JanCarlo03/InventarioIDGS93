<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="{{ asset('img/ms-icon-310x310.png') }}">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Productos</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/mdb.min.css">
    @include('barra')
</head>
<script>
        function soloNumeros(e) {
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toLowerCase();
            letras = "1234567890";
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
                @include('alerts')
                <div class="text-center">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <p class="h4 mb-4">Nuevo producto</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('guardar_producto') }}" method="POST" name="nuevo" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                                <label for="nombre">Código del producto</label>
                                <input type="text"  class="form-control" id="codigo_producto" name="codigo_producto"  required>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" onkeypress="return soloLetras(event)" class="form-control" id="nombre_producto" name="nombre_producto"  required>
                            </div>
                            <div class="form-group">
                                <label for="cantidad">Cantidad</label>
                                <input type="int" onkeypress="return soloNumeros(event)" class="form-control" id="cantidad" name="cantidad"  required>
                            </div>
                            <div class="form-group">
                                <label for="idarea">Categorías</label>
                                <select class="form-control form-control-sm" id="idcategoria" name="idcategoria">
                                <option value="0">-- Selecciona un área --</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->idcategoria }}">{{ $categoria->nombre_categoria }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div style="text-align: center;">
                                <button class="btn btn-info btn-rounded my-4 " id="guardar" type="submit">Guardar</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('footer')
</body>

</html>

