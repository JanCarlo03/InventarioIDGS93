<html>
    <title>Reporte de Productos</title>
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
                padding: 8px;
                height: 1px;
            }
        </style>
    </head>
    <body>
    <table class="primera">
        <tr class="dos">
                <th rowspan="2"><center><img src="https://i.mkt.lu/dl/thumb/82882342450/80174152020.jpg" width="80px" height="60px"></center></th>
                <td style="width:455px "> <h5 style="text-align: center;"> <FONT FACE="impact" SIZE=3 COLOR="DarkOrange">Grupo Interdisciplinario de Ingeniería y Servicios S.A de C.V </FONT> </h5></td>
                <td>Fecha: <br>{{ $dates }}</td>
            </tr>
            <tr>
                <td><h2 style="text-align: center;">Reporte de productos</h2></td>
                <td></td>
            </tr>
            
        </table>
        <br>
        
        <table >
            <tr>
                <th style="text-align: center;">ID</th>
                <th style="text-align: center;">Nombre</th>
                <th style="text-align: center;">Cantidad en Stock</th>
                <th style="text-align: center;">Categoría</th>
                <th style="text-align: center;">Estatus</th>

            </tr>
            @foreach($productos as $producto)
            <tr>
                <td style="text-align: center;">{{ $producto->idproducto }}</td>
                <td style="text-align: center;">{{ $producto->nombre_producto }}</td>
                <td style="text-align: center;">{{ $producto->cantidad }}</td>
                <td style="text-align: center;">{{ $producto->nombre_categoria }}</td>
                <td style="text-align: center;">{{ $producto->activo ==1? 'Activo': 'Inactivo'}}</td>
            </tr>
            @endforeach
        </table>
    </body>
</html> 