<html>
    <title>Reporte de Usuarios</title>
    <head>
        <style>
            table{
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
                height: 10px;
                
            }
            td,th{
                border: 1px solid #dddddd;
                text-align: left;
                padding: 15px;
            }
            
        </style>
    </head>
    <body>
    <table class="primera">
        <tr class="dos">
                <th style="width:100px" rowspan="2"><center><img src="https://i.mkt.lu/dl/thumb/82882342450/80174152020.jpg" width="100px" height="80px"></center></th>
                <td style="width:455px"> <h5 style="text-align: center;"> <FONT FACE="impact" SIZE=3 COLOR="DarkOrange">Grupo Interdisciplinario de Ingeniería y Servicios S.A de C.V </FONT> </h5></td>
                <td style="width:100px">Fecha: <br>{{ $dates }}</td>
            </tr>
            <tr>
                <td><h2 style="text-align: center;">Reporte de usuarios</h2></td>
                <td></td>
            </tr>
        </table>
        <br>
        <table class="table table-bordered table-responsive-md table-striped text-center" width="70%">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Correo</th>
                <th>Área</th>
                <th>Perfil</th>
                <th>Estatus</th>
                <th>Fecha de creación</th>
            </tr>
            @foreach($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->idusuario }}</td>
                <td>{{ $usuario->nombre }}</td>
                <td>{{ $usuario->apellido_paterno }}</td>
                <td>{{ $usuario->apellido_materno }}</td>
                <td>{{ $usuario->correo }}</td>
                <td>{{ $usuario->nombre_area}}</td>
                <td>{{ $usuario->nombre_perfil }}</td>
                <td>{{ $usuario->activo ==1? 'Activo': 'Inactivo'}}</td>
                <td>{{ $usuario->created_at}}</td>
            </tr>
            @endforeach
        </table>
    </body>
</html>