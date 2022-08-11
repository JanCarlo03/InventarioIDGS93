<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\UsuariosModel;
use App\IniciosModel;
use Illuminate\Support\Facades\DB;
use App\Http\Request\ValidarRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Mail;

class LoginController extends Controller
{
    Use AuthenticatesUsers;
    //Iniciar sesion
    public function login(){
        return view('login');
    }
    public function validar(Request $request){
        $correo = $request->input('correo');
        $contraseña = $request->input('contraseña');

        $recuperar = DB::table('usuarios')
        ->select('contraseña')
        ->where('correo','=',$correo)
        ->first();

        //dd($recuperar);
        if( $recuperar == NULL){
            return redirect('login')->with('message','Usuarios y/o contraseña incorrectos');
        }
        else{
        $encri = Hash::check($contraseña,$recuperar->contraseña);
        if($encri == false){

            return redirect('login')->with('message','Usuarios y/o contraseña incorrectos');
        }
        else{
         $informacion = DB::table('usuarios')
                ->select('idusuario','nombre','apellido_paterno','apellido_materno','correo','contraseña','idarea','idperfil','activo')
                ->where('correo','=',$correo)
                ->first();

            $request->session()->put('session_id', $informacion->idusuario);
            $request->session()->put('session_name', $informacion->nombre);
            $request->session()->put('session_tipo', $informacion->idperfil);
            $request->session()->put('session_contraseña', $informacion->contraseña);
            $request->session()->put('session_activo', $informacion->activo);
            $request->session()->put('session_correo', $informacion->correo);

           

            $session_id = $request->session()->get('session_id');
            $session_name = $request->session()->get('session_name');
            $session_tipo = $request->session()->get('session_tipo');
            $session_activo = $request->session()->get('session_activo');
            $session_correo = $request->session()->get('session_correo');
            $session_contraseña = $request->session()->get('session_contraseña');

            $usu = IniciosModel::create(array(
                'idusuario' => session('session_id')
              ));
              //dd($session_tipo);
              if($session_activo == 1){
            
                if($session_tipo == 1){
                    //    regresa view('administrador');
                    return redirect()->route('grafica');
                    }
                        else if($session_tipo == 2){
                                //regresa vie('almacen');
                                return redirect()->route('grafica');
                            }
                            else if($session_tipo == 3){
                                //regresa vie('usuario');
                                return redirect()->route('grafica');
                            }
                    
                    }
                else {
                    return view('login');
                }
            }
        }
    }
    
    public function logout(Request $request){
        $request->session()->forget('session_id');
        $request->session()->forget('session_name');
        $request->session()->forget('session_tipo');
        $request->session()->forget('session_activo');
         $request->session()->forget('session_correo');
        $request->session()->forget('session_contraseña');
        

        return view('login');
    }

    //Restablecer contraseña
    public function olvidar_contraseña(){
        return view('olvidar_contraseña');
    }
    public function contraseña(Request $request){
        $correo = $request->input('correo');

        $consulta = UsuariosModel::where('correo','=',$correo)
        ->get();
        //dd($consulta);                                                          
        if(count($consulta)==0){
            
            return redirect('olvidar_contraseña')->with('message','*Correo no registrado*');
        }
        else{
            $request->session()->put('session_id', $consulta[0]->idusuario);
            $request->session()->put('session_correo', $consulta[0]->correo);

            $session_correo = $request->session()->get('session_correo');

            return view('modificar_contraseña');
        }
    }

    public function modificar_contraseña(){
        return view('modificar_contraseña');
        
    }
    public function reset_contraseña(UsuariosModel $id, Request $request){
             
        $modificar = UsuariosModel::find(session('session_id'));
        $modificar -> contraseña = Hash::make($request-> contraseña);
        $modificar -> save();

        session(['session_contraseña' => $request-> contraseña ]);
        
        return redirect('enviar1');
        }
        
        public function enviar1(Request $request){
            $data = array(
                'ejemplo'=>'',
                'nombre'=>session('session_name'),
                'correo'=>session('session_correo'),
                'asunto'=>'La contraseña se restablecio exitosamente',
                'mensaje'=> session('session_contraseña')
            );
           Mail::send('email',$data, function($message){
               $message->to(session('session_correo'),'Jan Carlo')
                ->subject('Restablecimiento de contraseña');
                $message->from('inventarios.grupoiis@gmail.com','Inventario Grupo IIS');
           });
    
           if(Mail::failures()){
               return "error!!";
           }
           else{
               return redirect('login')->with('message1','*Contraseña restablecida*');
           }
        }
}