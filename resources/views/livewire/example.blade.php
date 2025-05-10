<div>
    <div class="col-md-12">
	    <div class="card my-5">
	      	<div class="card-body">
	      	  <h5 class="text-center text-primary">M&eacutedicos</h5>	
 	      	  <div class="row">
	      	  	<div class="col-md-3 my-1"><input wire:model="search" type="text" name="search" class="form-control" placeholder="Ingrese Correo"></div>
	      	    <div class="col-md-3 my-1"><input wire:model="_search" type="text" name="_search" class="form-control" placeholder="Ingrese Cedula Revendedor"></div>
	      	    <div class="col-md-3 my-1"><input wire:model="userId" type="text" name="userId" class="form-control" placeholder="Ingrese User ID"></div>
	      	  	<div class="col-md-3 my-1"><input wire:model="search_" type="text" name="search_" class="form-control" placeholder="Ingrese Fecha Creado En"></div>
              </div>

		      	  <div class="table-responsive">
			      	  <table class="table  table-dark mt-2">
			        
			        <tr>
			          <th>Id</th>	
			          <th>Nombre</th>
			          <th>Apellido</th>
			          <th>Correo</th>
			          <th>Revendedor</th>
			          <th>Pagos</th>
			          <th>User_id</th>
			          <th>Titulos</th>
			          <th>Creado en</th>
			          <th>Editado en</th>
			          <th>Editar</th>
			        </tr>
			        @foreach($medico as $m)
			        <tr>
			          <td>{{$m->id}}</td>
			          <td>{{$m->nombre}}</td>
			          <td>{{$m->apellido}}</td>
			          <td>{{$m->correo}}</td>
			          <td>{{$m->revendedor}}</td>
			          <td>{{$m->pagos}}</td>
			          <td>{{$m->user_id}}</td>
			          <td><a href={{route('file_download',$m->name_temp)}} >{{$m->name_original}}</a></td>
			          <td>{{$m->created_at}}</td>
			          <td>{{$m->updated_at}}</td>
			          <td><button type="button" class="btn btn-sm btn-success" wire:click="editarMedicos({{$m->id}})">Editar</button></td>
			        </tr>
			        @endforeach
			      </table>  
		  		</div>
		      <div class="card-footer">
		      		{{$medico->links()}}
		      </div> 
	    </div>
	 </div>
   </div>
   <div class="col-md-12">
	    <div class="card my-5">
	      	<div class="card-body">
	      	  <h5 class="text-center text-primary">Usuarios</h5>	
 	      	  <div class="row">
 	      	  	<div class="col-md-6 my-1"><input wire:model="id_medico" type="text" name="id_medico" class="form-control" placeholder="Ingrese ID Usuario"></div>
	      	  	<div class="col-md-6 my-1"><input wire:model="email" type="text" name="email" class="form-control" placeholder="Ingrese Correo"></div> </div>

		      	  <div class="table-responsive">
			      	  <table class="table table-striped table-dark mt-2">
			        
			        <tr>
			          <th>Id</th>	
			          <th>Nombre</th>
			          <th>Correo</th>
			          <th>Pagos</th>
			          <th>Pagos Empresas</th>
			          <th>Creado En</th>
			          <th>Email Verificado En</th>
			          <th>Editar</th>
			        </tr>
			        @foreach($user as $u)
			        <tr>
			          <td>{{$u->id}}</td>
			          <td>{{$u->name}}</td>
			          <td>{{$u->email}}</td>
			          <td>{{$u->pagos}}</td>
			          <td>{{$u->pagos_clinicas}}</td>
			          <td>{{$u->created_at}}</td>
			          <td>{{$u->email_verified_at}}</td>
			          <td><button type="button" class="btn btn-sm btn-success" wire:click="editarUsuarios({{$u->id}})">Editar</button></td>
			        </tr>
			        @endforeach
			      </table>  
		  		</div>
		      <div class="card-footer">
		      		{{$user->links()}}
		      </div> 
	    </div>
	 </div>
   </div>
   <div class="col-md-12">
	 <div class="card my-5">
	   <div class="card-body">
	      	  <h5 class="text-center text-primary">Facturas</h5>	
 	      	  <div class="row">
	      	  	<div class="col-md-4 my-1"><input wire:model="id_factura" type="text" name="id_factura" class="form-control" placeholder="Ingrese ID Factura"></div>
	      	  	<div class="col-md-4 my-1"><input wire:model="cedula" type="text" name="cedula" class="form-control" placeholder="Ingrese Cedula"></div>
	      	  	<div class="col-md-4 my-1"><input wire:model="userID" type="text" name="userID" class="form-control" placeholder="Ingrese User ID"></div> </div>

		      	  <div class="table-responsive">
			      	  <table class="table  table-dark mt-2">
			        
			        <tr>
			          <th>Id</th>	
			          <th>Nombre</th>
			          <th>Celular</th>
			          <th>Ci_Rif</th>
			          <th>Plan</th>
			          <th>User_Id</th>
			          <th>Editar</th>
			        </tr>
			        @foreach($factura as $f)
			        <tr>
			          <td>{{$f->id}}</td>
			          <td>{{$f->nombre}}</td>
			          <td>{{$f->celular}}</td>
			          <td>{{$f->ci_rif}}</td>
			          <td>{{$f->plan}}</td>
			          <td>{{$f->user_id}}</td>
			          <td><button type="button" class="btn btn-sm btn-success" wire:click="editarFacturas({{$f->id}})">Editar</button></td>
			        </tr>
			        @endforeach
			      </table>  
		  		</div>
		      <div class="card-footer">
		      		{{$factura->links()}}
		      </div> 
	    </div>
	 </div>
   </div>
   <div class="col-md-12">
	    <div class="card my-5">
	      	<div class="card-body">
	      	  <h5 class="text-center text-primary">Reporte Pagos</h5>	
 	      	  <div class="row">
	      	  	<div class="col-md-3 my-1"><input wire:model="transaccion_id" type="text" name="transaccion_id" class="form-control" placeholder="Ingrese Transaccion ID"></div>
	      	  	<div class="col-md-3 my-1"><input wire:model="nmro_referencia" type="text" name="nmro_referencia" class="form-control" placeholder="Ingrese Nº de Referencia"></div>
	      	  	<div class="col-md-3 my-1"><input wire:model="factura_id" type="text" name="factura_id" class="form-control" placeholder="Ingrese FacturaID"></div> 
	      	  	<div class="col-md-3 my-1"><input wire:model="pedidos_id" type="text" name="pedidos_id" class="form-control" placeholder="Ingrese PedidosID"></div> 
	      	  </div>

		      	  <div class="table-responsive">
			      	  <table class="table table-striped table-dark mt-2">
			        
			        <tr>
			          <th>Id</th>	
			          <th>Transaccion_Id</th>
			          <th>Nº de Referencia</th>
			          <th>Monto pagado</th>
			          <th>Metodo Transaccion</th>
			          <th>Total</th>
			          <th>Ingreso</th>
			          <th>Egreso</th>
			          <th>Credito</th>
			          <th>Fecha Transaccion</th>
			          <th>Fecha Vence Transaccion</th>
			          <th>Estado</th>
			          <th>FacturaID</th>
			          <th>PedidosID</th>
			          <th>Editar</th>
			        </tr>
			        @foreach($reporte as $r)
			        <tr>
			          <td>{{$r->id}}</td>
			          <td>{{$r->transaccion_id}}</td>
			          <td>{{$r->nmro_referencia}}</td>
			          <td>{{$r->monto_pagado}}</td>
			          <td>{{$r->metodo_transaccion}}</td>
			          <td>{{$r->total}}</td>
			          <td>{{$r->ingreso}}</td>
			          <td>{{$r->egreso}}</td>
			          <td>{{$r->credito}}</td>
			          <td>{{$r->fecha_transaccion}}</td>
			          <td>{{$r->fecha_vence_transaccion}}</td>
			          <td>{{$r->estado}}</td>
			          <td>{{$r->factura_id}}</td>
			          <td>{{$r->pedidos_id}}</td>
			          <td><button type="button" class="btn btn-sm btn-success" wire:click="editarReportes({{$r->id}})">Editar</button></td>
			        </tr>
			        @endforeach
			      </table>  
		  		</div>
		      <div class="card-footer">
		      		{{$reporte->links()}}
		      </div> 
	    </div>
	 </div>
   </div>
   <div class="col-md-12">
	    <div class="card my-5">
	      	<div class="card-body">
	      	  <h5 class="text-center text-primary">Pedidos</h5>	
 	      	  <div class="row">
	      	  	<div class="col-md-3 my-1"><input wire:model="Id_pedido" type="text" name="Id_pedido" class="form-control" placeholder="Ingrese ID Pedido"></div>
	      	  	<div class="col-md-3 my-1"><input wire:model="transaccion_Id" type="text" name="transaccion_Id" class="form-control" placeholder="Ingrese Transaccion ID"></div>
	      	  	<div class="col-md-3 my-1"><input wire:model="factura_Id" type="text" name="factura_Id" class="form-control" placeholder="Ingrese Factura ID"></div>
	      	  	<div class="col-md-3 my-1"><input wire:model="ticket" type="text" name="ticket" class="form-control" placeholder="Ingrese Ticket"></div> </div>
		      	  <div class="table-responsive">
			      	  <table class="table  table-dark mt-2">
			        
			        <tr>
			          <th>Id</th>	
			          <th>TransaccionID</th>
			          <th>Total</th>
			          <th>SubTotal</th>
			          <th>Iva</th>
			          <th>FacturaId</th>
			          <th>Plan</th>
			          <th>Ticket</th>
			          <th>Fecha Pedido</th>
			          <th>Fecha Vence Pedido</th>
			          <th>Estado</th>
			          <th>Editar</th>
			        </tr>
			        @foreach($pedido as $pedi)
			        <tr>
			          <td>{{$pedi->id}}</td>
			          <td>{{$pedi->transaccion_id}}</td>
			          <td>{{$pedi->total}}</td>
			          <td>{{$pedi->sub_total}}</td>
			          <td>{{$pedi->iva}}</td>
			          <td>{{$pedi->factura_id}}</td>
			          <td>{{$pedi->plan}}</td>
			          <td>{{$pedi->ticket}}</td>
			          <td>{{$pedi->fecha_pedido}}</td>
			          <td>{{$pedi->fecha_vence_pedido}}</td>
			          <td>{{$pedi->estado}}</td>
			          <td><button type="button" class="btn btn-sm btn-success" wire:click="editarPedidos({{$pedi->id}})">Editar</button></td>
			        </tr>
			        @endforeach
			      </table>  
		  		</div>

		      <div class="card-footer">
		      		{{$pedido->links()}}
		      </div> 
	    </div>
	 </div>
   </div> 
   <div class="col-md-12">
	    <div class="card my-5">
	      	<div class="card-body">
	      	  <h5 class="text-center text-primary">Empresas de Salud</h5>	
 	      	  <div class="row">
	      	  	<div class="col-md-3 my-1"><input wire:model="correo_empresarial" type="text" name="correo_empresarial" class="form-control" placeholder="Ingrese Correo"></div>
	      	    <div class="col-md-3 my-1"><input wire:model="revendedor_clinica" type="text" name="revendedor_clinica" class="form-control" placeholder="Ingrese Cedula Revendedor"></div>
	      	    <div class="col-md-3 my-1"><input wire:model="user_Id" type="text" name="user_Id" class="form-control" placeholder="Ingrese User ID"></div>
	      	  	<div class="col-md-3 my-1"><input wire:model="created_enterprise" type="text" name="created_enterprise" class="form-control" placeholder="Ingrese Fecha Creado En"></div>
              </div>

		      	  <div class="table-responsive">
			      	  <table class="table  table-dark mt-2">
			        
			        <tr>
			          <th>Id</th>	
			          <th>Nombre</th>
			          <th>Apellido</th>
			          <th>Correo</th>
			          <th>Revendedor</th>
			          <th>Pagos</th>
			          <th>User_id</th>
			          <th>Creado en</th>
			          <th>Editado en</th>
			          <th>Editar</th>
			        </tr>
			        @foreach($clinica as $c)
			        <tr>
			          <td>{{$c->id}}</td>
			          <td>{{$c->tipo_negocio}}</td>
			          <td>{{$c->nombre}}</td>
			          <td>{{$c->correo}}</td>
			          <td>{{$c->revendedor}}</td>
			          <td>{{$c->pagos}}</td>
			          <td>{{$c->user_id}}</td>
			          <td>{{$c->created_at}}</td>
			          <td>{{$c->updated_at}}</td>
			          <td><button type="button" class="btn btn-sm btn-success" wire:click="editarEmpresas({{$c->id}})">Editar</button></td>
			        </tr>
			        @endforeach
			      </table>  
		  		</div>
		      <div class="card-footer">
		      		{{$clinica->links()}}
		      </div> 
	    </div>
	 </div>
   </div>
   <div class="col-md-12">
	    <div class="card my-5">
	      	<div class="card-body">
	      	  <h5 class="text-center text-primary">Facturas Empresariales</h5>	
 	      	  <div class="row">
	      	  	<div class="col-md-4 my-1"><input wire:model="factura_empresarial" type="text" name="factura_empresarial" class="form-control" placeholder="Ingrese ID Factura"></div>
	      	  	<div class="col-md-4 my-1"><input wire:model="cedula_representante" type="text" name="cedula_representante" class="form-control" placeholder="Ingrese Cedula Representante"></div>
	      	  	<div class="col-md-4 my-1"><input wire:model="_userID" type="text" name="_userID" class="form-control" placeholder="Ingrese User ID"></div> </div>

		      	  <div class="table-responsive">
			      	  <table class="table  table-dark mt-2">
			        
			        <tr>
			          <th>Id</th>	
			          <th>Tipo Negocio</th>
			          <th>Nombre</th>
			          <th>Rif Negocio</th>
			          <th>Celular</th>
			          <th>Nombre R.</th>
			          <th>Apellido R.</th>
			          <th>Cédula R.</th>
			          <th>Plan</th>
			          <th>User_Id</th>
			          <th>Editar</th>
			        </tr>
			        @foreach($factura_clinica as $fa)
			        <tr>
			          <td>{{$fa->id}}</td>
			          <td>{{$fa->tipo_negocio}}</td>
			          <td>{{$fa->nombre_negocio}}</td>
			          <td>{{$fa->rif_negocio}}</td>
			          <td>{{$fa->celular}}</td>
			          <td>{{$fa->nombre_representante}}</td>
			          <td>{{$fa->apellido_representante}}</td>
			          <td>{{$fa->ci_rif}}</td>
			          <td>{{$fa->plan}}</td>
			          <td>{{$fa->user_id}}</td>
			          <td><button type="button" class="btn btn-sm btn-success" wire:click="editarFacturasEmpresas({{$fa->id}})">Editar</button></td>
			        </tr>
			        @endforeach
			      </table>  
		  		</div>
		      <div class="card-footer">
		      		{{$factura_clinica->links()}}
		      </div> 
	    </div>
	 </div>
   </div>
   <div class="col-md-12">
	    <div class="card my-5">
	      	<div class="card-body">
	      	  <h5 class="text-center text-primary">Reporte Pagos Empresariales</h5>	
 	      	  <div class="row">
	      	  	<div class="col-md-3 my-1"><input wire:model="transaccion_empresa_id" type="text" name="transaccion_empresa_id" class="form-control" placeholder="Ingrese Transaccion ID"></div>
	      	  	<div class="col-md-3 my-1"><input wire:model="nmro_referencia_empresa" type="text" name="nmro_referencia_empresa" class="form-control" placeholder="Ingrese Nº de Referencia"></div>
	      	  	<div class="col-md-3 my-1"><input wire:model="factura_empresa_id" type="text" name="factura_empresa_id" class="form-control" placeholder="Ingrese FacturaID"></div> 
	      	  	<div class="col-md-3 my-1"><input wire:model="pedidos_empresa_id" type="text" name="pedidos_empresa_id" class="form-control" placeholder="Ingrese PedidosID"></div> 
	      	  </div>

		      	  <div class="table-responsive">
			      	  <table class="table table-striped table-dark mt-2">			        
			        <tr>
			          <th>Id</th>	
			          <th>Transaccion_Id</th>
			          <th>Banco Emisor</th>
			          <th>Banco Receptor</th>
			          <th>Nº de Referencia</th>
			          <th>Monto pagado</th>
			          <th>Metodo Transaccion</th>
			          <th>Total</th>
			          <th>Ingreso</th>
			          <th>Egreso</th>
			          <th>Credito</th>
			          <th>Fecha Transaccion</th>
			          <th>Fecha Vence Transaccion</th>
			          <th>Estado</th>
			          <th>FacturaID</th>
			          <th>PedidosID</th>
			          <th>Editar</th>
			        </tr>
			        @foreach($reporte_empresarial as $re)
			        <tr>
			          <td>{{$re->id}}</td>
			          <td>{{$re->transaccion_id}}</td>
			          <td>{{$re->banco_emisor}}</td>
			          <td>{{$re->banco_receptor}}</td>
			          <td>{{$re->nmro_referencia}}</td>
			          <td>{{$re->monto_pagado}}</td>
			          <td>{{$re->metodo_transaccion}}</td>
			          <td>{{$re->total}}</td>
			          <td>{{$re->ingreso}}</td>
			          <td>{{$re->egreso}}</td>
			          <td>{{$re->credito}}</td>
			          <td>{{$re->fecha_transaccion}}</td>
			          <td>{{$re->fecha_vence_transaccion}}</td>
			          <td>{{$re->estado}}</td>
			          <td>{{$re->facturas_clinicas_id}}</td>
			          <td>{{$re->pedidos_clinicas_id}}</td>
			          <td><button type="button" class="btn btn-sm btn-success" wire:click="editarReportesEmpresas({{$re->id}})">Editar</button></td>
			        </tr>
			        @endforeach
			      </table>  
		  		</div>
		      <div class="card-footer">
		      		{{$reporte_empresarial->links()}}
		      </div> 
	    </div>
	 </div>
   </div>
   <div class="col-md-12">
	    <div class="card my-5">
	      	<div class="card-body">
	      	  <h5 class="text-center text-primary">Pedidos Empresariales</h5>	
 	      	  <div class="row">
	      	  	<div class="col-md-3 my-1"><input wire:model="pedido_Id_empresarial" type="text" name="pedido_Id_empresarial" class="form-control" placeholder="Ingrese ID Pedido"></div>
	      	  	<div class="col-md-3 my-1"><input wire:model="transaccion_empresarial_Id" type="text" name="transaccion_empresarial_Id" class="form-control" placeholder="Ingrese Transaccion ID(En Mayuscula)"></div>
	      	  	<div class="col-md-3 my-1"><input wire:model="factura_empresarial_Id" type="text" name="factura_empresarial_Id" class="form-control" placeholder="Ingrese Factura ID"></div>
	      	  	<div class="col-md-3 my-1"><input wire:model="ticket_pedido_empresarial" type="text" name="ticket_pedido_empresarial" class="form-control" placeholder="Ingrese Ticket"></div> </div>
		      	  <div class="table-responsive">
			      	  <table class="table  table-dark mt-2">
			        
			        <tr>
			          <th>Id</th>	
			          <th>TransaccionID</th>
			          <th>FacturaId</th>
			          <th>Ticket</th>
			          <th>Total</th>
			          <th>SubTotal</th>
			          <th>Iva</th>
			          <th>Plan</th>
			          <th>Fecha Pedido</th>
			          <th>Fecha Vence Pedido</th>
			          <th>Estado</th>
			          <th>Editar</th>
			        </tr>
			        @foreach($pedido_empresarial as $pe)
			        <tr>
			          <td>{{$pe->id}}</td>
			          <td>{{$pe->transaccion_id}}</td>
			          <td>{{$pe->facturas_clinicas_id}}</td>
			          <td>{{$pe->ticket}}</td>
			          <td>{{$pe->total}}</td>
			          <td>{{$pe->sub_total}}</td>
			          <td>{{$pe->iva}}</td>
			          <td>{{$pe->plan}}</td>
			          <td>{{$pe->fecha_pedido}}</td>
			          <td>{{$pe->fecha_vence_pedido}}</td>
			          <td>{{$pe->estado}}</td>
			          <td><button type="button" class="btn btn-sm btn-success" wire:click="editarPedidosEmpresas({{$pe->id}})">Editar</button></td>
			        </tr>
			        @endforeach
			      </table>  
		  		</div>

		      <div class="card-footer">
		      		{{$pedido_empresarial->links()}}
		      </div> 
	    </div>
	 </div>
   </div> 
   {{-- Modal Medicos --}}
 <div wire:ignore.self class="modal " id="medicoModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center text-primary">Modificar Medico</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form wire:submit.prevent="editarMedicosData"  class="">
          		<div class="col-md-12 mb-1">
          			<label for="medico_id" class="form-label text-danger">Medico ID</label>
          			<input type="text" wire:model="medico_id" id="medico_id" name="medico_id" class="form-control" >
          		</div> 
          		<div class="col-md-12 mb-1">
          			<label for="nombre" class="form-label text-danger">Nombre</label>
          			<input type="text" wire:model="nombre" id="nombre" name="nombre" class="form-control" >
          		</div>          		
          		<div class="col-md-12 mb-1">
          			<label for="revendedor" class="form-label text-primary">Revendedor</label>
          			<input type="text" wire:model="revendedor" id="revendedor" name="revendedor" class="form-control" >
          		</div>
          		<div class="col-md-12 mb-2">
          		    <label for="pagos" class="form-label text-primary">Pagos</label>	
          			<input type="text" wire:model="pagos" id="pagos" name="pagos" class="form-control" >
          		</div>
          		<div class="col-md-12">
          			<button style="float: right" type="submit" class="btn btn-secondary">Modificar</button>
          		</div>         		
          </form>
        </div>
      </div>
    </div>
  </div>

   {{-- Modal Usuarios --}}
 <div wire:ignore.self class="modal " id="usuarioModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center text-primary">Modificar Usuarios</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form wire:submit.prevent="editarUsuariosData"  class="">
          		<div class="col-md-12 mb-1">
          			<label for="usuario_id" class="form-label text-danger">Usuario ID</label>
          			<input type="text" wire:model="usuario_id" id="usuario_id" name="usuario_id" class="form-control" >
          		</div> 
          		<div class="col-md-12 mb-1">
          			<label for="nombre_usuario" class="form-label text-danger">Nombre</label>
          			<input type="text" wire:model="nombre_usuario" id="nombre_usuario" name="nombre_usuario" class="form-control" >
          		</div>          		
          		<div class="col-md-12 mb-1">
          			<label for="pagos_usuario" class="form-label text-primary">Pagos</label>
          			<input type="text" wire:model="pagos_usuario" id="pagos_usuario" name="pagos_usuario" class="form-control" >
          		</div>
          		<div class="col-md-12 mb-1">
          			<label for="pagos_empresas" class="form-label text-primary">Pagos Empresas</label>
          			<input type="text" wire:model="pagos_empresas" id="pagos_empresas" name="pagos_empresas" class="form-control" >
          		</div>
          		<div class="col-md-12">
          			<button style="float: right" type="submit" class="btn btn-secondary">Modificar</button>
          		</div>         		
          </form>
        </div>
      </div>
    </div>
  </div>

     {{-- Modal Facturas --}}
 <div wire:ignore.self class="modal " id="facturaModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center text-primary">Modificar Facturas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form wire:submit.prevent="editarFacturasData"  class="">
          		<div class="col-md-12 mb-1">
          			<label for="facturas_id" class="form-label text-danger">Factura ID</label>
          			<input type="text" wire:model="facturas_id" id="facturas_id" name="facturas_id" class="form-control" >
          		</div> 
          		<div class="col-md-12 mb-1">
          			<label for="nombre_factura" class="form-label text-danger">Nombre</label>
          			<input type="text" wire:model="nombre_factura" id="nombre_factura" name="nombre_factura" class="form-control" >
          		</div>          		
          		<div class="col-md-12 mb-1">
          			<label for="plan_factura" class="form-label text-primary">Plan</label>
          			<input type="text" wire:model="plan_factura" id="plan_factura" name="plan_factura" class="form-control" >
          		</div>
          		<div class="col-md-12">
          			<button style="float: right" type="submit" class="btn btn-secondary">Modificar</button>
          		</div>         		
          </form>
        </div>
      </div>
    </div>
  </div>

       {{-- Modal Reporte Pago --}}
 <div wire:ignore.self class="modal " id="reporteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center text-primary">Modificar Reporte Pago</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form wire:submit.prevent="editarReportesData"  class="">
          		<div class="col-md-12 mb-1">
          			<label for="reporte_id" class="form-label text-danger">Reporte ID</label>
          			<input type="text" wire:model="reporte_id" id="reporte_id" name="reporte_id" class="form-control" >
          		</div> 
          		<div class="col-md-12 mb-1">
          			<label for="monto_pagado" class="form-label text-primary">Monto Pagado</label>
          			<input type="text" wire:model="monto_pagado" id="monto_pagado" name="monto_pagado" class="form-control" >
          		</div>   
          		<div class="col-md-12 mb-1">
          			<label for="total" class="form-label text-primary">Total</label>
          			<input type="text" wire:model="total" id="total" name="total" class="form-control" >
          		</div>  
          		<div class="col-md-12 mb-1">
          			<label for="ingreso" class="form-label text-primary">Ingreso</label>
          			<input type="text" wire:model="ingreso" id="ingreso" name="ingreso" class="form-control" >
          		</div>  
          		<div class="col-md-12 mb-1">
          			<label for="egreso" class="form-label text-primary">Egreso</label>
          			<input type="text" wire:model="egreso" id="egreso" name="egreso" class="form-control" >
          		</div>  
          		<div class="col-md-12 mb-1">
          			<label for="credito" class="form-label text-primary">Credito</label>
          			<input type="text" wire:model="credito" id="credito" name="credito" class="form-control" >
          		</div>  
          		<div class="col-md-12 mb-1">
          			<label for="fecha_transaccion" class="form-label text-primary">Fecha Transaccion</label>
          			<input type="text" wire:model="fecha_transaccion" id="fecha_transaccion" name="fecha_transaccion" class="form-control" >
          		</div>
          		<div class="col-md-12 mb-1">
          			<label for="fecha_vence_transaccion" class="form-label text-primary">Fecha Vence transaccion</label>
          			<input type="text" wire:model="fecha_vence_transaccion" id="fecha_vence_transaccion" name="fecha_vence_transaccion" class="form-control" >
          		</div>  
          		<div class="col-md-12 mb-1">
          			<label for="Estado" class="form-label text-primary">Estado</label>
          			<input type="text" wire:model="Estado" id="Estado" name="Estado" class="form-control" >
          		</div>  
          		<div class="col-md-12">
          			<button style="float: right" type="submit" class="btn btn-secondary">Modificar</button>
          		</div>         		
          </form>
        </div>
      </div>
    </div>
  </div>

	{{-- Modal Pedidos --}}
  <div wire:ignore.self class="modal " id="pedidoModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center text-primary">Modificar Pedido</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form wire:submit.prevent="editarPedidosData"  class="">
          		<div class="col-md-12 mb-1">
          			<label for="id_" class="form-label text-primary">ID</label>
          			<input type="text" wire:model="id_" id="id_" name="id_" class="form-control" >
          		</div>          		
          		<div class="col-md-12 mb-1">
          			<label for="plan" class="form-label text-primary">Plan</label>
          			<input type="text" wire:model="plan" id="plan" name="plan" class="form-control" >
          		</div>
          		<div class="col-md-12 mb-2">
          		    <label for="estado" class="form-label text-primary">Estado</label>	
          			<input type="text" wire:model="estado" id="estado" name="estado" class="form-control" >
          		</div>
          		<div class="col-md-12">
          			<button style="float: right" type="submit" class="btn btn-secondary">Modificar</button>
          		</div>
          		
          </form>
        </div>
      </div>
    </div>
  </div>
     {{-- Modal Empresas --}}
 <div wire:ignore.self class="modal " id="empresaModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center text-primary">Modificar Empresa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form wire:submit.prevent="editarEmpresasData"  class="">
          		<div class="col-md-12 mb-1">
          			<label for="clinica_id" class="form-label text-danger">Clinica ID</label>
          			<input type="text" wire:model="clinica_id" id="clinica_id" name="clinica_id" class="form-control" >
          		</div> 
          		<div class="col-md-12 mb-1">
          			<label for="nombre_empresa" class="form-label text-danger">Nombre</label>
          			<input type="text" wire:model="nombre_empresa" id="nombre_empresa" name="nombre_empresa" class="form-control" >
          		</div>          		
          		<div class="col-md-12 mb-1">
          			<label for="revendedor_empresa" class="form-label text-primary">Revendedor</label>
          			<input type="text" wire:model="revendedor_empresa" id="revendedor_empresa" name="revendedor_empresa" class="form-control" >
          		</div>
          		<div class="col-md-12 mb-2">
          		    <label for="pagos_empresa" class="form-label text-primary">Pagos</label>	
          			<input type="text" wire:model="pagos_empresa" id="pagos_empresa" name="pagos_empresa" class="form-control" >
          		</div>
          		<div class="col-md-12">
          			<button style="float: right" type="submit" class="btn btn-secondary">Modificar</button>
          		</div>         		
          </form>
        </div>
      </div>
    </div>
  </div>
       {{-- Modal Facturas Empresariales--}}
 <div wire:ignore.self class="modal " id="facturaEmpresasModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center text-primary">Modificar Factura Empresarial</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form wire:submit.prevent="editarFacturasEmpresasData"  class="">
          		<div class="col-md-12 mb-1">
          			<label for="facturas_empresas_id" class="form-label text-danger">Factura Empresarial ID</label>
          			<input type="text" wire:model="facturas_empresas_id" id="facturas_empresas_id" name="facturas_empresas_id" class="form-control" >
          		</div> 
          		<div class="col-md-12 mb-1">
          			<label for="nombre_factura_empresas" class="form-label text-danger">Nombre</label>
          			<input type="text" wire:model="nombre_factura_empresas" id="nombre_factura_empresas" name="nombre_factura_empresas" class="form-control" >
          		</div>          		
          		<div class="col-md-12 mb-1">
          			<label for="plan_factura_empresas" class="form-label text-primary">Plan</label>
          			<input type="text" wire:model="plan_factura_empresas" id="plan_factura_empresas" name="plan_factura_empresas" class="form-control" >
          		</div>
          		<div class="col-md-12">
          			<button style="float: right" type="submit" class="btn btn-secondary">Modificar</button>
          		</div>         		
          </form>
        </div>
      </div>
    </div>
  </div>
   {{-- Modal Reporte Pago Empresas--}}
 <div wire:ignore.self class="modal " id="reporteEmpresasModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center text-primary">Modificar Reporte Pago Empresas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form wire:submit.prevent="editarReportesEmpresasData"  class="">
          		<div class="col-md-12 mb-1">
          			<label for="reporte_empresas_id" class="form-label text-danger">Reporte ID</label>
          			<input type="text" wire:model="reporte_empresas_id" id="reporte_empresas_id" name="reporte_empresas_id" class="form-control" >
          		</div> 
          		<div class="col-md-12 mb-1">
          			<label for="monto_empresas_pagado" class="form-label text-primary">Monto Pagado</label>
          			<input type="text" wire:model="monto_empresas_pagado" id="monto_empresas_pagado" name="monto_empresas_pagado" class="form-control" >
          		</div>   
          		<div class="col-md-12 mb-1">
          			<label for="total_empresas" class="form-label text-primary">Total</label>
          			<input type="text" wire:model="total_empresas" id="total_empresas" name="total_empresas" class="form-control" >
          		</div>  
          		<div class="col-md-12 mb-1">
          			<label for="ingreso_empresas" class="form-label text-primary">Ingreso</label>
          			<input type="text" wire:model="ingreso_empresas" id="ingreso_empresas" name="ingreso_empresas" class="form-control" >
          		</div>  
          		<div class="col-md-12 mb-1">
          			<label for="egreso_empresas" class="form-label text-primary">Egreso</label>
          			<input type="text" wire:model="egreso_empresas" id="egreso_empresas" name="egreso_empresas" class="form-control" >
          		</div>  
          		<div class="col-md-12 mb-1">
          			<label for="credito_empresas" class="form-label text-primary">Credito</label>
          			<input type="text" wire:model="credito_empresas" id="credito_empresas" name="credito_empresas" class="form-control" >
          		</div>  
          		<div class="col-md-12 mb-1">
          			<label for="fecha_empresas_transaccion" class="form-label text-primary">Fecha Transaccion</label>
          			<input type="text" wire:model="fecha_empresas_transaccion" id="fecha_empresas_transaccion" name="fecha_empresas_transaccion" class="form-control" >
          		</div>
          		<div class="col-md-12 mb-1">
          			<label for="fecha_vence_empresas_transaccion" class="form-label text-primary">Fecha Vence transaccion</label>
          			<input type="text" wire:model="fecha_vence_empresas_transaccion" id="fecha_vence_empresas_transaccion" name="fecha_vence_empresas_transaccion" class="form-control" >
          		</div>  
          		<div class="col-md-12 mb-1">
          			<label for="Estado_empresas" class="form-label text-primary">Estado Reporte Empresarial</label>
          			<input type="text" wire:model="Estado_empresas" id="Estado_empresas" name="Estado_empresas" class="form-control" >
          		</div>  
          		<div class="col-md-12">
          			<button style="float: right" type="submit" class="btn btn-secondary">Modificar</button>
          		</div>         		
          </form>
        </div>
      </div>
    </div>
  </div>
	{{-- Modal Pedidos Empresarial--}}
  <div wire:ignore.self class="modal " id="pedidoEmpresasModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center text-primary">Modificar Pedido Empresarial</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form wire:submit.prevent="editarPedidosEmpresasData"  class="">
          		<div class="col-md-12 mb-1">
          			<label for="id_empresas" class="form-label text-primary">ID</label>
          			<input type="text" wire:model="id_empresas" id="id_empresas" name="id_empresas" class="form-control" >
          		</div>          		
          		<div class="col-md-12 mb-1">
          			<label for="plan_empresas" class="form-label text-primary">Plan</label>
          			<input type="text" wire:model="plan_empresas" id="plan_empresas" name="plan_empresas" class="form-control" >
          		</div>
          		<div class="col-md-12 mb-2">
          		    <label for="estado_empresas" class="form-label text-primary">Estado</label>	
          			<input type="text" wire:model="estado_empresas" id="estado_empresas" name="estado_empresas" class="form-control" >
          		</div>
          		<div class="col-md-12">
          			<button style="float: right" type="submit" class="btn btn-secondary">Modificar</button>
          		</div>
          		
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-12">
  	<div class="card my-5">
  		<div class="card-body">
  			
  		
  		<h5 class="text-center text-primary ">Modificar Pedidos No Pagado</h5>
  			<h6 class="text-center text-success">Planes M&eacute;dicos</h6>
  		<div class="row m-2">
  			<div class="col-md-4 text-center">
  		       <a class="btn btn-success" href={{route('actualizar_andromeda')}}>Dolar Andromeda</a>
   			</div>
  			<div class="col-md-4 text-center">
  		       <a class="btn btn-success" href={{route('actualizar_fenix')}}>Dolar Fenix</a>
   			</div>
  			<div class="col-md-4 text-center">
  		       <a class="btn btn-success" href={{route('actualizar_pegasus')}}>Dolar Pegasus</a>
   			</div>
  		</div>
  			<h6 class="text-center text-success">Planes De Empresas De Salud</h6>
  		<div class="row m-2">
  			<div class="col-md-4 text-center">
  		       <a class="btn btn-success" href={{route('actualizar_cisne')}}>Dolar Cisne</a>
   			</div>
  			<div class="col-md-4 text-center">
  		       <a class="btn btn-success" href={{route('actualizar_aioria')}}>Dolar Aioria</a>
   			</div>
  			<div class="col-md-4 text-center">
  		       <a class="btn btn-success" href={{route('actualizar_dragon')}}>Dolar Dragon</a>
   			</div>
  		</div>
  	</div>
  	</div>
  </div>
  @if (session('status'))
  <script type="text/javascript">
  	Swal.fire({
  title: 'Actualizado Pedido correctamente',
  text: 'Revise los pedidos No Pagado',
  icon: 'success',
  confirmButtonColor: '#3085d6',
  confirmButtonText: 'OK',
  footer:'Gracias por preferirnos'
   });
  </script>
  @endif
