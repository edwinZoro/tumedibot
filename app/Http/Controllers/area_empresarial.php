<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActualizarFacturaEmpresarial;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\FacturaClinicas;
use Illuminate\Support\Facades\Auth;
use App\Models\ReportePagoClinica;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Models\FacturaClinica;
use App\Models\PedidoClinica;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Rules\ReCaptcha;
use App\Models\Factura;
use App\Models\Clinica;
use App\Models\Medico;
use App\Models\Estado;
use App\Models\Pais;
use App\Models\User;
use Carbon\Carbon;
class area_empresarial extends Controller
{
	public function area_empresarial_get(PedidoClinica $pedido){
        $pedido = $pedido;
        $user = Auth::id();
        $facturas_clinicas = FacturaClinica::where('user_id','=',Auth::id())->get();
        $b = FacturaClinica::where('user_id','=',$user)->first();
        $clinica = Clinica::where('user_id','=',Auth::id())->first();
        $a = User::where('pagos','positive')->where('id','=',$user)->get();
        $pedi = PedidoClinica::OrderBy('id','desc')->where('facturas_clinicas_id','=',$b->id)->Paginate(5, ['*'], 'pagination_pedidos');
        $reporte = ReportePagoClinica::OrderBy('id','desc')->where('facturas_clinicas_id','=',$b->id)->Paginate(5, ['*'], 'pagination_reporte_pago');
        $reporte_b = ReportePagoClinica::OrderBy('id','desc')->where('facturas_clinicas_id','=',$b->id)->first();
        if($b->plan === 'aioria'){
            return view('clinicas.area_empresarial_aioria',['facturas_clinicas'=>$facturas_clinicas,'clinica'=>$clinica,'a'=>$a,'user'=>$user,'pedi'=>$pedi,'reporte'=>$reporte,'b'=>$b,'pedido'=>$pedido,'reporte_b'=>$reporte_b]);
        }elseif($b->plan === 'cisne'){
            return view('clinicas.area_empresarial_cisne',['facturas_clinicas'=>$facturas_clinicas,'clinica'=>$clinica,'a'=>$a,'user'=>$user,'pedi'=>$pedi,'reporte'=>$reporte,'b'=>$b,'pedido'=>$pedido,'reporte_b'=>$reporte_b]);
        }elseif($b->plan === 'dragon'){
            return view('clinicas.area_empresarial_dragon',['facturas_clinicas'=>$facturas_clinicas,'clinica'=>$clinica,'a'=>$a,'user'=>$user,'pedi'=>$pedi,'reporte'=>$reporte,'b'=>$b,'pedido'=>$pedido,'reporte_b'=>$reporte_b]);
        }
        return redirect()->back();
        
    }

    public function factura_clinica(FacturaClinicas $request){
        $data = $request->validated();
         FacturaClinica::create([
            'tipo_negocio' => $data['tipo_negocio'],            
            'nombre_negocio' => $data['nombre_negocio'],
            'rif_negocio' => $data['rif_negocio'],
            'nombre_representante' => $data['nombre_representante'],
            'apellido_representante' => $data['apellido_representante'],
            'celular' => $data['telefono'],
            'ci_rif' => $data['cedula'],
            'pais' => 'Venezuela',
            'estado' => $data['estado'],
            'ciudad' => $data['ciudad'],
            'direccion' => $data['direccion'],
            'codigo_postal' => $data['codigo_postal'],
            'user_id' => $data['user_id'],
            'plan' => $data['plan'],
            ]);
            
            return redirect()->back()->with('status', 'Agregado correctamente - Se habilito en el menú un botón Área Médico');

    }
	
    public function editar_factura_empresarial(User $user){
        $factura = FacturaClinica::where('user_id','=',$user->id)->get();
        $factura_user = Factura::where('user_id','=',$user->id)->get();
        $factura_empresa = FacturaClinica::where('user_id','=',$user->id)->first();
        $estado = Pais::all();
        foreach($factura as $f){
            $factu_cli = $f->user_id;
           
        }
        if(isset($factu_cli)===false){
            $factu_cli = 1;
        }

        foreach($factura_user as $fa){
            $factu = $fa->user_id;
           
        }
        if(isset($factu)===false){
            $factu = 1;
        }
        return view('clinicas.editar_factura_empresarial',['factura_empresa'=>$factura_empresa,'factu_cli'=>$factu_cli,'user'=> $user,'estado'=>$estado,'factu'=>$factu]);
    }

