<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\reporte_pago;
use App\Http\Controllers\area_medicob;
use App\Http\Controllers\usuarios;
use App\Http\Controllers\busqueda;
use App\Http\Controllers\medicos;
use App\Http\Controllers\area_medico;
use App\Http\Controllers\area_medicoc;
use App\Http\Controllers\disease_robot;
use App\Http\Controllers\perfil_medico;
use App\Http\Controllers\correo_a_medico;
use App\Http\Controllers\calendar_doctor;
use App\Http\Controllers\comprando_perfil;
use App\Http\Controllers\disease_robot_woman;
use App\Http\Controllers\Organos\corazon;
use App\Http\Controllers\Organos\pulmon;
use App\Http\Controllers\Organos\higado;
use App\Http\Controllers\Organos\intestino;
use App\Http\Controllers\Organos\estomago;
use App\Http\Controllers\Organos\pancreas;
use App\Http\Controllers\Organos\esofago;
use App\Http\Controllers\Organos\rinon;
use App\Http\Controllers\Organos\vejiga;
use App\Http\Controllers\Organos\venas_arterias;
use App\Http\Controllers\Organos\nervios;
use App\Http\Controllers\Organos\dientes;
use App\Http\Controllers\Organos\ojos;
use App\Http\Controllers\Organos\nariz;
use App\Http\Controllers\Organos\oido;
use App\Http\Controllers\Organos\cerebro;
use App\Http\Controllers\Organos\piel;
use App\Http\Controllers\Organos\senos;
use App\Http\Controllers\Organos\vulva;
use App\Http\Controllers\administrator;
use App\Http\Controllers\medicos_disponibles;
use App\Http\Controllers\clinicas_disponibles;
use App\Http\Controllers\perfil_clinico;
use App\Http\Controllers\comprando_perfil_empresarial;
use App\Http\Controllers\area_empresarial;
use App\Http\Controllers\download_user_manual;
use App\Http\Controllers\Livewire\Example;
use App\Http\Controllers\PDFController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|use App\Http\Controllers\Auth\RegisteredUserController;
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|{{route('editar_medico_perfil',$perfil->id)}}
->where('id','[0-9]+')
SELECT * FROM `medicos` WHERE `revendedor` = '18033032' AND `created_at` BETWEEN '2021-11-14' and '2021-11-15';

->middleware(['negar_acceso_formularios_perfiles'])

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
*/


Route::get('/', function () {return view('welcome');});
/*Route::get('/lista_de_medicos_disponibles_en_tumedibot.com/Super_Buscador',[medicos_disponibles::class,'medicos'])->name('lista_medico');*/
Route::get('/lista_de_medicos_disponibles_en_tumedibot.com/Super_Buscador',[medicos_disponibles::class,'medicos'])->name('lista_medico');

Route::get('/lista_de_empresas_de_salud_disponibles_en_tumedibot.com/Super_Buscador_Empresarial',[clinicas_disponibles::class,'clinicas'])->name('lista_empresarial');

Route::get('/prueba', function () {return view('auth.forgot-password');});
Route::get('/politicas/privacidad/', function () {return view('terminos.privacy');})->name('privacy');
//Route::get('/calendar/', function () {return view('calendar');})->name('calendar');
Route::get('/terminos/y/condiciones/', function () {return view('terminos.terms');})->name('terms');
Route::get('/cookies/politicas', function () {return view('terminos.cookies');})->name('cookies');

/*Route::get('register/verify/{codigo}',[RegisteredUserController::class,'verify']);*/
Route::get('/crypto_pay', function () {return view('crypto');})->name('crypto_pay');

