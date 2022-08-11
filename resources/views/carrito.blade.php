<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="{{ asset('img/ms-icon-310x310.png') }}">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Productos</title>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/mdb.min.css">
    <script src=" {{ asset('js/jquery-3.3.1.js') }}"></script>
    <script src=" {{ asset('js/jquery-ui.js') }}"></script>
    

    @include('barra')
</head>
<style>
    button{
    height:40px; 
    width:10px; 
    margin: -20px -50px; 
    top:50%;
}
.btn-circle {
    width: 30px;
    height: 30px;
    padding: 6px 0px;
    border-radius: 15px;
    text-align: center;
    font-size: 14px;
    line-height: 1.42857;
}
</style>
<body>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="card card-cascade narrower">
                        <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
                            <div>
                                <a href="{{ route('eliminar_carrito') }}" class="btn btn-outline-white btn-rounded btn-sm px-2" role="button">
                                    <i class="bi bi-trash"></i> Vaciar Solicitud 
                                </a>
                            </div>
                                <a  class="white-text mx-3">Productos agregados</a>
                            <div>
                                <a href="{{ route('store') }}" class="btn btn-outline-white btn-rounded btn-sm px-2" role="button">
                                <i class="bi bi-file-pdf"></i> Generar solicitud 
                                </a>
                            </div>
                        </div>
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nombre</th>
                                            <th class="text-center">Cantidad</th>
                                            <th class="text-center">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                            
                                            @foreach($cartItems as $items)
                                                <td class="text-center">{{ $items->name }}</td>
                                                
                                                <td class="text-center">
                                                <form action="{{ route('actualizar',['id' => $items->id] ) }}">
                                                <input type="number" name="quantity" min="1" value="{{ $items->quantity }}"/>
                                                <button type="submit" class="btn btn-success btn-circle"><i class="bi bi-sd-card"></i></button>
                                                </form>
                                                </td>
                                                <td class="text-center">
                                                <a class="btn-floating btn-sm btn-danger" href="{{ route('destruir',['id' => $items->id]  ) }}"><i class="bi bi-trash"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <center>
                                <a class="btn btn-cyan btn-rounded" type="button" href="{{ route('nueva_solicitud') }}" >Añadir mas productos</a>
                            </center>
                            <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
</body>
</html>