    public function actualizar_factura_empresarial(ActualizarFacturaEmpresarial $request){
            $user = Auth::id();
            $data = $request->validated();

            FacturaClinica::where('user_id','=',$user)->update([
            'tipo_negocio' => $data['tipo_negocio'],
            'nombre_negocio' => $data['nombre_negocio'],
            'rif_negocio' => $data['rif_negocio'],
            'nombre_representante' => $data['nombre_representante'],
            'apellido_representante' => $data['apellido_representante'],
            'celular' => $data['telefono'],
            'ci_rif' => $data['cedula'],
            'pais' => 'Venezuela',
            'estado' => $data['estado'],
            'ciudad' => $data['ciudad'],
            'direccion' => $data['direccion'],
            'codigo_postal' => $data['codigo_postal'],
            'user_id' => $data['user_id'],
            ]);
         return redirect()->route('area_empresarial_get',$user)->with('statusb', 'Actualizado correctamente - Puede regresar al Área Empresarial');
    }  

        public function pedido_empresarial_cisne(){
        //$dolar = config('global.dolar');
        $user = Auth::id();
        $facturas_clinicas = FacturaClinica::where('user_id','=',Auth::id())->get();
        $clinica = Clinica::where('user_id','=',Auth::id())->first();
        $a = User::where('pagos_clinicas','positive')->where('id','=',Auth::id())->get();
        $pedi = PedidoClinica::Paginate(2);
        $date = Carbon::now();
        $fecha_pedido = $date->format('Y-m-d');
        $fecha_vence_pedido = $date->addDay(7);
        $fecha_vence_pedido = $fecha_vence_pedido->format('Y-m-d');
        $transaccion_id = strtoupper(Str::random(5));
        $plan = 'cisne';
        $total = 30;
        $iva_= 16;
        $iva = ($total * $iva_)/100;
        $subtotal = $total;
        $totalb = $total + (($total * $iva_)/100);
        $estado='No Pagado';
        $ticket = mt_rand(220000,500000);
        foreach($facturas_clinicas as $fa){
            $factura_id=$fa->id;
        }

        $data = array(
            'transaccion_id' => $transaccion_id,
            'total' => $totalb,
            'sub_total' => $subtotal,
            'iva' => $iva,
            'facturas_clinicas_id' => $factura_id,
            'plan' => $plan,
            'ticket' => $ticket,
            'fecha_pedido' => $fecha_pedido,
            'fecha_vence_pedido' => $fecha_vence_pedido,
            'estado' => $estado,
            );
            
        $validator = Validator::make($data, [
            'data.*.transaccion_id' => 'required|unique:pedidos_clinicas,transaccion_id|max:5',
            'data.*.total' => 'required',
            'data.*.sub_total' => 'required',
            'data.*.iva' => 'required',
            'data.*.facturas_clinicas_id' => 'required',
            'data.*.plan' => 'required',
            'data.*.ticket' => 'required',
            'data.*.fecha_pedido' => 'required',
            'data.*.fecha_vence_pedido' => 'required',
            'data.*.estado' => 'required',
            ]);   

        $pedidos = PedidoClinica::where('facturas_clinicas_id','=',$fa->id)->orderBy('id','desc')->first();

        if(isset($pedidos)=== false){
            PedidoClinica::create([
            'transaccion_id' => $data['transaccion_id'],
            'total' => $data['total'],
            'sub_total' => $data['sub_total'],
            'iva' => $data['iva'],
            'facturas_clinicas_id' => $data['facturas_clinicas_id'],
            'plan' => $data['plan'],
            'ticket' => $data['ticket'],
            'fecha_pedido' => $data['fecha_pedido'],
            'fecha_vence_pedido' => $data['fecha_vence_pedido'],
            'estado' => $data['estado'],
            ]);
        }elseif(isset($pedidos) === true && $pedidos->estado === 'No Pagado' ){
            return back()->with('mensajepago','mensaje_pago');
        }elseif(isset($pedidos) === true && $pedidos->estado === 'Pagado'){
            PedidoClinica::create([
            'transaccion_id' => $data['transaccion_id'],
            'total' => $data['total'],
            'sub_total' => $data['sub_total'],
            'iva' => $data['iva'],
            'facturas_clinicas_id' => $data['facturas_clinicas_id'],
            'plan' => $data['plan'],
            'ticket' => $data['ticket'],
            'fecha_pedido' => $data['fecha_pedido'],
            'fecha_vence_pedido' => $data['fecha_vence_pedido'],
            'estado' => $data['estado'],
            ]);
        }

        return redirect()->back()->with(['facturas_clinicas'=>$facturas_clinicas,'clinica'=>$clinica,'a'=>$a,'user'=>$user,'pedi'=>$pedi]);
    }


