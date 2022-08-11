<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SolicitudesModel;
use App\ProductosModel;
use App\UsuariosModel;
use App\ContadorModel;
use App\TemporalModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\CursorPaginator;
Use pd;
use Mail;
use Carbon\Carbon; 
use App\Cart;
use Arr;
class SolicitudesController extends Controller
{
    public function solicitudes(Request $request){
        //$solicitudes = DB::select('SELECT solicitudes.idsolicitud from solicitudes join usuarios on solicitudes.idusuario = usuario.idusuario where idsolicitud='.$request->session()->get('session_id'));
        if(empty($request->session()->get('session_id'))){
            return redirect('login');
        }
        $solicitudes = SolicitudesModel::join('usuarios','solicitudes.idusuario','=','usuarios.idusuario') 
        ->join('estatus','solicitudes.idestatus','=','estatus.idestatus')
        ->join('areas','usuarios.idarea','areas.idarea')
        ->select('solicitudes.idsolicitud','solicitudes.idestatus','solicitudes.num_productos','usuarios.nombre','usuarios.apellido_paterno','estatus.nombre_estatus','solicitudes.codigo_solicitud','solicitudes.created_at','areas.nombre_area')

        ->where('solicitudes.idusuario',session('session_id'))
        ->orderBy('solicitudes.created_at','desc')
        ->paginate(7);

        //$solicitudes = SolicitudesModel::all();
        return view('solicitudes')
        ->with(['solicitudes' => $solicitudes]);
    }
    

        public function solicitudes_all(Request $request){
            if(empty($request->session()->get('session_id'))){
                return redirect('login');
            }
            $solicitudes = SolicitudesModel::join('usuarios','solicitudes.idusuario','=','usuarios.idusuario') 
            ->join('estatus','solicitudes.idestatus','=','estatus.idestatus')
            ->join('areas','usuarios.idarea','areas.idarea')
            ->select('areas.nombre_area','solicitudes.idsolicitud','solicitudes.idestatus','solicitudes.num_productos','solicitudes.codigo_solicitud','usuarios.nombre','usuarios.apellido_paterno','estatus.nombre_estatus','solicitudes.created_at')
            ->orderBy('solicitudes.created_at','desc')
            ->Paginate(7);

            // $total = DB::table('solicitudes')
            // ->join('detalle_solicitud','solicitudes.codigo_solicitud','=','detalle_solicitud.codigo_solicitud')
    
            // ->select(DB::raw('sum(detalle_solicitud.cantidad) as Total'))
            
            //->first();
             
            //dd($total);
            //$fechas = DB::table('solicitudes')

            // $date = (int)$solicitudes('created_at')->format('d');
            // dd($date);
            //$solicitudes = SolicitudesModel::all();
            return view('solicitudes_all')
            //->with(['total' => $total])
            ->with(['solicitudes' => $solicitudes]);
        }
        public function informacion(Request $request){
            if(empty($request->session()->get('session_id'))){
                return redirect('login');
            }
            return view('informacion');
        }

