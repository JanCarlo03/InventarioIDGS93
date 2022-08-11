<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Productos</title>
    <link rel="stylesheet" href="{!! asset('js/jquery-3.5.1min.js') !!}">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
    <link rel="stylesheet" href="{!! asset('css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/all.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/mdb.min.css') !!}">
   
    
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
                <div class="text-center">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <p class="h4 mb-4">Editar producto</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('modificar_producto',['id'=>$producto->idproducto]) }}" method="POST" name="nuevo" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }} 

                             <div class="form-group">
                                <label for="nombre">Código del producto</label>
                                <input type="int" class="form-control" id="codigo_producto" name="codigo_producto" value="{{ $producto->codigo_producto }}" readonly="readonly" >
                            </div>    
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" onkeypress="return soloLetras(event)" class="form-control" id="nombre_producto" name="nombre_producto" value="{{ $producto->nombre_producto }}" required>
                            </div>
                            <div class="form-group">
                                <label for="cantidad">Cantidad</label>
                                <input type="int" onkeypress="return soloNumeros(event)" class="form-control" id="cantidad" name="cantidad"  value="{{ $producto->cantidad }}" required>
                            </div>
                            <div class="form-group">
                                <label for="cantidad">Categoría</label>
                                <input type="int"  class="form-control"  @foreach($productoss as $productos) value="{{ $productos->nombre_categoria }}"@endforeach readonly>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Fecha de creación</label>
                                <input type="int" class="form-control" id="codigo_producto" name="codigo_producto" value="{{ $producto->created_at }}" readonly="readonly" >
                            </div> 
                            <div class="text-right">
                        <button type="submit" class="btn btn-info">Guardar</button>
                    </div>
                    </form>
                    
                </div>
            </div>
        </div>
        </div>
        @include('footer')
</body>
</html>

