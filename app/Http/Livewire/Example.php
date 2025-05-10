<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Models\ReportePagoClinica;
use App\Models\FacturaClinica;
use App\Models\PedidoClinica;
use App\Models\Administrator;
use Livewire\WithPagination;
use App\Models\ReportePago;
use App\Models\Factura;
use App\Models\Clinica;
use Livewire\Component;
use App\Models\Medico;
use App\Models\Pedido;
use App\Models\User;

class Example extends Component
{
	use WithPagination;
	public $search, $search_, $_search, $userId, $email, $id_medico, $fecha_pago, $expira_pago, $id_factura, $cedula, $userID, $transaccion_id, $nmro_referencia, $factura_id, $pedidos_id, $transaccion_Id, $factura_Id, $ticket, $id_pedidos, $Id_pedido;
	public  $medico_id, $nombre, $revendedor, $pagos;
	public  $usuario_id, $nombre_usuario, $pagos_usuario, $pagos_empresas;
	public  $facturas_id, $nombre_factura, $plan_factura;
	public  $id_, $plan, $estado;
	public  $reporte_id, $monto_pagado, $total, $ingreso, $egreso, $credito, $fecha_transaccion, $fecha_vence_transaccion, $Estado;
	public $correo_empresarial, $revendedor_clinica, $user_Id, $created_enterprise;
	public $factura_empresarial, $cedula_representante, $_userID;
	public $transaccion_empresa_id, $nmro_referencia_empresa, $factura_empresa_id, $pedidos_empresa_id;
	public $transaccion_empresarial_Id, $factura_empresarial_Id, $ticket_pedido_empresarial, $pedido_Id_empresarial;
	public $clinica_id, $nombre_empresa, $revendedor_empresa, $pagos_empresa;
	public $facturas_empresas_id, $nombre_factura_empresas, $plan_factura_empresas;
	public $id_empresas, $plan_empresas, $estado_empresas;
	public $reporte_empresas_id, $monto_empresas_pagado, $total_empresas, $ingreso_empresas, $egreso_empresas, $credito_empresas, $fecha_empresas_transaccion, $fecha_vence_empresas_transaccion, $Estado_empresas;
	public function updated($fields){
		$this->validateOnly($fields,[
			'medico_id' => 'required',
			'nombre' => 'required',
			'revendedor' => 'required',
			'pagos' => 'required',
			'usuario_id' => 'required',
			'nombre_usuario' => 'required',
			'pagos_usuario' => 'required',	
			'pagos_empresas' => 'required',	
			'facturas_id' => 'required',
			'nombre_factura' => 'required',
			'plan_factura' => 'required',	
			'id_' => 'required',
			'plan' => 'required',
			'estado' => 'required',
			'reporte_id' => 'required',
			'monto_pagado' => 'required',
			'total' => 'required',	
			'ingreso' => 'required',
			'egreso' => 'required',
			'credito' => 'required',	
			'fecha_transaccion' => 'required',
			'fecha_vence_transaccion' => 'required',
			'Estado' => 'required',
			'clinica_id' => 'required',
			'nombre_empresa' => 'required',
			'revendedor_empresa' => 'required',
			'pagos_empresa' => 'required',
			'facturas_empresas_id' => 'required',
			'nombre_factura_empresas' => 'required',
			'plan_factura_empresas' => 'required',
			'reporte_empresas_id' => 'required',
			'monto_empresas_pagado' => 'required',
			'total_empresas' => 'required',	
			'ingreso_empresas' => 'required',
			'egreso_empresas' => 'required',
			'credito_empresas' => 'required',	
			'fecha_empresas_transaccion' => 'required',
			'fecha_vence_empresas_transaccion' => 'required',
			'Estado_empresas' => 'required',
			'id_empresas' => 'required',
			'plan_empresas' => 'required',
			'estado_empresas' => 'required',

		]);
	}


	public function editarMedicosData(){
		$this->validate([
			'medico_id' => 'required',
			'nombre' => 'required',
			'revendedor' => 'required',
			'pagos' => 'required',
		]);

		$medico = Medico::where('id',$this->medico_id)->first();

		$medico->id = $this->medico_id;
		$medico->nombre = $this->nombre;
		$medico->revendedor = $this->revendedor;
		$medico->pagos = $this->pagos;

		$medico->save();

		$this->dispatchBrowserEvent('cerrar_medico');
	}

	public function editarMedicos($id){
		$medico = Medico::where('id',$id)->first();

		$this->medico_id = $medico->id;
		$this->nombre = $medico->nombre;
		$this->revendedor = $medico->revendedor;
		$this->pagos = $medico->pagos;

		$this->dispatchBrowserEvent('mostrar_medico');

	}

