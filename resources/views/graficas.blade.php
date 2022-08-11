
<!DOCTYPE html>
<html lang="MX-ESP">
    <head>
    <link rel="icon" href="{{ asset('img/ms-icon-310x310.png') }}">
    </head>
<header>
    @if(empty(session('session_tipo') != 1 ))
    <title>Administrador</title>
        @elseif(empty(session('session_tipo') != 2 ))
        <title>Almacén</title>
            @elseif(empty(session('session_tipo') != 3 ))
            <title> Usuario</title>
    @endif
    
    <meta charset="UTF-8">
    <meta name="title" content="Administrador">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.4.1/dist/chart.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/mdb.min.css">
    
    
    @include('barra')
    
</header>

<body>
    
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card h-100">
    <h6 class="card-header text-center font-weight-bold text-uppercase py-4">Productos mas solicitados </h6>
            <div class="card-body">
                <style>
                    #chartdiv {
                    width: 110%;
                    height: 200px;
                    }

                </style>
                <!-- Resources -->
                <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
                <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
                <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

                <!-- Chart code -->
                <script>
                am4core.ready(function() {

                // Themes begin
                am4core.useTheme(am4themes_animated);
                // Themes end

                // Create chart
                var chart = am4core.create("chartdiv", am4charts.PieChart);
                chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

                chart.dataSource.url = "http://localhost/seguridad/public/graficas";

                var series = chart.series.push(new am4charts.PieSeries());
                series.dataFields.value = "num_pedidos";
                series.dataFields.radiusValue = "num_pedidos";
                series.dataFields.category = "nombre_producto";
                series.slices.template.cornerRadius = 6;
                series.colors.step = 3;

                series.hiddenState.properties.endAngle = -90;

                chart.legend = new am4charts.Legend();

                }); // end am4core.ready()
                </script>

                <!-- HTML -->
                <div id="chartdiv"></div>
            </div>
        </div>
    </div>
    @if(empty(session('session_tipo') != 1 && session('session_tipo') != 2))
        <div class="col">
        <div class="card h-100">
        <h6 class="card-header text-center font-weight-bold text-uppercase py-4">Solicitudes </h6>
        <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Solicitudes creadas </div>
                            @foreach($solici as $solic)
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $solic->cantidad }}</div>
                            @endforeach
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-archive fa-2x text-gray-300"></i>
                    </div>
                </div>
                <hr>
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Solicitudes pendientes </div>
                            @foreach($pendi as $pen)
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pen->cantidadd }}</div>
                        @endforeach
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-card-list fa-2x text-gray-300"></i>
                    </div>
                </div>
                <hr>
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Solicitudes completadas  </div>
                            @foreach($completadas as $completada)
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $completada->cantidadd }}</div>
                        @endforeach
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-card-checklist fa-2x text-gray-300"></i>
                    </div>
                </div>
            </p>
        </div>
        </div>
    </div> 
    @if(empty(session('session_tipo') != 2 ))
    <div class="col">
        <div class="card h-100">
        <h6 class="card-header text-center font-weight-bold text-uppercase py-4">Productos por terminarse </h6>
        <div class="card-body">
        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
        @foreach($terminarse as $termino)
            {{ $termino->nombre_producto }} ({{ $termino->cantidad }})<br><hr>
            @endforeach
       </div>
        </div>
        </div>
    </div> 
    @endif
    @endif
    @if(empty(session('session_tipo') != 3 ))
        <div class="col">
        <div class="card h-100">
        <h6 class="card-header text-center font-weight-bold text-uppercase py-4">Solicitudes </h6>
        <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Solicitudes Creadas </div>
                            @foreach($solicitu as $solicit)
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $solicit->cantidad }}</div>
                        @endforeach
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-archive fa-2x text-gray-300"></i>
                    </div>
                </div>
                <hr>
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Solicitudes pendientes </div>
                            @foreach($pendientes as $pendiente)
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pendiente->cantidad }}</div>
                        @endforeach
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-card-list fa-2x text-gray-300"></i>
                    </div>
                </div>
                <hr>
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Solicitudes completadas  </div>
                            @foreach($completa as $completad)
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $completad->cantidad }}</div>
                        @endforeach
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-card-checklist fa-2x text-gray-300"></i>
                    </div>
                </div>
            </p>
        </div>
        </div>
    </div> 
    @endif
  
    @if(empty(session('session_tipo') != 1 ))
  <div class="col">
    <div class="card h-100">
    <h6 class="card-header text-center font-weight-bold text-uppercase py-4">Usuarios</h6>
      <div class="card-body">
        <h5 class="card-title"></h5>
        <p class="card-text">
          
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                    Usuarios totales </div>
                    @foreach($usuarios as $usuario)
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $usuario->cantidad }}</div>
                @endforeach
            </div>
            <div class="col-auto">
                <i class="bi bi-people fa-2x text-gray-300"></i>
            </div>
        </div>
        <hr>
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                    Usuarios Activos </div>
                    @foreach($totales as $total)
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total->cantidadd }}</div>
                @endforeach
            </div>
            <div class="col-auto">
                <i class="bi bi-person-check fa-2x text-gray-300"></i>
            </div>
        </div>
        <hr>
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                    Usuarios Inactivos </div>
                    @foreach($unos as $uno)
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $uno->cantidadd }}</div>
                @endforeach
            </div>
            <div class="col-auto">
                <i class="bi bi-person-x fa-2x text-gray-300"></i>
            </div>
        </div>
        </p>
      </div>
    </div>
  </div>
  @endif
        </div>
    </div>
    </div>
</body>

</html>
