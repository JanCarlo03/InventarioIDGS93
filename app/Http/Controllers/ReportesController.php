<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SolicitudesModel;
use App\UsuariosModel;
use App\PRoductosModel;
Use pd;
use Carbon\Carbon; 
use Illuminate\Support\Facades\DB;
use Mail;

class ReportesController extends Controller
{
    public function generar(){
        $solicitudes = SolicitudesModel::join('usuarios','solicitudes.idusuario','=','usuarios.idusuario') 
        ->join('estatus','solicitudes.idestatus','=','estatus.idestatus')
        ->select('solicitudes.idsolicitud','solicitudes.codigo_solicitud','solicitudes.created_at','usuarios.nombre','estatus.nombre_estatus')
        ->get();

        $mytime = Carbon::now();
        $date = $mytime->format('d-m-Y');
        

        $pdf = \App::make('dompdf.wrapper');
        $view = \View::make('reporte_solicitudes', compact('solicitudes','date'))->render();
        $pdf->loadHTML($view);
        return $pdf->stream();
        //dd($solicitudes)
    }
    public function reporte_usuario(){
        $usuarios = UsuariosModel::join('areas','usuarios.idarea','=','areas.idarea') 
        ->join('perfiles','usuarios.idperfil','=','perfiles.idperfil')
        ->select('usuarios.idusuario','usuarios.created_at','usuarios.nombre','usuarios.apellido_paterno','usuarios.apellido_materno','usuarios.correo','areas.nombre_area','perfiles.nombre_perfil','usuarios.activo')
        ->get();
        $tiempo = Carbon::now();
        $dates = $tiempo->format('d-m-Y');

        $pdf = \App::make('dompdf.wrapper');
        $view = \View::make('reporte_usuarios', compact('usuarios','dates'))->render();
        $pdf->loadHTML($view);
        $pdf->setPaper('A4', 'Landscape');
        return $pdf->stream();
        //dd($solicitudes)
    }
    public function reporte_productos(){
        $productos = ProductosModel::join('categoria','productos.idcategoria','=','categoria.idcategoria') 
        ->select('productos.idproducto','categoria.idcategoria','productos.nombre_producto','productos.cantidad','categoria.nombre_categoria','productos.activo')
        ->get();

        $tiempo = Carbon::now();
        $dates = $tiempo->format('d-m-Y');

        //dd($dates);

        $pdf = \App::make('dompdf.wrapper');
        $view = \View::make('reporte_productos', compact('productos','dates'))->render();
        $pdf->loadHTML($view);
        
        
        return $pdf->stream();
        //dd($solicitudes)
    }
    
    
}
