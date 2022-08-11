<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ProductosModel;
use App\CategoriasModel;
use Illuminate\Support\Facades\Hash;
use App\Http\Request\ValidarRequest;
use App\Http\Requests\ProductosRequest;
use App\Exports\ProductosExport;
use Maatwebsite\Excel\Facades\Excel;

class ProductosController extends Controller
{
    
    public function productos(){
        $productos = ProductosModel::join('categoria','productos.idcategoria','=','categoria.idcategoria') 
        ->select('productos.idproducto','categoria.idcategoria','productos.nombre_producto','productos.cantidad','categoria.nombre_categoria','productos.activo','productos.created_at','productos.updated_at')
        ->where('productos.activo', 1)
        ->paginate(6);
        //$productos = ProductosModel::all();
        //dd($productos);
        return view('productos')
        ->with(['productos' => $productos]);
    }
    public function nuevo_producto(){
        $categorias = CategoriasModel::all();
        return view("nuevo_producto")
            ->with(['categorias'=>$categorias]);
    }
    public function guardar_producto(ProductosRequest $request){

        $pro = ProductosModel::create(array(
          'codigo_producto' => $request->input('codigo_producto'),
          'nombre_producto' => $request->input('nombre_producto'),
          'cantidad' => $request->input('cantidad'),
          'idcategoria' => $request->input('idcategoria'),
          'activo' => 1,
        ));
        return redirect('productos');
    }
    public function editar_producto(Request $request, ProductosModel $id){
        $productoss = ProductosModel::find($id->idproducto)
        ->join('categoria','productos.idcategoria','=','categoria.idcategoria') 
        ->select('productos.idproducto','categoria.idcategoria','productos.nombre_producto','productos.cantidad','categoria.nombre_categoria','productos.activo')
        ->get();
        $categorias = CategoriasModel::all();
        return view("editar_producto")
        ->with(['productoss'=>$productoss])
        ->with(['categorias'=>$categorias])
        ->with(['producto' => $id]);
    }
    public function modificar_producto(ProductosModel $id, Request $request){
        $con = ProductosModel::find($id->idproducto);
              $con -> nombre_producto = $request -> nombre_producto;
              $con -> cantidad = $request -> cantidad;
              $con -> save();

        return redirect()->route("productos", ['id' => $id->idproducto])->with('message2','Producto actualizado!');
    }
    public function borrar_producto(ProductosModel $id){
        $id = ProductosModel::find($id->idproducto);
        //dd($id);
        $id -> activo = 0;
        $id -> update();
        return redirect()->route('productos');
    }
    public function excel (){
        return (new ProductosExport)->download('users.xlsx');
    }
}