    public function pedido_empresarial_aioria(){
        //$dolar = config('global.dolar');
        $user = Auth::id();
        $facturas_clinicas = FacturaClinica::where('user_id','=',Auth::id())->get();
        $clinica = Clinica::where('user_id','=',Auth::id())->first();
        $a = User::where('pagos_clinicas','positive')->where('id','=',Auth::id())->get();
        $pedi = PedidoClinica::Paginate(2);
        $date = Carbon::now();
        $fecha_pedido = $date->format('Y-m-d');
        $fecha_vence_pedido = $date->addDay(7);
        $fecha_vence_pedido = $fecha_vence_pedido->format('Y-m-d');
        $transaccion_id = strtoupper(Str::random(5));
        $plan = 'aioria';
        $total = 170;
        $iva_= 16;
        $iva = ($total * $iva_)/100;
        $subtotal = $total;
        $totalb = $total + (($total * $iva_)/100);
        $estado='No Pagado';
        $ticket = mt_rand(220000,500000);
        foreach($facturas_clinicas as $fa){
            $factura_id=$fa->id;
        }

        $data = array(
            'transaccion_id' => $transaccion_id,
            'total' => $totalb,
            'sub_total' => $subtotal,
            'iva' => $iva,
            'facturas_clinicas_id' => $factura_id,
            'plan' => $plan,
            'ticket' => $ticket,
            'fecha_pedido' => $fecha_pedido,
            'fecha_vence_pedido' => $fecha_vence_pedido,
            'estado' => $estado,
            );
            
        $validator = Validator::make($data, [
            'data.*.transaccion_id' => 'required|unique:pedidos_clinicas,transaccion_id|max:5',
            'data.*.total' => 'required',
            'data.*.sub_total' => 'required',
            'data.*.iva' => 'required',
            'data.*.facturas_clinicas_id' => 'required',
            'data.*.plan' => 'required',
            'data.*.ticket' => 'required',
            'data.*.fecha_pedido' => 'required',
            'data.*.fecha_vence_pedido' => 'required',
            'data.*.estado' => 'required',
            ]);   

        $pedidos = PedidoClinica::where('facturas_clinicas_id','=',$fa->id)->orderBy('id','desc')->first();

        if(isset($pedidos)=== false){
            PedidoClinica::create([
            'transaccion_id' => $data['transaccion_id'],
            'total' => $data['total'],
            'sub_total' => $data['sub_total'],
            'iva' => $data['iva'],
            'facturas_clinicas_id' => $data['facturas_clinicas_id'],
            'plan' => $data['plan'],
            'ticket' => $data['ticket'],
            'fecha_pedido' => $data['fecha_pedido'],
            'fecha_vence_pedido' => $data['fecha_vence_pedido'],
            'estado' => $data['estado'],
            ]);
        }elseif(isset($pedidos) === true && $pedidos->estado === 'No Pagado' ){
            return back()->with('mensajepago','mensaje_pago');
        }elseif(isset($pedidos) === true && $pedidos->estado === 'Pagado'){
            PedidoClinica::create([
            'transaccion_id' => $data['transaccion_id'],
            'total' => $data['total'],
            'sub_total' => $data['sub_total'],
            'iva' => $data['iva'],
            'facturas_clinicas_id' => $data['facturas_clinicas_id'],
            'plan' => $data['plan'],
            'ticket' => $data['ticket'],
            'fecha_pedido' => $data['fecha_pedido'],
            'fecha_vence_pedido' => $data['fecha_vence_pedido'],
            'estado' => $data['estado'],
            ]);
        }

        return redirect()->back()->with(['facturas_clinicas'=>$facturas_clinicas,'clinica'=>$clinica,'a'=>$a,'user'=>$user,'pedi'=>$pedi]);
    } 