</div>




@push('scripts')
<script type="text/javascript">
	window.addEventListener('cerrar_medico',event => {
		$('#medicoModal').modal('hide')
	})
	window.addEventListener('mostrar_medico',event => {
		$('#medicoModal').modal('show')
	})

	window.addEventListener('cerrar_usuario',event => {
		$('#usuarioModal').modal('hide')
	})
	window.addEventListener('mostrar_usuario',event => {
		$('#usuarioModal').modal('show')
	})

	window.addEventListener('cerrar_factura',event => {
		$('#facturaModal').modal('hide')
	})
	window.addEventListener('mostrar_factura',event => {
		$('#facturaModal').modal('show')
	})

	window.addEventListener('cerrar_reporte',event => {
		$('#reporteModal').modal('hide')
	})
	window.addEventListener('mostrar_reporte',event => {
		$('#reporteModal').modal('show')
	})

	window.addEventListener('cerrar_pedido',event => {
		$('#pedidoModal').modal('hide')
	})
	window.addEventListener('mostrar_pedido',event => {
		$('#pedidoModal').modal('show')
	})	

	window.addEventListener('cerrar_empresa',event => {
		$('#empresaModal').modal('hide')
	})
	window.addEventListener('mostrar_empresa',event => {
		$('#empresaModal').modal('show')
	})

	window.addEventListener('cerrar_factura_empresarial',event => {
		$('#facturaEmpresasModal').modal('hide')
	})
	window.addEventListener('mostrar_factura_empresarial',event => {
		$('#facturaEmpresasModal').modal('show')
	})

	window.addEventListener('cerrar_reporte_empresarial',event => {
		$('#reporteEmpresasModal').modal('hide')
	})
	window.addEventListener('mostrar_reporte_empresarial',event => {
		$('#reporteEmpresasModal').modal('show')
	})

	window.addEventListener('cerrar_pedido_empresarial',event => {
		$('#pedidoEmpresasModal').modal('hide')
	})
	window.addEventListener('mostrar_pedido_empresarial',event => {
		$('#pedidoEmpresasModal').modal('show')
	})

</script>
@endpush
