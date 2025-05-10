<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Pedido;
use App\Models\PedidoClinica;
use App\Models\Factura;
use App\Models\FacturaClinica;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\ReportePago;
use App\Models\ReportePagoClinica;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReportes;
use App\Http\Requests\StoreReporteEmpresarial;
use Illuminate\Support\Facades\Auth;
class reporte_pago extends Controller
{
    public function reporte_pago(User $user){
        $factu = Factura::where('user_id','=',$user->id)->first();
        $a = Pedido::where('estado','=','No Pagado')
        ->where('factura_id','=',$factu->id)
        ->first();
        if( isset($a) === false ){
            return view('planes.reporte_pago',['user'=>$user,'factu'=>$factu]);
        }
        $pedido_id = $a->id;
        return view('planes.reporte_pago',['user'=>$user,'pedido_id'=>$pedido_id,'factu'=>$factu]);
    }
    /*Pedido::find(43)->factura;*/
    public function reporte_pago_post(StoreReportes $request){
        //$dolar = config('global.dolar');
        $user = Auth::id();
        $factura = Factura::where('user_id','=',$user)->get();
        $data = $request->validated();
        $date = Carbon::now();
        $fecha_transaccion = $date->format('Y-m-d');
        $fecha_vence_transaccion = $date->addDay(31);
        $fecha_vence_transaccion = $fecha_vence_transaccion->format('Y-m-d');
        $transaccion_id = strtoupper(Str::random(5));
        $estado = "procesando";
        $iva_= 16;
        foreach($factura as $f){
            $factura_id = $f->id;
            $factura_plan = $f->plan;
        }
        if ( $factura_plan == 'andromeda' ) {
            $plan_value = 10;
        } elseif($factura_plan == 'fenix') {
            $plan_value = 55;
        } elseif($factura_plan == 'pegasus') {
            $plan_value = 100;
        }
    
        $total = $plan_value;
        $iva = ($total * $iva_)/100;
        $subtotal = $total + (($total * $iva_)/100) ;
        $ingreso= $data['monto_pagado'];
        $egreso= $subtotal;
        $credito= $ingreso - $egreso;
        $dato = array(
            'fecha_transaccion' => $fecha_transaccion,
            'fecha_vence_transaccion' => $fecha_vence_transaccion,
            'transaccion_id' => $transaccion_id,
            'total' => $total + $iva,
            'iva' => $iva,
            'subtotal' => $subtotal,
            'ingreso' => $ingreso,
            'egreso' => $egreso,
            'credito' => $credito,
            'estado' => $estado,
            'factura_id'=>$factura_id,
            );
        ReportePago::create([
            'banco_emisor' => $data['banco_emisor'],
            'banco_receptor' => $data['banco_receptor'],
            'nmro_referencia' => $data['nmro_referencia'],
            'monto_pagado' => $data['monto_pagado'],
            'metodo_transaccion' => $data['metodo_transaccion'],
            'pedidos_id' => $data['pedido_id'],
            'fecha_transaccion' => $dato['fecha_transaccion'],
            'fecha_vence_transaccion' => $dato['fecha_vence_transaccion'],
            'transaccion_id' => $dato['transaccion_id'],
            'total' => $dato['total'],
            'iva' => $dato['iva'],
            'sub_total' => $dato['subtotal'],
            'ingreso' => $dato['ingreso'],
            'egreso' => $dato['egreso'],
            'credito' => $dato['credito'],
            'estado' => $dato['estado'],
            'factura_id' => $dato['factura_id'],
            ]);    
           return redirect()->route('area_medico_get',$user)->with('report','reportado'); 
    }


    public function reporte_pago_empresarial(User $user){
        $factu_cli = FacturaClinica::where('user_id','=',$user->id)->first();
        $a = PedidoClinica::where('estado','=','No Pagado')
        ->where('facturas_clinicas_id','=',$factu_cli->id)
        ->first();
        if( isset($a) === false ){
            return view('clinicas.reporte_pago_empresarial',['user'=>$user,'factu_cli'=>$factu_cli]);
        }
        $pedido_id = $a->id;
        $pedido_total = $a->total;
        return view('clinicas.reporte_pago_empresarial',['user'=>$user,'pedido_id'=>$pedido_id,'factu_cli'=>$factu_cli,'pedido_total'=>$pedido_total]);
    }

    public function reporte_pago_empresarial_post(StoreReporteEmpresarial $request){
        //$dolar = config('global.dolar');
        $user = Auth::id();
        $factura = FacturaClinica::where('user_id','=',$user)->get();
        $data = $request->validated();
        $date = Carbon::now();
        $fecha_transaccion = $date->format('Y-m-d');
        $fecha_vence_transaccion = $date->addDay(31);
        $fecha_vence_transaccion = $fecha_vence_transaccion->format('Y-m-d');
        $transaccion_id = strtoupper(Str::random(5));
        $estado = "procesando";
        $iva_= 16;
        foreach($factura as $f){
            $factura_id = $f->id;
            $factura_plan = $f->plan;
        }
        if ( $factura_plan == 'cisne' ) {
            $plan_value = 30;
        } elseif($factura_plan == 'aioria') {
            $plan_value = 170;
        } elseif($factura_plan == 'dragon') {
            $plan_value = 300;
        }
        $total = $plan_value;
        $iva = ($total * $iva_)/100;
        $subtotal = $total + (($total * $iva_)/100) ;
        $ingreso= $data['monto_pagado'];
        $egreso= $subtotal;
        $credito= $ingreso - $egreso;
        $dato = array(
            'fecha_transaccion' => $fecha_transaccion,
            'fecha_vence_transaccion' => $fecha_vence_transaccion,
            'transaccion_id' => $transaccion_id,
            'total' => $total + $iva,
            'iva' => $iva,
            'subtotal' => $subtotal,
            'ingreso' => $ingreso,
            'egreso' => $egreso,
            'credito' => $credito,
            'estado' => $estado,
            'factura_id'=>$factura_id,
            );
        ReportePagoClinica::create([
            'banco_emisor' => $data['banco_emisor'],
            'banco_receptor' => $data['banco_receptor'],
            'nmro_referencia' => $data['nmro_referencia'],
            'monto_pagado' => $data['monto_pagado'],
            'metodo_transaccion' => $data['metodo_transaccion'],
            'pedidos_clinicas_id' => $data['pedido_id'],
            'fecha_transaccion' => $dato['fecha_transaccion'],
            'fecha_vence_transaccion' => $dato['fecha_vence_transaccion'],
            'transaccion_id' => $dato['transaccion_id'],
            'total' => $dato['total'],
            'iva' => $dato['iva'],
            'sub_total' => $dato['subtotal'],
            'ingreso' => $dato['ingreso'],
            'egreso' => $dato['egreso'],
            'credito' => $dato['credito'],
            'estado' => $dato['estado'],
            'facturas_clinicas_id' => $dato['factura_id'],
            ]);    
          return redirect()->route('area_empresarial_get',$user)->with('report','estatusque'); 
    }
}