	public function editarUsuariosData(){
		$this->validate([
			'usuario_id' => 'required',
			'nombre_usuario' => 'required',
			'pagos_usuario' => 'required',	
			'pagos_empresas' => 'required',	
		]);

		$usuario = User::where('id',$this->usuario_id)->first();

		$usuario->id = $this->usuario_id;
		$usuario->name = $this->nombre_usuario;
		$usuario->pagos = $this->pagos_usuario;
		$usuario->pagos_clinicas = $this->pagos_empresas;

		$usuario->save();

		$this->dispatchBrowserEvent('cerrar_usuario');
	}

	public function editarUsuarios($id){
		$usuario = User::where('id',$id)->first();

		$this->usuario_id = $usuario->id;
		$this->nombre_usuario = $usuario->name;
		$this->pagos_usuario = $usuario->pagos;
		$this->pagos_empresas = $usuario->pagos_clinicas;

		$this->dispatchBrowserEvent('mostrar_usuario');

	}	

	public function editarFacturasData(){
		$this->validate([
			'facturas_id' => 'required',
			'nombre_factura' => 'required',
			'plan_factura' => 'required',	
		]);

		$factura = Factura::where('id',$this->facturas_id)->first();

		$factura->id = $this->facturas_id;
		$factura->nombre = $this->nombre_factura;
		$factura->plan = $this->plan_factura;

		$factura->save();

		$this->dispatchBrowserEvent('cerrar_factura');
	}

	public function editarFacturas($id){
		$factura = Factura::where('id',$id)->first();

		$this->facturas_id = $factura->id;
		$this->nombre_factura = $factura->nombre;
		$this->plan_factura = $factura->plan;

		$this->dispatchBrowserEvent('mostrar_factura');

	}	

	public function editarReportesData(){
		$this->validate([
			'reporte_id' => 'required',
			'monto_pagado' => 'required',
			'total' => 'required',	
			'ingreso' => 'required',
			'egreso' => 'required',
			'credito' => 'required',	
			'fecha_transaccion' => 'required',
			'fecha_vence_transaccion' => 'required',
			'Estado' => 'required',	
		]);

		$reporte = ReportePago::where('id',$this->reporte_id)->first();

		$reporte->id = $this->reporte_id;
		$reporte->monto_pagado = $this->monto_pagado;
		$reporte->total = $this->total;
		$reporte->ingreso = $this->ingreso;
		$reporte->egreso = $this->egreso;
		$reporte->credito = $this->credito;
		$reporte->fecha_transaccion = $this->fecha_transaccion;
		$reporte->fecha_vence_transaccion = $this->fecha_vence_transaccion;
		$reporte->estado = $this->Estado;

		$reporte->save();

		$this->dispatchBrowserEvent('cerrar_reporte');
	}

	public function editarReportes($id){
		$reporte = ReportePago::where('id',$id)->first();

		$this->reporte_id = $reporte->id;
		$this->monto_pagado = $reporte->monto_pagado;
		$this->total = $reporte->total;
		$this->ingreso = $reporte->ingreso;
		$this->egreso = $reporte->egreso;
		$this->credito = $reporte->credito;
		$this->fecha_transaccion = $reporte->fecha_transaccion;
		$this->fecha_vence_transaccion = $reporte->fecha_vence_transaccion;
		$this->Estado = $reporte->estado;

		$this->dispatchBrowserEvent('mostrar_reporte');

	}

	public function editarPedidosData(){
		$this->validate([
			'id_' => 'required',
			'plan' => 'required',
			'estado' => 'required',
		]);

		$pedido = Pedido::where('id',$this->id_)->first();

		$pedido->id = $this->id_;
		$pedido->plan = $this->plan;
		$pedido->estado = $this->estado;

		$pedido->save();

		$this->dispatchBrowserEvent('cerrar_pedido');
	}

	public function editarPedidos($id){
		$pedido = Pedido::where('id',$id)->first();

		$this->id_ = $pedido->id;
		$this->plan = $pedido->plan;
		$this->estado = $pedido->estado;

		$this->dispatchBrowserEvent('mostrar_pedido');

	}	

	//Enterprise
	public function editarEmpresasData(){
		$this->validate([
			'clinica_id' => 'required',
			'nombre_empresa' => 'required',
			'revendedor_empresa' => 'required',
			'pagos_empresa' => 'required',
		]);

		$empresa = Clinica::where('id',$this->clinica_id)->first();

		$empresa->id = $this->clinica_id;
		$empresa->nombre = $this->nombre_empresa;
		$empresa->revendedor = $this->revendedor_empresa;
		$empresa->pagos = $this->pagos_empresa;

		$empresa->save();

		$this->dispatchBrowserEvent('cerrar_empresa');
	}