        public function detalles(Request $request, SolicitudesModel $id){
            //dd($id);
            if(empty($request->session()->get('session_id'))){
                return redirect('login');
            }
            $estados = DB::table('estatus')
            ->select('nombre_estatus','idestatus')
            ->where('idestatus',3)
            ->get();
            
            $sol = DB::table('solicitudes')
            ->join('estatus','solicitudes.idestatus','=','estatus.idestatus')
            ->join('usuarios','solicitudes.idusuario','=','usuarios.idusuario')
            ->select('solicitudes.idsolicitud','solicitudes.codigo_solicitud','usuarios.nombre','usuarios.apellido_paterno','usuarios.apellido_materno','estatus.nombre_estatus','solicitudes.created_at','solicitudes.idestatus')
            ->where('solicitudes.codigo_solicitud',$id->codigo_solicitud)
            ->get();

            $info = DB::table('solicitudes')
            ->join('detalle_solicitud','solicitudes.codigo_solicitud','=','detalle_solicitud.codigo_solicitud')
            ->join('productos','detalle_solicitud.idproducto','=','productos.idproducto')
            ->join('categoria','productos.idcategoria','=','categoria.idcategoria')
            ->join('usuarios','solicitudes.idusuario','=','usuarios.idusuario')
            ->select('solicitudes.idsolicitud','solicitudes.idestatus','solicitudes.codigo_solicitud','productos.idproducto','productos.nombre_producto','productos.codigo_producto','detalle_solicitud.cantidad','usuarios.nombre','categoria.nombre_categoria')
            ->where('solicitudes.codigo_solicitud',$id->codigo_solicitud)
            ->get();

            $total = DB::table('solicitudes')
                 ->join('detalle_solicitud','solicitudes.codigo_solicitud','=','detalle_solicitud.codigo_solicitud')
                 ->select(DB::raw('sum(detalle_solicitud.cantidad) as Total'))
                 ->where('solicitudes.codigo_solicitud',$id->codigo_solicitud)
                 ->first();
            
                 $estatus = DB::table('solicitudes')
                 ->select('idestatus')
                 ->where('codigo_solicitud',$id->codigo_solicitud)
                 ->get();

            //dd($info);
            return view("detalle_solicitud")
            ->with(['sol' => $sol])
            ->with(['estados' => $estados])
            ->with(['info'=> $info])
            ->with(['estatus'=> $estatus])
            ->with(['total' => $total]);
        }
        public function modi(SolicitudesModel $id, Request $request){
           // dd($id->codigo_solicitud);
            $con = SolicitudesModel::find($id->codigo_solicitud);
            //dd($con);
            $datos = DB::table('solicitudes')
            ->join('usuarios','solicitudes.idusuario','=','usuarios.idusuario')
            ->join('detalle_solicitud','solicitudes.codigo_solicitud','=','detalle_solicitud.codigo_solicitud')
            ->join('productos','detalle_solicitud.idproducto','=','productos.idproducto')
            ->join('categoria','productos.idcategoria','=','categoria.idcategoria')
            ->select('solicitudes.idsolicitud','solicitudes.codigo_solicitud','usuarios.nombre','usuarios.apellido_paterno',
            'usuarios.apellido_materno','solicitudes.created_at','usuarios.correo','productos.codigo_producto','detalle_solicitud.cantidad','productos.nombre_producto','categoria.nombre_categoria')
            ->where('solicitudes.codigo_solicitud',$id->codigo_solicitud)
            ->get();

            $enca = DB::table('solicitudes')
            ->select('codigo_solicitud','created_at')
            ->where('solicitudes.codigo_solicitud',$id->codigo_solicitud)
            ->first();
            //dd($datos);
             $todo = DB::table('solicitudes')
             ->join('usuarios','solicitudes.idusuario','=','usuarios.idusuario')
             ->select('usuarios.nombre','usuarios.apellido_paterno',
             'usuarios.apellido_materno','solicitudes.created_at','usuarios.correo')
             ->where('solicitudes.codigo_solicitud',$id->codigo_solicitud)
             ->first();

             $data = DB::table('solicitudes')
            ->join('usuarios','solicitudes.idusuario','=','usuarios.idusuario')
            ->join('detalle_solicitud','solicitudes.codigo_solicitud','=','detalle_solicitud.codigo_solicitud')
            ->join('productos','detalle_solicitud.idproducto','=','productos.idproducto')
            ->join('categoria','productos.idcategoria','=','categoria.idcategoria')
            ->select('solicitudes.idsolicitud','solicitudes.codigo_solicitud','usuarios.nombre','usuarios.apellido_paterno',
            'usuarios.apellido_materno','solicitudes.created_at','usuarios.correo','productos.codigo_producto','detalle_solicitud.cantidad','productos.nombre_producto','categoria.nombre_categoria')
            ->where('solicitudes.codigo_solicitud',$id->codigo_solicitud)
            ->get();

            

            //dd($datos);
            //dd($todo->correo);
            //dd($con);

                    // $datos = $request['nombres'];
                    // //dd($datos);
                    //  foreach( $datos as $dato =>$valor){
                    //      $var = explode(",",$valor);
                    //       $descuento = DB::table('productos')
                    //       ->select('cantidad','nombre_producto')
                    //       ->where('idproducto',$var[0])
                    //       ->first();
                    // //     //dd($descuento->nombre_producto);
                    // //      if($var[1]>$descuento->cantidad){
                    // //         //dd($id->codigo_solicitud);
                    // //         $int = (string)$id->codigo_solicitud;
                    // //         //dd($int);
                    // //         return \Redirect::back()->with('message','El producto '.$descuento->nombre_producto.' no cuenta con suficiente cantidad en stock');
                    //  }
                    
                    //     $resta = $descuento->cantidad - $var[1];
                    //     //dd($resta);  
                    //     $descuento = DB::table('productos')
                    //     ->where('idproducto',$var[0])
                    //    ->update(['cantidad' => $resta]);
                    
                  $con -> idestatus = $request -> idestatus;
                  //dd($con->idusuario);
                  $con -> save();
                
                
                  if($con->idestatus == 3){

                    
        

                    $data = array(
                        'ejemplo'=>'',
                        'nombre'=> $data,
                        'correo'=>'becarioti.grupoiis@yahoo.com',
                        'asunto'=>$enca,
                        'mensaje'=> ''
                    );
                    
                   Mail::send('email3',$data, function($message) use ($todo){
                       $message->to($todo->correo,$todo->nombre)                       
                        ->subject('Solicitud finalizada');
                        $message->from('inventarios.grupoiis@gmail.com','Inventario Grupo IIS');
                   });
            
                   if(Mail::failures()){
                       return "error!!";
                   }
                   else{
                        
                       return redirect('solicitudes_all')->with('message10','Solicitud finalizada');
                    
                }

                
                // $datos = DB::table('solicitudes')
                // ->join('detalle_solicitud','solicitudes.codigo_solicitud','=','detalle_solicitud.codigo_solicitud')
                // ->join('productos','detalle_solicitud.idproducto','=','productos.idproducto')
                // ->where('solicitudes.codigo_solicitud',$id->codigo_solicitud)
                // ->update(['productos.cantidad' => ]);
    
                 
                  }
            return redirect()->route("solicitudes_all", ['id' => $id->codigo_solicitud])->with('message3','Solicitud actualizada!');
        }
        public function agregar_productos(){

        }
        public function reporte_solicitud(Request $request ,SolicitudesModel $id){
            //dd($id);
            if(empty($request->session()->get('session_id'))){
                return redirect('login');
            }
            $encabezados = DB::table('solicitudes')
            ->join('detalle_solicitud','solicitudes.codigo_solicitud','=','detalle_solicitud.codigo_solicitud')
            ->join('usuarios','solicitudes.idusuario','=','usuarios.idusuario')
            ->join('areas','usuarios.idarea','=','areas.idarea')
            ->select('solicitudes.created_at','solicitudes.idsolicitud','solicitudes.codigo_solicitud','usuarios.nombre','usuarios.apellido_paterno','usuarios.apellido_materno','areas.nombre_area')
            ->selectRaw('count(detalle_solicitud.cantidad) as cantidad')
            ->where('solicitudes.codigo_solicitud',$id->codigo_solicitud)
            ->groupBy('solicitudes.created_at','solicitudes.idsolicitud','solicitudes.codigo_solicitud','usuarios.nombre','usuarios.apellido_paterno','usuarios.apellido_materno','areas.nombre_area')
            ->first();
            //dd($id);

            $encabezado = DB::table('solicitudes')
            ->select('codigo_solicitud')
            ->where('codigo_solicitud',$id->codigo_solicitud)
            ->get();
            
            $estatus_cambio = DB::table('solicitudes')
            ->where('codigo_solicitud',$id->codigo_solicitud)
            ->update(['idestatus' => 2]);
            //dd($solicitud);
            //dd($encabezado);
            // $pdf = \App::make('dompdf.wrapper');
            // $view = \View::make('reporte_de_solicitud', compact('solicitud','encabezados'))->render();
            // $pdf->loadHTML($view);
    
            $data = array(
                'ejemplo'=>'',
                'nombre'=> $encabezados,
                'correo'=>'becarioti.grupoiis@yahoo.com',
                'asunto'=>'La contraseña se restablecio exitosamente',
                'mensaje'=> 'hola'
            );
            
           Mail::send('email2',$data, function($message){
               $message->to('al221910462@gmail.com','Almacén')
               
                ->subject('Nueva Solicitud');
                $message->from('envio.grupoiis@gmail.com','Inventario Grupo IIS');
           });
    
           if(Mail::failures()){
               return "error!!";
           }
           else{
                return redirect()->route("correo_usuario", ['id' => $id->codigo_solicitud]);
            
        }
    }
    public function correo_usuario(Request $request ,SolicitudesModel $id){
        $encabezados = DB::table('solicitudes')
            ->join('detalle_solicitud','solicitudes.codigo_solicitud','=','detalle_solicitud.codigo_solicitud')
            ->join('usuarios','solicitudes.idusuario','=','usuarios.idusuario')
            ->join('areas','usuarios.idarea','=','areas.idarea')
            ->select('solicitudes.created_at','solicitudes.idsolicitud','solicitudes.codigo_solicitud','usuarios.nombre','usuarios.apellido_paterno','usuarios.apellido_materno','areas.nombre_area')
            ->selectRaw('count(detalle_solicitud.cantidad) as cantidad')
            ->where('solicitudes.codigo_solicitud',$id->codigo_solicitud)
            ->groupBy('solicitudes.created_at','solicitudes.idsolicitud','solicitudes.codigo_solicitud','usuarios.nombre','usuarios.apellido_paterno','usuarios.apellido_materno','areas.nombre_area')
            ->first();

            $encabezado = DB::table('solicitudes')
            ->select('codigo_solicitud')
            ->where('codigo_solicitud',$id->codigo_solicitud)
            ->get();
            $todo = DB::table('solicitudes')
             ->join('usuarios','solicitudes.idusuario','=','usuarios.idusuario')
             ->select('usuarios.nombre','usuarios.apellido_paterno',
             'usuarios.apellido_materno','solicitudes.created_at','usuarios.correo')
             ->where('solicitudes.codigo_solicitud',$id->codigo_solicitud)
             ->first();
    
            //dd($solicitud);
            //dd($encabezado);
            // $pdf = \App::make('dompdf.wrapper');
            // $view = \View::make('reporte_de_solicitud', compact('solicitud','encabezados'))->render();
            // $pdf->loadHTML($view);
    
            $data = array(
                'ejemplo'=>'',
                'nombre'=> $encabezados,
                'correo'=>'becarioti.grupoiis@yahoo.com',
                'asunto'=>'La contraseña se restablecio exitosamente',
            );
            
           Mail::send('email_usuario',$data, function($message) use ($todo){
               $message->to($todo->correo,$todo->nombre)
               
                ->subject('Solicitud en proceso');
                $message->from('inventarios.grupoiis@gmail.com','Inventario Grupo IIS');
           });
    
           if(Mail::failures()){
               return "error!!";
           }
           else{
               return redirect('solicitudes')->with('message','Se a enviado el correo');
            
        }
    }
    public function pdf_solicitudes(Request $request , $id){
       // dd($id);
        
        $mytime = Carbon::now();
        $dates = $mytime->format('d-m-Y');
        
        $encabezados = DB::table('solicitudes')
            ->join('usuarios','solicitudes.idusuario','=','usuarios.idusuario')
            ->join('areas','usuarios.idarea','=','areas.idarea')
            ->select('solicitudes.created_at','solicitudes.idsolicitud','solicitudes.codigo_solicitud','usuarios.nombre','usuarios.apellido_paterno','usuarios.apellido_materno','areas.nombre_area')
            ->where('solicitudes.codigo_solicitud',$id)
            ->get();
            //dd($encabezados);
            $solicitud = DB::table('solicitudes')
            ->join('detalle_solicitud','solicitudes.codigo_solicitud','=','detalle_solicitud.codigo_solicitud')
            ->join('productos','detalle_solicitud.idproducto','=','productos.idproducto')
            ->join('usuarios','solicitudes.idusuario','=','usuarios.idusuario')
            ->join('areas','usuarios.idarea','=','areas.idarea')
            ->select('solicitudes.created_at','solicitudes.idsolicitud','solicitudes.codigo_solicitud','usuarios.nombre','usuarios.apellido_paterno',
            'usuarios.apellido_materno','areas.nombre_area','productos.nombre_producto','detalle_solicitud.cantidad') 
            ->where('solicitudes.codigo_solicitud',$id)
            ->groupby('detalle_solicitud.cantidad','solicitudes.created_at','solicitudes.idsolicitud','solicitudes.codigo_solicitud','usuarios.nombre',
            'usuarios.apellido_paterno','usuarios.apellido_materno','areas.nombre_area','productos.nombre_producto')
            ->get();
            
        //dd($solicitud);
            $total = DB::table('solicitudes')
                 ->join('detalle_solicitud','solicitudes.codigo_solicitud','=','detalle_solicitud.codigo_solicitud')
                 ->select(DB::raw('sum(detalle_solicitud.cantidad) as Total'))
                 ->where('solicitudes.codigo_solicitud',$id)
                 ->first();

            //dd($dates);
            //dd($total);

        $pdf = \App::make('dompdf.wrapper');
        $view = \View::make('reporte_de_solicitud', compact('encabezados','solicitud','total','dates'))->render();
        $pdf->loadHTML($view);
        return $pdf->stream();
    }
    public function editar_soli(SolicitudesModel $id, Request $request){
        //dd($id);
        $estados = DB::table('estatus')
            ->select('nombre_estatus','idestatus')
            ->get();
        $sol = DB::table('solicitudes')
            ->join('estatus','solicitudes.idestatus','=','estatus.idestatus')
            ->join('usuarios','solicitudes.idusuario','=','usuarios.idusuario')
            ->select('solicitudes.idsolicitud','solicitudes.codigo_solicitud','usuarios.nombre','usuarios.apellido_paterno','usuarios.apellido_materno','estatus.nombre_estatus','solicitudes.created_at','solicitudes.idestatus')
            ->where('solicitudes.codigo_solicitud',$id->codigo_solicitud)
            ->get();

            $info = DB::table('solicitudes')
            ->join('detalle_solicitud','solicitudes.codigo_solicitud','=','detalle_solicitud.codigo_solicitud')
            ->join('productos','detalle_solicitud.idproducto','=','productos.idproducto')
            ->join('categoria','productos.idcategoria','=','categoria.idcategoria')
            ->join('usuarios','solicitudes.idusuario','=','usuarios.idusuario')
            ->select('solicitudes.idsolicitud','solicitudes.codigo_solicitud','productos.nombre_producto','productos.codigo_producto','detalle_solicitud.idproducto','detalle_solicitud.cantidad','usuarios.nombre','categoria.nombre_categoria')
            ->where('solicitudes.codigo_solicitud',$id->codigo_solicitud)
            ->get();
            //dd($id);
            $total = DB::table('solicitudes')
                 ->join('detalle_solicitud','solicitudes.codigo_solicitud','=','detalle_solicitud.codigo_solicitud')
                 ->select(DB::raw('sum(detalle_solicitud.cantidad) as Total'))
                 ->where('solicitudes.codigo_solicitud',$id->codigo_solicitud)
                 ->first();
            $soli = DB::table('solicitudes')
            ->select('idsolicitud','codigo_solicitud')
            ->where('codigo_solicitud',$id->codigo_solicitud)
            ->get();
            

            return view("agregar_solicitud")
            ->with(['sol' => $sol])
            ->with(['info'=> $info])
            ->with(['estados'=> $estados])
            ->with(['soli'=> $soli])
            ->with(['total' => $total]);
    }
    // public function filtro (Request $request){
    //     $filtro = DB::table('solicitudes')
    //     ->join('usuarios','solicitudes.idusuario','=','usuarios.idusuario')
    //     ->join('areas','usuarios.idarea','=','areas.idarea')
    //     ->join('estatus','solicitudes.idestatus','estatus.idestatus')
    //     ->select('solicitudes.codigo_solicitud','solicitudes.num_productos','usuarios.nombre','usuarios.apellido_paterno','areas.nombre_area','solicitudes.idestatus','estatus.idestatus','solicitudes.created_at')
    //     ->where('solicitudes.created_at','=',$request->fecha_inicial);
    // }

