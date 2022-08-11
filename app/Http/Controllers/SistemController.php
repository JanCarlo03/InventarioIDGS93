<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\AreasModel;
use App\PerfilesModel;
use App\CategoriasModel;
use Illuminate\Support\Facades\DB;
use App\UsuariosModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests\UsuariosRequest;
use App\Http\Requests\AreasRequest;
use App\Http\Requests\CategoriasRequest;
use Session;

class SistemController extends Controller
{
    //Registrar nuevos usuarios
    public function registro(){
    
        return view("nuevo_usuario");
    }
    public function guardar_registro(UsuariosRequest $request){

        $usu = UsuariosModel::create(array(
          'nombre' => $request->input('nombre'),
          'apellido_paterno' => $request->input('apellido_paterno'),
          'apellido_materno' => $request->input('apellido_materno'),
          'correo' => $request->input('correo'),
          'contraseña' => Hash::make($request->input('contraseña')),   
          'idarea' => 1,
          'idperfil' => 1,
          'activo' => 1,
        ));
        //dd($usu);
        return redirect('login')->with('message','El usuario se registro con exito!');
    }

    //Mostrar los usuarios en la tabla 
    public function usuarios(){
        $usuarios = DB::table('usuarios')
        ->where('activo', 1)
        ->Paginate(5);
    //$usus= \DB::table('tb_alumnos')->get;
        return view("administrador")
        ->with(['usuarios' => $usuarios]);
    }
    //editar los usuarios 
    public function editar_usuarios(Request $request, UsuariosModel $id){
        $nuevos = DB::table('usuarios')
            ->join('areas','usuarios.idarea','=','areas.idarea') 
            ->join('perfiles','usuarios.idperfil','=','perfiles.idperfil') 
            ->select('usuarios.idarea','usuarios.idperfil','areas.nombre_area','perfiles.nombre_perfil')
            ->where('usuarios.idusuario',$id->idusuario)
            ->get();
            
        //dd($nuevos);
        return view("editar_usuarios")
        ->with(['usuario' => $id])
        ->with(['nuevos' => $nuevos]);
    }
    public function modificar(UsuariosModel $id, Request $request){
    
        $con = UsuariosModel::find($id->idusuario);
        
              $con -> nombre = $request -> nombre;
              $con -> apellido_paterno = $request -> apellido_paterno;
              $con -> apellido_materno  = $request -> apellido_materno ;
              $con -> correo = $request -> correo;
              $con -> save();
        
        return redirect()->route("usuarios", ['id' => $id->idusuario])->with('message2','Usuario actualizado!');
    }
    
    public function borrar(UsuariosModel $id){
        //dd($id);
        $id = UsuariosModel::find($id->idusuario);
        $id -> activo = 0;
        dd($id->nombre);
        $id -> save();
        //dd($id);
        return redirect()->route('usuarios')->with('message5','Usuario desactivado');
    }
    public function categoria(CategoriasRequest $request){

        $usu = CategoriasModel::create(array(
          'nombre_categoria' => $request->input('nombre_categoria'),
          'activo' => 1,
        ));
        return redirect('usuarios')->with('message3','Categoria registrada con exito!');
    }
    public function area(AreasRequest $request){

        $usu = AreasModel::create(array(
          'nombre_area' => $request->input('nombre_area'),
          'activo' => 1,
        ));
        return redirect('usuarios')->with('message4','Área registrada con exito!');
    }
}