	public function editarEmpresas($id){
		$empresa = Clinica::where('id',$id)->first();

		$this->clinica_id = $empresa->id;
		$this->nombre_empresa = $empresa->nombre;
		$this->revendedor_empresa  = $empresa->revendedor;
		$this->pagos_empresa = $empresa->pagos;

		$this->dispatchBrowserEvent('mostrar_empresa');

	}

	public function editarFacturasEmpresasData(){
		$this->validate([
			'facturas_empresas_id' => 'required',
			'nombre_factura_empresas' => 'required',
			'plan_factura_empresas' => 'required',	
		]);

		$factura_empresas = FacturaClinica::where('id',$this->facturas_empresas_id)->first();

		$factura_empresas->id = $this->facturas_empresas_id;
		$factura_empresas->nombre_negocio = $this->nombre_factura_empresas;
		$factura_empresas->plan = $this->plan_factura_empresas;

		$factura_empresas->save();

		$this->dispatchBrowserEvent('cerrar_factura_empresarial');
	}

	public function editarFacturasEmpresas($id){
		$factura_empresas = FacturaClinica::where('id',$id)->first();

		$this->facturas_empresas_id = $factura_empresas->id;
		$this->nombre_factura_empresas = $factura_empresas->nombre_negocio;
		$this->plan_factura_empresas = $factura_empresas->plan;

		$this->dispatchBrowserEvent('mostrar_factura_empresarial');

	}

	public function editarReportesEmpresasData(){
		$this->validate([
			'reporte_empresas_id' => 'required',
			'monto_empresas_pagado' => 'required',
			'total_empresas' => 'required',	
			'ingreso_empresas' => 'required',
			'egreso_empresas' => 'required',
			'credito_empresas' => 'required',	
			'fecha_empresas_transaccion' => 'required',
			'fecha_vence_empresas_transaccion' => 'required',
			'Estado_empresas' => 'required',	
		]);

		$reporte_empresas = ReportePagoClinica::where('id',$this->reporte_empresas_id)->first();

		$reporte_empresas->id = $this->reporte_empresas_id;
		$reporte_empresas->monto_pagado = $this->monto_empresas_pagado;
		$reporte_empresas->total = $this->total_empresas;
		$reporte_empresas->ingreso = $this->ingreso_empresas;
		$reporte_empresas->egreso = $this->egreso_empresas;
		$reporte_empresas->credito = $this->credito_empresas;
		$reporte_empresas->fecha_transaccion = $this->fecha_empresas_transaccion;
		$reporte_empresas->fecha_vence_transaccion = $this->fecha_vence_empresas_transaccion;
		$reporte_empresas->estado = $this->Estado_empresas;

		$reporte_empresas->save();

		$this->dispatchBrowserEvent('cerrar_reporte_empresarial');
	}

	public function editarReportesEmpresas($id){
		$reporte_empresas = ReportePagoClinica::where('id',$id)->first();

		$this->reporte_empresas_id = $reporte_empresas->id;
		$this->monto_empresas_pagado = $reporte_empresas->monto_pagado;
		$this->total_empresas = $reporte_empresas->total;
		$this->ingreso_empresas = $reporte_empresas->ingreso;
		$this->egreso_empresas = $reporte_empresas->egreso;
		$this->credito_empresas = $reporte_empresas->credito;
		$this->fecha_empresas_transaccion = $reporte_empresas->fecha_transaccion;
		$this->fecha_vence_empresas_transaccion = $reporte_empresas->fecha_vence_transaccion;
		$this->Estado_empresas = $reporte_empresas->estado;

		$this->dispatchBrowserEvent('mostrar_reporte_empresarial');

	}

	public function editarPedidosEmpresasData(){
		$this->validate([
			'id_empresas' => 'required',
			'plan_empresas' => 'required',
			'estado_empresas' => 'required',
		]);

		$pedido_empresas = PedidoClinica::where('id',$this->id_empresas)->first();

		$pedido_empresas->id = $this->id_empresas;
		$pedido_empresas->plan = $this->plan_empresas;
		$pedido_empresas->estado = $this->estado_empresas;

		$pedido_empresas->save();

		$this->dispatchBrowserEvent('cerrar_pedido_empresarial');
	}

