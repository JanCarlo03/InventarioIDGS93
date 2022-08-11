<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SolicitudesModel;
use App\ProductosModel;
use App\UsuariosModel;
use App\DetalleSolicitudModel;
use App\ContadorModel;
use App\Cart;
use App\Charts\Productos;
use Illuminate\Contracts\Session\Session as SessionSession;
use Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index(){
            

            
        }
        public function buscador(Request $request){
            $busqueda = DB::table('productos')
            ->join('categoria','productos.idcategoria','=','categoria.idcategoria')
            ->select('productos.idproducto','productos.codigo_producto','productos.nombre_producto','productos.cantidad','categoria.nombre_categoria','productos.descripcion')
            ->where("nombre_producto",'like',$request->texto."%")
            ->where('productos.activo',1)
            ->take(5)
            ->paginate(5);
            //dd($busqueda);
            return view('tabla_busqueda', compact('busqueda'));
        }
        public function nueva_solicitud(Request $request){
            if(empty($request->session()->get('session_id'))){
                return redirect('login');
            }
            $busqueda = DB::table('productos')
            ->join('categoria','productos.idcategoria','=','categoria.idcategoria')
            ->select('productos.idproducto','productos.codigo_producto','productos.nombre_producto','productos.cantidad','categoria.nombre_categoria','productos.descripcion')
            ->where("nombre_producto",'like',$request->texto."%")
            ->where('productos.activo',1)
            ->take(5)
            ->paginate(5);

            
            return view('nueva_solicitud', compact('busqueda'));
            
        }
        public function productos_editar(Request $request, $codigo){
            if(empty($request->session()->get('session_id'))){
                return redirect('login');
            }
            //dd($codigo);
            $sol = DB::table('solicitudes')
            ->select('idsolicitud','codigo_solicitud')
            ->where('codigo_solicitud',$codigo)
            ->get();
            //dd($sol);
            $productos = ProductosModel::join('categoria','productos.idcategoria','=','categoria.idcategoria') 
            ->select('productos.idproducto','productos.codigo_producto','categoria.idcategoria','productos.nombre_producto','productos.cantidad','categoria.nombre_categoria','productos.activo','productos.descripcion')
            ->Paginate(5);
            $busqueda = DB::table('productos')
            ->join('categoria','productos.idcategoria','=','categoria.idcategoria')
            ->select('productos.idproducto','productos.codigo_producto','productos.nombre_producto','productos.cantidad','categoria.nombre_categoria','productos.descripcion')
            ->where("nombre_producto",'like',$request->texto."%")
            ->take(5)
            ->paginate(5);

            return view('agregar_productos', compact('productos','busqueda'))
            ->with(['sol' => $sol]); 
        }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $documentos  = ContadorModel::all();
        //dd($documentos);
                $ultimoAgregado  = $documentos->last();
                $nuevo = $ultimoAgregado->numero + 1;

                $mytime = Carbon::now();
                $date = $mytime->format('Ymd');

                $numero_final = str_pad($nuevo, 4, '0', STR_PAD_LEFT);

                //dd($nuevo);
                $codigo = $date.$numero_final; 
                //dd((int)$codigo);
                //dd($codigo);
                $actualizar = DB::table('contador')
                ->where('id', 1)
                ->update(['numero' => $nuevo]);

                $cantidad = \Cart::session(session('session_id'))->getTotalQuantity();

       $solicitud = New SolicitudesModel();
        $solicitud->codigo_solicitud = (int)$codigo;
        //dd($solicitud);
        $solicitud->num_productos = $cantidad;
        $solicitud->idusuario = session('session_id');
        $solicitud->idestatus = 1;
        $solicitud->save();
        
        //dd($solicitud->codigo_solicitud);
        //productos del carrito 
        $cartItems = \Cart::session(session('session_id'))->getContent();
        //dd($cartItems->id,['cantidad'=> $cartItems->quantity]);

        foreach($cartItems as $item){
            //dd( $item->quantity);
            //  $consul = DB::table('productos')
            // ->select('cantidad')
            // ->where('idproducto', $item->id)
            // ->first();
            //  $resta = (int)$consul->cantidad - $item->quantity;
             
            // $renovar = DB::table('productos')
            // ->where('idproducto', $item->id)
            // ->update(['cantidad' => $resta]);

            $solicitud->codigo_solicitud = $codigo;
            //dd($solicitud->codigo_solicitud);
            // $detalle_solicitud = New DetalleSolicitudModel();
            // $detalle_solicitud->codigo_solicitud = (int)$codigo;
            // $detalle_solicitud->attach($item->id,['cantidad'=> $item->quantity]);
            //$solicitud->detalle_solicitud()->codigo_solicitud = (int)$codigo;
            $solicitud->detalle_solicitud()->attach($item->id,['cantidad'=> $item->quantity]);
            

        }
            
        \Cart::session(session('session_id'))->clear();
       return redirect()->route('solicitudes');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    

    public function add($id){
        

        $producto = ProductosModel::find($id);
        
        \Cart::session(session('session_id'))->add(array(
            'id' => $producto->idproducto,
            'name' => $producto->nombre_producto,
            'price' => 1,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $producto
        ));
        return back()->with('message','Producto agregado a la solicitud');
    }
    public function informacion(){
        $cartItems = \Cart::session(session('session_id'))->getContent();
        

        return view('carrito', compact('cartItems')); 
    }
    public function destruir($id){
         \Cart::session(session('session_id'))->remove($id);
        return back();
    }
    public function actualizar($id){

        \Cart::session(session('session_id'))->update($id, [
            'quantity' => array(
                'relative' => false,
                'value' => request('quantity')
            ),
            
        ]);
        return back();
    }
    public function eliminar_carrito(){
     
        \Cart::session(session('session_id'))->clear();
        
        return redirect()->route('nueva_solicitud');
    }
    public function editar_solicitud($codigo){
        $solicitud = New SolicitudesModel();
        $solicitud->codigo_solicitud = (int)$codigo;
        $cartItems = \Cart::session(session('session_id'))->getContent();

        $cantidad = \Cart::session(session('session_id'))->getTotalQuantity();

         $agregados = DB::table('solicitudes')
             ->select('num_productos')
             ->where('codigo_solicitud',$codigo)
             ->first();

        $nueva_cantidad = $agregados->num_productos + $cantidad;

             $update = DB::table('solicitudes')
             ->where('codigo_solicitud',$codigo)
             ->update(['num_productos' => $nueva_cantidad]);

        foreach($cartItems as $item){
            $solicitud->codigo_solicitud = $codigo;
            $solicitud->detalle_solicitud()->attach($item->id,['cantidad'=> $item->quantity]);
    }
    \Cart::session(session('session_id'))->clear();
       return redirect()->route('solicitudes');
    }
    public function mostrar_carrito($codigo){
        $cartItems = \Cart::session(session('session_id'))->getContent();
        
        $sol = DB::table('solicitudes')
        ->select('idsolicitud','codigo_solicitud')
        ->where('codigo_solicitud',$codigo)
        ->get();
        return view('carrito_editor', compact('cartItems'))
        ->with(['sol' => $sol]); 
    }
    public function pago(){
    
        return view("paypal ");
    }
}