        public function descuento(Request $request){
            $datos = $request['nombres'];
            foreach( $datos as $dato =>$valor){
                $var = explode(",",$valor);
                // $solicitud = New TemporalModel();
                // $solicitud->idproducto = $var[0];
                // $solicitud->cantidad = $var[1];
                // $solicitud->save();
                //dd($var[1]);

                 $descuento = DB::table('productos')
                 ->select('cantidad')
                 ->where('idproducto',$var[0])
                 ->first();
                 $resta = $descuento->cantidad - $var[1];
                 //dd($resta);  
                 $descuento = DB::table('productos')
                 ->where('idproducto',$var[0])
                ->update(['cantidad' => $resta]);

                 //dd($descuento->cantidad,$var[1]);
                // dd($descuento);
                

                //$descuento = DB::table('productos')

            }
        }
        public function eliminar_producto($id,$codigo,Request $request){
            //dd($codigo);
            $actua = DB::table('detalle_solicitud')
            ->where('detalle_solicitud.codigo_solicitud',$codigo)
            ->where('idproducto',$id)
            ->select('cantidad')
            ->first();
            //dd($actua->cantidad);

            $actuas = DB::table('solicitudes')
            ->where('solicitudes.codigo_solicitud',$codigo)
            ->select('num_productos')
            ->first();
            //dd($actuas->num_productos);

            $res = $actuas->num_productos - $actua->cantidad;
            //dd($res);

            $descuento = DB::table('solicitudes')
                 ->where('codigo_solicitud',$codigo)
                ->update(['num_productos' => $res]);

            $borrar = DB::table('detalle_solicitud')
            ->where('detalle_solicitud.codigo_solicitud',$codigo)
            ->where('idproducto',$id)
            ->delete();
            return \Redirect::back()->with('message','El producto fue eliminado');

            //->get();
            //$borrar->delete();
            //dd($borrar);
    }
    // public function filtrado(){
    //     sol
    // }
}