	public function editarPedidosEmpresas($id){
		$pedido_empresas = PedidoClinica::where('id',$id)->first();

		$this->id_empresas = $pedido_empresas->id;
		$this->plan_empresas = $pedido_empresas->plan;
		$this->estado_empresas = $pedido_empresas->estado;

		$this->dispatchBrowserEvent('mostrar_pedido_empresarial');

	}	

	protected $paginationTheme = 'bootstrap';
    public function render()
    {
/*    	$user_ = Auth::id();
    	$admin = Administrator::where('user_id',Auth::id())->first();*/
				
    	$medico = Medico::where('correo','LIKE', '%' .$this->search. '%')
    	->Where('created_at','LIKE', '%' .$this->search_. '%')
    	->Where('revendedor','LIKE', '%' .$this->_search. '%')
    	->Where('user_id','LIKE', '%' .$this->userId. '%')
    	->paginate(15,['*'],'medico_paginated');
        	
        $user = User::where('id','>', 1)
    	->Where('email','LIKE', '%' .$this->email. '%')
    	->Where('id','LIKE', '%' .$this->id_medico. '%')
    	->paginate(15,['*'],'user_paginated');

    	$factura = Factura::where('id','>=', 50)
    	->Where('id','LIKE', '%' .$this->id_factura. '%')
    	->Where('ci_rif','LIKE', '%' .$this->cedula. '%')
    	->Where('user_id','LIKE', '%' .$this->userID. '%')
    	->paginate(15,['*'],'factura_paginated');

    	$reporte = ReportePago::where('id','>', 0)
    	->Where('transaccion_id','LIKE','%'.$this->transaccion_id.'%')
    	->Where('nmro_referencia','LIKE','%'.$this->nmro_referencia.'%')
    	->Where('factura_id','LIKE','%'.$this->factura_id.'%')
    	->Where('pedidos_id','LIKE','%'.$this->pedidos_id.'%')
    	->paginate(15,['*'],'medico_paginated');
        
        $pedido = Pedido::where('id','>', 0)
        ->Where('id','LIKE', '%' .$this->Id_pedido. '%')
        ->Where('transaccion_id','LIKE', '%' .$this->transaccion_Id. '%')
        ->Where('factura_id','LIKE', '%' .$this->factura_Id. '%')
        ->Where('ticket','LIKE', '%' .$this->ticket. '%')
        ->orderBy('id','desc')
    	->paginate(15,['*'],'pedido_paginated');

    	$clinica = Clinica::where('correo','LIKE', '%' .$this->correo_empresarial. '%')
    	->Where('created_at','LIKE', '%' .$this->created_enterprise. '%')
    	->Where('revendedor','LIKE', '%' .$this->revendedor_clinica. '%')
    	->Where('user_id','LIKE', '%' .$this->user_Id. '%')
    	->paginate(15,['*'],'empresas_paginated');

    	$factura_clinica = FacturaClinica::where('id','>=', 0)
    	->Where('id','LIKE', '%' .$this->factura_empresarial. '%')
    	->Where('ci_rif','LIKE', '%' .$this->cedula_representante. '%')
    	->Where('user_id','LIKE', '%' .$this->_userID. '%')
    	->paginate(15,['*'],'factura_empresas_paginated');

    	$reporte_empresarial = ReportePagoClinica::where('id','>', 0)
    	->Where('transaccion_id','LIKE','%'.$this->transaccion_empresa_id.'%')
    	->Where('nmro_referencia','LIKE','%'.$this->nmro_referencia_empresa.'%')
    	->Where('facturas_clinicas_id','LIKE','%'.$this->factura_empresa_id.'%')
    	->Where('pedidos_clinicas_id','LIKE','%'.$this->pedidos_empresa_id.'%')
    	->paginate(15,['*'],'reporte_empresarial_paginated');

    	$pedido_empresarial = PedidoClinica::where('id','>', 0)
        ->Where('id','LIKE', '%' .$this->pedido_Id_empresarial. '%')
        ->Where('transaccion_id','LIKE', '%' .$this->transaccion_empresarial_Id. '%')
        ->Where('facturas_clinicas_id','LIKE', '%' .$this->factura_empresarial_Id. '%')
        ->Where('ticket','LIKE', '%' .$this->ticket_pedido_empresarial. '%')
        ->orderBy('id','desc')
    	->paginate(15,['*'],'pedido_empresarial_paginated');

        return view('livewire.example',['medico'=>$medico,'user'=>$user,'factura'=>$factura,'reporte'=>$reporte,'pedido' => $pedido, 'clinica' => $clinica, 'factura_clinica' => $factura_clinica,'reporte_empresarial'=>$reporte_empresarial, 'pedido_empresarial' => $pedido_empresarial]);
    }
}
