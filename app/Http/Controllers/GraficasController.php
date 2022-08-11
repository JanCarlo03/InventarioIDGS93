<?php

namespace App\Http\Controllers;

use App\Charts\Productos;
use Illuminate\Http\Request;
use App\SolicitudesModel;
use App\ProductosModel;
use Illuminate\Support\Facades\DB;
use App\Chart;


class GraficasController extends Controller
{
    public function graficas(){

        $solicitudes = DB::table('detalle_solicitud')
            ->join('productos', 'detalle_solicitud.idproducto', '=', 'productos.idproducto')
            ->select('detalle_solicitud.idproducto', 'productos.nombre_producto')
            ->selectRaw('count(detalle_solicitud.idproducto) as num_pedidos')
            ->groupby('detalle_solicitud.idproducto', 'productos.nombre_producto')
            ->orderBy(DB::raw('count(*)'))
            ->take(3)
            
            ->get();

            $solicitudes = json_decode($solicitudes);
            return $solicitudes;

            $solicitudes_usuario = DB::table('detalle_solicitud')
            ->join('productos', 'detalle_solicitud.idproducto', '=', 'productos.idproducto')
            ->select('detalle_solicitud.idproducto', 'productos.nombre_producto')
            ->selectRaw('count(detalle_solicitud.idproducto) as num_pedidos')
            ->where('solicitudes.idusuario',session('session_id'))
            ->groupby('detalle_solicitud.idproducto', 'productos.nombre_producto')
            ->orderBy(DB::raw('count(*)'))
            ->take(3)
            
            ->get();

            $soli_usuarios = json_decode($solicitudes_usuario);
            return $solicitudes;
        //$productos = ProductosModel::all();
        //dd($productos);

        //$local = DB::table('productos')
        //->select('idproducto')
        //->plucked->all();


        //$chart = new Productos;
        //$chart->labels = (array_keys($local));
        //$chart->dataset = (array_values($local));

        //return view('graficas');
        
        
    }
    public function grafica(){
        $usuarios = DB::table('usuarios')
             ->select(DB::raw('count(*) as cantidad'))
             ->get();

             $totales = DB::table('usuarios')
             ->select(DB::raw('count(*) as cantidadd'))
             ->where('activo', '=', 1)
             ->get();

             $unos = DB::table('usuarios')
             ->select(DB::raw('count(*) as cantidadd'))
             ->where('activo', '=', 0)
             ->get();

             $solici = DB::table('solicitudes')
             ->select(DB::raw('count(*) as cantidad'))
             ->where('idestatus', '=', 1)
             ->get();

             $pendi = DB::table('solicitudes')
             ->select(DB::raw('count(*) as cantidadd'))
             ->where('idestatus', '=', 2)
             ->get();

             $completadas = DB::table('solicitudes')
             ->select(DB::raw('count(*) as cantidadd'))
             ->where('idestatus', '=', 3)
             ->get();

             $solicitu = DB::table('solicitudes')
             ->select(DB::raw('count(*) as cantidad'))
             ->where('solicitudes.idusuario',session('session_id'))
             ->where('idestatus', '=', 1)
             ->get();

             $pendientes = DB::table('solicitudes')
             ->select(DB::raw('count(*) as cantidad'))
             ->where('solicitudes.idusuario',session('session_id'))
             ->where('idestatus', '=', 2)
             ->get();
             
             $completa = DB::table('solicitudes')
             ->select(DB::raw('count(*) as cantidad'))
             ->where('solicitudes.idusuario',session('session_id'))
             ->where('idestatus', '=', 3)
             ->get();

             $terminarse = DB::table('productos')
             ->select('nombre_producto','cantidad')
             ->where('cantidad','<',5)
             ->get();

        return view('graficas')
        ->with(['completa' => $completa])
        ->with(['pendientes' => $pendientes])
        ->with(['solicitu' => $solicitu])
        ->with(['completadas' => $completadas])
        ->with(['solici' => $solici])
        ->with(['pendi' => $pendi])
        ->with(['usuarios' => $usuarios])
        ->with(['totales' => $totales])
        ->with(['unos' => $unos])
        ->with(['terminarse' => $terminarse]);
    }
    


    
    
}
