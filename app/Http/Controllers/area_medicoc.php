<?php
namespace App\Http\Controllers;
use App\Http\Requests\StoreFactura;
use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\Pedido;
use App\Models\Medico;
use App\Models\ReportePago;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

class area_medicoc extends Controller
{
        public function pedidoc(){
        //$dolar = config('global.dolar');
        $user = Auth::id();
        $factura = Factura::where('user_id','=',Auth::id())->get();
        $medico = Medico::where('user_id','=',Auth::id())->first();
        $a = User::where('pagos','positive')->where('id','=',Auth::id())->get();
        $pedi = Pedido::Paginate(2);
        $date = Carbon::now();
        $fecha_pedido = $date->format('Y-m-d');
        $fecha_vence_pedido = $date->addDay(7);
        $fecha_vence_pedido = $fecha_vence_pedido->format('Y-m-d');
        $transaccion_id = strtoupper(Str::random(5));
        $plan = 'pegasus';
        $total = 100;
        $iva_= 16;
        $iva = ($total * $iva_)/100;
        $subtotal = $total;
        $totalb = $total + (($total * $iva_)/100);
        $estado='No Pagado';
        $ticket = mt_rand(220000,500000);
        foreach($factura as $fa){
            $factura_id=$fa->id;
        }

        $data = array(
            'transaccion_id' => $transaccion_id,
            'total' => $totalb,
            'sub_total' => $subtotal,
            'iva' => $iva,
            'factura_id' => $factura_id,
            'plan' => $plan,
            'ticket' => $ticket,
            'fecha_pedido' => $fecha_pedido,
            'fecha_vence_pedido' => $fecha_vence_pedido,
            'estado' => $estado,
            );
            
        $validator = Validator::make($data, [
            'data.*.transaccion_id' => 'required|unique:pedidos,transaccion_id|max:5',
            'data.*.total' => 'required',
            'data.*.sub_total' => 'required',
            'data.*.iva' => 'required',
            'data.*.factura_id' => 'required',
            'data.*.plan' => 'required',
            'data.*.ticket' => 'required',
            'data.*.fecha_pedido' => 'required',
            'data.*.fecha_vence_pedido' => 'required',
            'data.*.estado' => 'required',
            ]);   
        $pedidos = Pedido::where('factura_id','=',$fa->id)->orderBy('id','desc')->first();

        if(isset($pedidos)=== false){
            Pedido::create([
            'transaccion_id' => $data['transaccion_id'],
            'total' => $data['total'],
            'sub_total' => $data['sub_total'],
            'iva' => $data['iva'],
            'factura_id' => $data['factura_id'],
            'plan' => $data['plan'],
            'ticket' => $data['ticket'],
            'fecha_pedido' => $data['fecha_pedido'],
            'fecha_vence_pedido' => $data['fecha_vence_pedido'],
            'estado' => $data['estado'],
            ]);
        }elseif(isset($pedidos) === true && $pedidos->estado === 'No Pagado' ){
            return back()->with('mensajepago','mensaje_pago');
        }elseif(isset($pedidos) === true && $pedidos->estado === 'Pagado'){
            Pedido::create([
            'transaccion_id' => $data['transaccion_id'],
            'total' => $data['total'],
            'sub_total' => $data['sub_total'],
            'iva' => $data['iva'],
            'factura_id' => $data['factura_id'],
            'plan' => $data['plan'],
            'ticket' => $data['ticket'],
            'fecha_pedido' => $data['fecha_pedido'],
            'fecha_vence_pedido' => $data['fecha_vence_pedido'],
            'estado' => $data['estado'],
            ]);
        }
       
        return redirect()->route('area_medico_get',$user)->with(['factura'=>$factura,'medico'=>$medico,'a'=>$a,'user'=>$user,'pedi'=>$pedi]);
    }
}