Route::group(['middleware' => 'auth'], function(){
Route::get('/diseaseRobot', [disease_robot::class,'robot'])->middleware(['verified'])->name('disease_robot');
Route::get('/diseaseRobotWoman', [disease_robot_woman::class,'robot_woman'])->name('disease_robot_woman');
Route::get('/manual_de_usuario',[download_user_manual::class,'user_manual'])->name('manual_usuario');

Route::get('/backing', function () {
	$user = Auth::id();
	return redirect()->route('area_medico_get',$user);})->name('backing');

Route::get('/back', function () {
	$user = Auth::id();
	return redirect()->route('area_empresarial_get',$user);})->name('back_clinicas');

	//rutas API de VUE
Route::get('/calendario/medico/{medico}/{user}', [calendar_doctor::class,'create'])->middleware(['negar_acceso_calendario'])->name('prove_fetch');
Route::get('/calendario/medico/{medico}/{user}',[calendar_doctor::class,'create']);
Route::get('/pacientes/{medico}/{user}', [calendar_doctor::class,'pacientesIndex'])->name('pacientes');
// En routes/web.php
Route::get('/medico/editar/{medico}', [perfil_medico::class, 'showEditView'])->name('medico.editar');




//Medicos
Route::get('/perfilesMedicosAutenticated/{user}', [medicos::class,'perfilesMedicosAutenticated'])->middleware(['negar_acceso_perfiles_medicos'])->name('perfilesMedicosAutenticated');
Route::get('/comprando_perfil_medico/{user}', [comprando_perfil::class,'comprando_perfil_medico'])->middleware(['negar_acceso_perfiles_medicos'])->name('comprando_perfil_medico');
Route::get('/comprando_perfil_medico_b/{user}', [comprando_perfil::class,'comprando_perfil_medico_b'])->middleware(['negar_acceso_perfiles_medicos'])->name('comprando_perfil_medico_b');
Route::get('/comprando_perfil_medico_c/{user}', [comprando_perfil::class,'comprando_perfil_medico_c'])->middleware(['negar_acceso_perfiles_medicos'])->name('comprando_perfil_medico_c');
Route::get('/perfilesMedicos', [medicos::class,'MedicosGet'])->middleware(['negar_acceso_formularios_perfiles'])->name('perfilesMedicos');
Route::get('/pagando_perfil_medico/{user}/{pedido}', [comprando_perfil::class,'pagando_perfil_medico'])->middleware(['negar_acceso_perfiles_medicos'])->name('pagando_perfil_medico');
Route::get('/pagando_perfil_medico_b/{user}', [comprando_perfil::class,'pagando_perfil_medico_b'])->middleware(['negar_acceso_perfiles_medicos'])->name('pagando_perfil_medico_b');
Route::get('/pagando_perfil_medico_c/{user}', [comprando_perfil::class,'pagando_perfil_medico_c'])->middleware(['negar_acceso_perfiles_medicos'])->name('pagando_perfil_medico_c');
Route::get('/area_medico/{user}',[area_medico::class,'area_medico_get'])->middleware(['negar_acceso_area_medico'])->name('area_medico_get');
Route::get('/pedido/{user}/andromeda',[area_medico::class,'pedido'])->middleware(['negar_acceso_area_medico'])->name('pedido');
Route::get('/pedido/{user}/fenix',[area_medicob::class,'pedidob'])->middleware(['negar_acceso_area_medico'])->name('pedidob');
Route::get('/pedido/{user}/pegasus',[area_medicoc::class,'pedidoc'])->middleware(['negar_acceso_area_medico'])->name('pedidoc');
Route::post('/area_medico/{user}',[area_medico::class,'factura'])->middleware(['negar_acceso_area_medico'])->name('area_medico');
Route::get('/reporte_pago/{user}',[reporte_pago::class,'reporte_pago'])->middleware(['negar_acceso_reporte_pago'])->name('reporte_pago');
Route::post('/reporte_pago/{user}',[reporte_pago::class,'reporte_pago_post'])->name('reporte_pago_post');
Route::post('/perfilesMedicos', [medicos::class,'Medicos'])->name('perfilesMedicos');

Route::get('/perfil_personal/{medico}',[perfil_medico::class,'perfil_personal'])->middleware(['negar_acceso_perfiles_Con_Id'])->name('perfil_personal');

Route::get('/comprar_plan_medico/factura/{user}/editar',[area_medico::class,'editar_f_andromeda'])->middleware(['negar_acceso_editar_factura_medico'])->name('f_andromeda_editar');
Route::put('/actualizar_plan/factura/actualizar',[area_medico::class,'actualizar_f_andromeda'])->name('f_andromeda_actualizar');

Route::get('/enviar_correo/desde_usuario/a_medico',[correo_a_medico::class,'enviar_correo'])->name('enviar_correo');
Route::post('/enviar_correo/desde_usuario/a_medico',[correo_a_medico::class,'enviar_correo'])->name('enviar_correo');

//perfil_medico
Route::get('/perfil_medico/{medico}',[perfil_medico::class,'medico_perfil'])->middleware(['negar_acceso_perfiles_Con_Id'])->name('perfil_medico');

Route::get('perfil_medico/{medico}/editar',[perfil_medico::class,'editar_perfil_medico'])->middleware(['negar_acceso_editar_perfil'])->name('editar_medico_perfil');
Route::delete('perfil_medico/{medico}/eliminar',[perfil_medico::class,'delete_perfil_medico'])->middleware(['negar_acceso_editar_perfil'])->name('delete_medico_perfil');

Route::put('perfil_medico/{medico}/',[perfil_medico::class,'actualizar_perfil_medico'])->middleware(['auth'])->name('actualizar_medico_perfil');

//Clinicas
Route::get('/comprando_perfil_empresarial_cisne/{user}', [comprando_perfil_empresarial::class,'comprando_perfil_empresarial_cisne'])->name('comprando_perfil_empresarial_cisne');
Route::get('/comprando_perfil_empresarial_aioria/{user}', [comprando_perfil_empresarial::class,'comprando_perfil_empresarial_aioria'])->name('comprando_perfil_empresarial_aioria');
Route::get('/comprando_perfil_empresarial_dragon/{user}', [comprando_perfil_empresarial::class,'comprando_perfil_empresarial_dragon'])->name('comprando_perfil_empresarial_dragon');

Route::post('/area_empresarial/{user}',[area_empresarial::class,'factura_clinica'])->middleware(['negar_acceso_area_medico'])->name('area_empresarial');
Route::get('/area_empresarial_get/{user}',[area_empresarial::class,'area_empresarial_get'])->middleware(['negar_acceso_area_medico'])->name('area_empresarial_get');

Route::get('factura_empresarial/{user}/editar',[area_empresarial::class,'editar_factura_empresarial'])->middleware(['negar_acceso_editar_factura_empresarial'])->name('editar_factura_empresarial');
Route::put('factura_empresarial/{user}/actualizar',[area_empresarial::class,'actualizar_factura_empresarial'])->name('facturas_empresarial_actualizar');

Route::get('/pedido_empresarial_cisne/{user}/cisne',[area_empresarial::class,'pedido_empresarial_cisne'])->name('pedido_empresarial_cisne');
Route::get('/pedido_empresarial_aioria/{user}/aioria',[area_empresarial::class,'pedido_empresarial_aioria'])->name('pedido_empresarial_aioria');
Route::get('/pedido_empresarial_dragon/{user}/dragon',[area_empresarial::class,'pedido_empresarial_dragon'])->name('pedido_empresarial_dragon');

//perfil_clinico
Route::get('perfil_empresarial/{clinica}',[perfil_clinico::class,'clinica_perfil'])->name('perfil_empresarial');
Route::get('perfil_empresarial_form_fill',[perfil_clinico::class,'clinicasGet'])->middleware(['negar_acceso_formulario_perfil_empresarial'])->name('perfil_empresarial_form_fill');
Route::post('perfil_empresarial_form_fill',[perfil_clinico::class,'clinicasPost'])->name('clinicas_save');
Route::get('perfil_empresarial_form_fill/{clinica}/editar',[perfil_clinico::class,'editar_perfil_empresarial'])->middleware(['negar_acceso_editar_perfil_empresarial'])->name('clinicas_editar');
Route::put('perfil_empresarial_form_fill/{clinica}/actualizar',[perfil_clinico::class,'actualizar_perfil_empresarial'])->name('clinicas_actualizar');
Route::delete('perfil_empresarial_form_fill/{clinica}/eliminar',[perfil_clinico::class,'delete_perfil_empresarial'])->name('delete_perfil_empresarial');

Route::get('/pagando_perfil_empresarial/{user}/{pedido}', [comprando_perfil_empresarial::class,'pagando_perfil_empresarial_cisne'])->middleware(['negar_acceso_pagando_perfil_empresarial'])->name('pagando_perfil_empresarial_cisne');
Route::get('/pagando_perfil_empresarial_aioria/{user}/{pedido}', [comprando_perfil_empresarial::class,'pagando_perfil_empresarial_cisne'])->name('pagando_perfil_empresarial_aioria');
Route::get('/pagando_perfil_empresarial_dragon/{user}/{pedido}', [comprando_perfil_empresarial::class,'pagando_perfil_empresarial_cisne'])->name('pagando_perfil_empresarial_dragon');

Route::get('/reporte_pago_empresarial/{user}',[reporte_pago::class,'reporte_pago_empresarial'])->middleware(['negar_acceso_editar_factura_empresarial'])->name('reporte_pago_empresarial');
Route::post('/reporte_pago_empresarial/{user}',[reporte_pago::class,'reporte_pago_empresarial_post'])->name('reporte_pago_empresarial_post');


//deasease_
Route::get('/corazon_vista/',[corazon::class,'corazon_vista'])->middleware(['auth'])->name('corazon_vista');
Route::get('/pulmon_vista/',[pulmon::class,'pulmon_vista'])->middleware(['auth'])->name('pulmon_vista');
Route::get('/higado_vista/',[higado::class,'higado_vista'])->middleware(['auth'])->name('higado_vista');
Route::get('/intestino_vista/',[intestino::class,'intestino_vista'])->middleware(['auth'])->name('intestino_vista');
Route::get('/estomago_vista/',[estomago::class,'estomago_vista'])->middleware(['auth'])->name('estomago_vista');
Route::get('/pancreas_vista/',[pancreas::class,'pancreas_vista'])->middleware(['auth'])->name('pancreas_vista');
Route::get('/esofago_vista/',[esofago::class,'esofago_vista'])->middleware(['auth'])->name('esofago_vista');
Route::get('/riñon_vista/',[rinon::class,'rinon_vista'])->middleware(['auth'])->name('riñon_vista');
Route::get('/vejiga_vista/',[vejiga::class,'vejiga_vista'])->middleware(['auth'])->name('vejiga_vista');
Route::get('/venas_arterias_vista/',[venas_arterias::class,'venas_arterias_vista'])->middleware(['auth'])->name('venas_arterias_vista');
Route::get('/nervios_vista/',[nervios::class,'nervios_vista'])->middleware(['auth'])->name('nervios_vista');
Route::get('/dientes_vista/',[dientes::class,'dientes_vista'])->middleware(['auth'])->name('dientes_vista');
Route::get('/ojos_vista/',[ojos::class,'ojos_vista'])->middleware(['auth'])->name('ojos_vista');
Route::get('/nariz_vista/',[nariz::class,'nariz_vista'])->middleware(['auth'])->name('nariz_vista');
Route::get('/oido_vista/',[oido::class,'oido_vista'])->middleware(['auth'])->name('oido_vista');
Route::get('/cerebro_vista/',[cerebro::class,'cerebro_vista'])->middleware(['auth'])->name('cerebro_vista');
Route::get('/piel_vista/',[piel::class,'piel_vista'])->middleware(['auth'])->name('piel_vista');
Route::get('/senos_vista/',[senos::class,'senos_vista'])->middleware(['auth'])->name('senos_vista');
Route::get('/aparato_reproductor_vista/',[vulva::class,'vulva_vista'])->middleware(['auth'])->name('vulva_vista');

Route::get('/pedido_pegasus/',[area_medico::class,'actualizarPedidosPegasus'])->middleware(['auth'])->name('actualizar_pegasus');
Route::get('/pedido_andromeda/',[area_medico::class,'actualizarPedidosAndromeda'])->middleware(['auth'])->name('actualizar_andromeda');
Route::get('/pedido_fenix/',[area_medico::class,'actualizarPedidosFenix'])->middleware(['auth'])->name('actualizar_fenix');

Route::get('/pedido_cisne/',[area_empresarial::class,'actualizarPedidosCisne'])->middleware(['auth'])->name('actualizar_cisne');
Route::get('/pedido_aioria/',[area_empresarial::class,'actualizarPedidosAioria'])->middleware(['auth'])->name('actualizar_aioria');
Route::get('/pedido_dragon/',[area_empresarial::class,'actualizarPedidosDragon'])->middleware(['auth'])->name('actualizar_dragon');

Route::get('/administrator/fsdiwhruih3er8djhh3f8dbhsfkbfkaeb3ubfdksbfu4ihbrib45iu3kbkjbfkdbk4bk5jb/Super',[administrator::class,'administrator'])->middleware(['negar_acceso_administrator']);

Route::get('/getmunicipio/{state_id}', [perfil_medico::class, 'getMunicipio'])->name('getmunicipio');
Route::get('/getparroquia/{municipio_id}', [perfil_medico::class, 'getParroquia'])->name('getparroquia');

Route::get('download_file/{name_temp}',[medicos::class,'downloading'])->name('file_download');



});



require __DIR__.'/auth.php';
