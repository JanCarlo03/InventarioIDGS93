<?php


use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

   
});
//Inicio de sesion
Route::name('login')->get('login/', 'LoginController@login');
Route::name('validar')->post('validar/', 'LoginController@validar');
Route::name('logout')->get('logout/', 'LoginController@logout');

//Restablecer contraseña
Route::name('olvidar_contraseña')->get('olvidar_contraseña/', 'LoginController@olvidar_contraseña');
Route::name('contraseña')->post('contraseña/', 'LoginController@contraseña');
Route::name('modificar_contraseña')->put('modificar_contraseña/', 'LoginController@modificar_contraseña');
Route::name('reset_contraseña')->put('reset_contraseña/{id?}','LoginController@reset_contraseña');
Route::name('enviar1')->get('enviar1/', 'LoginController@enviar1');

//Administrador
Route::name('usuarios')->get('usuarios/', 'SistemController@usuarios');
//Formulario nuevo usuario
Route::name('nuevo_usuario')->get('nuevo_usuario/', 'SistemController@nuevo_usuario');
Route::name('registro')->get('registro/', 'SistemController@registro');
Route::name('guardar_registro')->post('guardar_registro/', 'SistemController@guardar_registro');
//Editar usuarios
Route::name('editar_usuarios')->get('editar_usuarios/{id}','SistemController@editar_usuarios');
Route::name('modificar')->put('modificar/{id?}','SistemController@modificar');
Route::name('borrar')->get('borrar/{id?}','SistemController@borrar');

//Productos
Route::name('productos')->get('productos/','ProductosController@productos');
Route::name('nuevo_producto')->get('nuevo_producto/','ProductosController@nuevo_producto');
Route::name('guardar_producto')->post('guardar_producto/', 'ProductosController@guardar_producto');
Route::name('editar_producto')->get('editar_producto/{id}','ProductosController@editar_producto');
Route::name('modificar_producto')->put('modificar_producto/{id?}','ProductosController@modificar_producto');
Route::name('borrar_producto')->get('borrar_producto/{id?}','ProductosController@borrar_producto');

//Graficas 
Route::name('graficas')->get('graficas/', 'GraficasController@graficas');
Route::name('grafica')->get('grafica/', 'GraficasController@grafica');


//Solicitudes
Route::name('solicitudes')->get('solicitudes/','SolicitudesController@solicitudes');
Route::name('solicitudes_all')->get('solicitudes_all/','SolicitudesController@solicitudes_all');
Route::name('nueva_solicitud')->get('nueva_solicitud/','CarritoController@nueva_solicitud');
Route::name('crear')->get('crear/','SolicitudesController@crear');
Route::name('detalles')->get('detalles/{id?}','SolicitudesController@detalles');
Route::name('modi')->put('modi/{id?}','SolicitudesController@modi');
Route::name('correo')->get('correo/','SolicitudesController@correo');
Route::name('pdf_solicitudes')->get('pdf_solicitudes/{id?}','SolicitudesController@pdf_solicitudes');
Route::name('correo_usuario')->get('correo_usuario/{id}','SolicitudesController@correo_usuario');



//Reportes
Route::name('prueba')->get('prueba/', 'CarritoController@prueba');
Route::name('generar')->get('generar/', 'ReportesController@generar');
Route::name('reporte_usuario')->get('reporte_usuario/', 'ReportesController@reporte_usuario');
Route::name('reporte_productos')->get('reporte_productos/', 'ReportesController@reporte_productos');
Route::name('crear_solicitud')->get('crear_solicitud/', 'CarritoController@crear_solicitud');
Route::name('informacion')->get('informacion/', 'CarritoController@informacion');
Route::name('reporte_solicitud')->get('reporte_solicitud/{id?}', 'SolicitudesController@reporte_solicitud');

//Carrito de solicitudes
Route::name('carrito')->get('carrito/','CarritoController@carrito');
Route::name('add')->get('add/{id?}','CarritoController@add');
Route::name('destruir')->get('destruir/{id?}','CarritoController@destruir');
Route::name('actualizar')->get('actualizar/{id?}','CarritoController@actualizar');
Route::name('store')->get('store','CarritoController@store');
Route::name('eliminar_carrito')->get('eliminar_carrito','CarritoController@eliminar_carrito');
 
//Categoria
Route::name('admin_categorias')->get('admin_categorias/', 'SistemController@admin_categorias');
Route::name('categoria')->get('categoria/', 'SistemController@categoria');
Route::name('borrar_categoria')->get('borrar_categoria/{id?}', 'SistemController@borrar_categoria');

Route::name('contador')->get('contador/', 'SolicitudesController@contador');
Route::name('solicitudes_extraordinarias')->get('solicitudes_extraordinarias/', 'SolicitudesController@solicitudes_extraordinarias');

//areas
Route::name('area')->get('area/', 'SistemController@area');
Route::name('admin_areas')->get('admin_areas/', 'SistemController@admin_areas');
Route::name('borrar_area')->get('borrar_area/{id?}', 'SistemController@borrar_area');

//añadir productos a una solicitud ya realizad
Route::name('editar_soli')->get('editar_soli/{id?}','SolicitudesController@editar_soli');
Route::name('productos_editar')->get('productos_editar/{codigo?}','CarritoController@productos_editar');
Route::name('editar_solicitud')->get('editar_solicitud/{codigo?}','CarritoController@editar_solicitud');
Route::name('mostrar_carrito')->get('mostrar_carrito/{codigo?}','CarritoController@mostrar_carrito');
Route::name('buscador')->get('buscador/', 'CarritoController@buscador');
Route::name('descuento')->get('descuento/', 'SolicitudesController@descuento');

//Eliminar productos de una soliitud creada 
Route::name('eliminar_producto')->get('eliminar_producto/{id?}/{codigo}', 'SolicitudesController@eliminar_producto');

//Crear un excel 
Route::name('excel')->get('excel/', 'ProductosController@excel');

//Paypal 
Route::name('pago')->get('pago/', 'CarritoController@pago');
Route::name('payment')->get('payment/', 'PaypalController@payment');
Route::name('status')->get('status/', 'PaypalController@status');









