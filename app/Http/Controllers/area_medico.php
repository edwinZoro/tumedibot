<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Pedido;
use App\Models\Medico;
use App\Models\Factura;
use App\Models\FacturaClinica;
use Illuminate\Support\Str;
use App\Models\ReportePago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreFactura;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\ActualizarFactura;
use Illuminate\Support\Facades\Validator;

class area_medico extends Controller
{
    
    public function area_medico_get(Pedido $pedido){
        $pedido = $pedido;
        $user = Auth::id();
        $factura = Factura::where('user_id','=',Auth::id())->get();
        $b = Factura::where('user_id','=',$user)->first();
        $medico = Medico::where('user_id','=',Auth::id())->first();
        $a = User::where('pagos','positive')->where('id','=',$user)->get();
        $pedi = Pedido::OrderBy('id','desc')->where('factura_id','=',$b->id)->Paginate(5, ['*'], 'pagination_pedidos');
        $reporte = ReportePago::OrderBy('id','desc')->where('factura_id','=',$b->id)->Paginate(5, ['*'], 'pagination_reporte_pago');
        $reporte_b = ReportePago::OrderBy('id','desc')->where('factura_id','=',$b->id)->first();
        if($b->plan === 'andromeda'){
            return view('area_medico',['factura'=>$factura,'medico'=>$medico,'a'=>$a,'user'=>$user,'pedi'=>$pedi,'reporte'=>$reporte,'b'=>$b,'pedido'=>$pedido,'reporte_b'=>$reporte_b]);
        }elseif($b->plan === 'fenix'){
            return view('area_medicob',['factura'=>$factura,'medico'=>$medico,'a'=>$a,'user'=>$user,'pedi'=>$pedi,'reporte'=>$reporte,'b'=>$b,'pedido'=>$pedido,'reporte_b'=>$reporte_b]);
        }elseif($b->plan === 'pegasus'){
            return view('area_medicoc',['factura'=>$factura,'medico'=>$medico,'a'=>$a,'user'=>$user,'pedi'=>$pedi,'reporte'=>$reporte,'b'=>$b,'pedido'=>$pedido,'reporte_b'=>$reporte_b]);
        }
        return redirect()->back();
        
    }

    public function factura(StoreFactura $request){
        $data = $request->validated();
         Factura::create([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
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
            
            return redirect()->route('lista_medico')->with('status', 'Agregado correctamente - Se habilito en el menú un botón Área Médico');
    }

    public function editar_f_andromeda(User $user){
        $factura = Factura::where('user_id','=',$user->id)->get();
        $factura_clinica = FacturaClinica::where('user_id','=',$user->id)->get();
        $factura_b = Factura::where('user_id','=',$user->id)->first();
        foreach($factura as $f){
            $factu = $f->user_id;
           
        }
        if(isset($factu)===false){
            $factu = 1;
        }
        foreach($factura_clinica as $fa){
            $factu_cli = $fa->user_id;
           
        }
        if(isset($factu_cli)===false){
            $factu_cli = 1;
        }
        return view('planes.comprar_andromeda_plan_editar',['factura_b'=>$factura_b,'factu'=>$factu,'user'=> $user,'factu_cli'=>$factu_cli]);
    }

    public function actualizar_f_andromeda(ActualizarFactura $request){
            $user = Auth::id();
            $data = $request->validated();

            Factura::where('user_id','=',$user)->update([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'celular' => $data['telefono'],
            'ci_rif' => $data['cedula'],
            'pais' => 'Venezuela',
            'estado' => $data['estado'],
            'ciudad' => $data['ciudad'],
            'direccion' => $data['direccion'],
            'codigo_postal' => $data['codigo_postal'],
            //'user_id' => $data['user_id'],
            ]);
            return redirect()->route('area_medico_get',$user)->with('statusg', 'Se ha actualizado correctamente - Vaya al Área Médico');
    }

    public function pedido(){
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
        $plan = 'andromeda';
        $total = 10;
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

    public function actualizarPedidosAndromeda(){
        $p = Pedido::where('id','>','1')
        ->where('estado','=','No Pagado')
        ->where('plan','=','andromeda')
        ->get();
        //$dolar = config('global.dolar');
        $total = 10;
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

    public function actualizarPedidosFenix(){
        $p = Pedido::where('id','>','1')
        ->where('estado','=','No Pagado')
        ->where('plan','=','fenix')
        ->get();
        //$dolar = config('global.dolar');
        $total = 55;
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

    public function actualizarPedidosPegasus(){
        $p = Pedido::where('id','>','1')
        ->where('estado','=','No Pagado')
        ->where('plan','=','pegasus')
        ->get();
        //$dolar = config('global.dolar');
        $total = 100;
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