    public function pedido_empresarial_dragon(){
        //$dolar = config('global.dolar');
        $user = Auth::id();
        $facturas_clinicas = FacturaClinica::where('user_id','=',Auth::id())->get();
        $clinica = Clinica::where('user_id','=',Auth::id())->first();
        $a = User::where('pagos_clinicas','positive')->where('id','=',Auth::id())->get();
        $pedi = PedidoClinica::Paginate(2);
        $date = Carbon::now();
        $fecha_pedido = $date->format('Y-m-d');
        $fecha_vence_pedido = $date->addDay(7);
        $fecha_vence_pedido = $fecha_vence_pedido->format('Y-m-d');
        $transaccion_id = strtoupper(Str::random(5));
        $plan = 'dragon';
        $total = 300;
        $iva_= 16;
        $iva = ($total * $iva_)/100;
        $subtotal = $total;
        $totalb = $total + (($total * $iva_)/100);
        $estado='No Pagado';
        $ticket = mt_rand(220000,500000);
        foreach($facturas_clinicas as $fa){
            $factura_id=$fa->id;
        }

        $data = array(
            'transaccion_id' => $transaccion_id,
            'total' => $totalb,
            'sub_total' => $subtotal,
            'iva' => $iva,
            'facturas_clinicas_id' => $factura_id,
            'plan' => $plan,
            'ticket' => $ticket,
            'fecha_pedido' => $fecha_pedido,
            'fecha_vence_pedido' => $fecha_vence_pedido,
            'estado' => $estado,
            );
            
        $validator = Validator::make($data, [
            'data.*.transaccion_id' => 'required|unique:pedidos_clinicas,transaccion_id|max:5',
            'data.*.total' => 'required',
            'data.*.sub_total' => 'required',
            'data.*.iva' => 'required',
            'data.*.facturas_clinicas_id' => 'required',
            'data.*.plan' => 'required',
            'data.*.ticket' => 'required',
            'data.*.fecha_pedido' => 'required',
            'data.*.fecha_vence_pedido' => 'required',
            'data.*.estado' => 'required',
            ]);   

        $pedidos = PedidoClinica::where('facturas_clinicas_id','=',$fa->id)->orderBy('id','desc')->first();

        if(isset($pedidos)=== false){
            PedidoClinica::create([
            'transaccion_id' => $data['transaccion_id'],
            'total' => $data['total'],
            'sub_total' => $data['sub_total'],
            'iva' => $data['iva'],
            'facturas_clinicas_id' => $data['facturas_clinicas_id'],
            'plan' => $data['plan'],
            'ticket' => $data['ticket'],
            'fecha_pedido' => $data['fecha_pedido'],
            'fecha_vence_pedido' => $data['fecha_vence_pedido'],
            'estado' => $data['estado'],
            ]);
        }elseif(isset($pedidos) === true && $pedidos->estado === 'No Pagado' ){
            return back()->with('mensajepago','mensaje_pago');
        }elseif(isset($pedidos) === true && $pedidos->estado === 'Pagado'){
            PedidoClinica::create([
            'transaccion_id' => $data['transaccion_id'],
            'total' => $data['total'],
            'sub_total' => $data['sub_total'],
            'iva' => $data['iva'],
            'facturas_clinicas_id' => $data['facturas_clinicas_id'],
            'plan' => $data['plan'],
            'ticket' => $data['ticket'],
            'fecha_pedido' => $data['fecha_pedido'],
            'fecha_vence_pedido' => $data['fecha_vence_pedido'],
            'estado' => $data['estado'],
            ]);
        }

        return redirect()->back()->with(['facturas_clinicas'=>$facturas_clinicas,'clinica'=>$clinica,'a'=>$a,'user'=>$user,'pedi'=>$pedi]);
    }  

    public function actualizarPedidosCisne(){
        $p = PedidoClinica::where('id','>','1')
        ->where('estado','=','No Pagado')
        ->where('plan','=','cisne')
        ->get();
        //$dolar = config('global.dolar');
        $total = 30;
        $iva_= 16;
        $iva = ($total * $iva_)/100;
        $subtotal = $total;
        $totalb = $total + (($total * $iva_)/100);
        foreach ($p as $a) {
            $a->total = $totalb;
            $a->sub_total = $subtotal;
            $a->iva = $iva;
            $a->save();
        }
        return redirect()->back()->with('status', 'Actualizado correctamente');
    }

    public function actualizarPedidosAioria(){
        $p = PedidoClinica::where('id','>','1')
        ->where('estado','=','No Pagado')
        ->where('plan','=','aioria')
        ->get();
        //$dolar = config('global.dolar');
        $total = 170;
        $iva_= 16;
        $iva = ($total * $iva_)/100;
        $subtotal = $total;
        $totalb = $total + (($total * $iva_)/100);
        foreach ($p as $a) {
            $a->total = $totalb;
            $a->sub_total = $subtotal;
            $a->iva = $iva;
            $a->save();
        }
        return redirect()->back()->with('status', 'Actualizado correctamente');
    }

    public function actualizarPedidosDragon(){
        $p = PedidoClinica::where('id','>','1')
        ->where('estado','=','No Pagado')
        ->where('plan','=','dragon')
        ->get();
        //$dolar = config('global.dolar');
        $total = 300;
        $iva_= 16;
        $iva = ($total * $iva_)/100;
        $subtotal = $total;
        $totalb = $total + (($total * $iva_)/100);
        foreach ($p as $a) {
            $a->total = $totalb;
            $a->sub_total = $subtotal;
            $a->iva = $iva;
            $a->save();
        }

        return redirect()->back()->with('status', 'Actualizado correctamente');
    }
}
