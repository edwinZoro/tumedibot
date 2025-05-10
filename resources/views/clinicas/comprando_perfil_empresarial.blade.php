<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="tumedibot" />
    <meta name="author" content="EDWIN ENRIQUE BOADA MENA" />
	<title>tumedibot</title>
		<style type="text/css">
		.green{
			color: green;
			font-weight: 900;
		}
		.fa li{
			list-style-type: none;
		}
		.estatus{
		    background:  #cc0000;
		    border-radius:5px;
		    color:white;
		}
		.estatus2{
		    background:  green;
		    border-radius:5px;
		    color:white;
		}
		.color{
		    color:gray;
		}
		.colorb{
		    color:darkgreen;
		}
		.table-head{
		    width:100%;

		    border-collapse: collapse;
		}
		.table{
		    border:1px solid green;
		}
		.tr-head{
		    border-bottom: 1px outset green;
		    padding:10px;
		}
		.back{
		    background: #e6ffee;
		}
		
	</style>
	<link rel="icon" href="{{ public_path('icon_medibot.png') }}" type="image/x-icon"/>
</head>
<body>

	<div class="head">
	    <table class="table-head">
	        <tr class="tr-head">
	            <td><i><img width="16" height="16" src="{{ public_path('icon_medibot.png' )}}" alt="tumedibot" /> tu<span style="color:green">medi</span>bot.com</i></td>
	            <td><div><h3 class="{{$pedido->estado === 'No Pagado' ?'estatus':'estatus2'}}" align="center">{{$pedido->estado}}</h3></div></td>
	            <td><h5 align="right">Ticket Nº {{$pedido->ticket}}</h5></td>
	        </tr>
	    </table>
	    
	</div>
	@foreach($FacturaClinica as $f)
	<h3 class="color" >Plan Actual: {{strtoupper($f->plan)}}</h3>
	
	<b>Facturado a:</b><br>
	<i>{{strtoupper($f->tipo_negocio)}} - {{strtoupper($f->nombre_negocio)}}</i>,<br>
	<i>Nº Empresa: {{$f->rif_negocio}}</i>,<br>
	<i> {{strtoupper($f->estado)}}, {{strtoupper($f->ciudad)}}, {{strtoupper($f->direccion)}}, {{$f->codigo_postal}}</i><br>
	<i>Representante Empresarial: {{ucfirst($f->nombre_representante)}} {{ucfirst($f->apellido_representante)}}. </i><br>
	<i>Nº Identificación:(Para {{$f->estado}}): {{$f->ci_rif}}</i><br>
	<i>Teléfono:</i> <i>{{$f->celular}}.</i><br>
	
	@endforeach
 {{--	<h2>Pague <span class="colorb">${{$pedido->total}}</span></h2>
	<h3 class="my-0 font-weight-normal text-center text-light">CRYPTO</h3>
	<p>
		<b><img width="15" height="15" src="{{ public_path('bitcoin.png' )}}" alt="bitcoin" /> BITCOIN:</b> 1EtumQ6NmgKNScCjmxdEqrdcNwPd9XKYVv<br><br>
		<b><img width="11" height="16" src="{{ public_path('ether.png' )}}" alt="litecoin" /> ETHEREUM</b>, <b><img width="15" height="15" src="{{ public_path('usdt.png' )}}" alt="usdt" /> USDT</b>, <b><img width="14" height="14" src="{{ public_path('litecoin-logo.png' )}}" alt="litecoin" /> LITECOIN:</b> 0x7717f3e2887e858102053f6e49f74c262b2a52cb<br>
	</p>
	@if($f->estado === 'VENEZUELA')
	<h3 class="my-0 font-weight-normal text-center text-light">Banco Mercantil</h3>
	<ul class="fa">
		<li><b><span class="color">Nombre:</span></b> <i>Edwin Boada</i></li>
		<li><b><span class="color">Cédula:</span></b> <i>18.033.032</i></li>
		<li><b><span class="color">Correo:</span></b> <i>edwinboada444@gmail.com</i></li>
	</ul>
	<table>
    	<tr>
    	    <td>
        	    <h4 align="center"><small>Pago Móvil</small></h4>
            	<ul>
            	<li><span>Tlf:</span> 0416-717-55-20</li>
            	</ul>
    	    </td>
    	    <td>
        	    <h4 align="center">Transferencia/Deposito</h4>
            	<ul>
            	<li><span>Nº de Cta Transferencia/Deposito en BsD:</span> 0105-0037-15-1037397278</li>					
            	<li><span>Nº de Cta Deposito en $:</span> 0105-0037-19-5037037573</li>							
            	</ul>
    	    </td>
    	</tr>
	</table>
	@endif--}}
	<div>
	    <table class="table-head table" >
	      <tr >
	          <th  class="tr-head back" colspan="2" align="left"><h2>Productos/Servicios</h2></th>
	      </tr>
	        <tr>
	            <th class="tr-head" align="left">Descripci&oacute;n</th>
	            <th class="tr-head">Importe</th>
	        </tr>
	        <tr>
	            <td class="tr-head">Plan {{$pedido->plan}}. Crear, Editar, Eliminar Perfil Empresarial. Aparecer en listas de b&uacute;squeda * </td>
	            <td class="tr-head">Bs.D.{{$pedido->total}}</td>
	        </tr>
	        <tr>
	            <td class="tr-head back" align="right"><b>Sub Total</b></td>
	            <td class="tr-head back">Bs.D.{{$pedido->sub_total}}</td>
	        </tr>
	        <tr>
	            <td class="tr-head back" align="right"><b>16.00% Iva</b></td>
	            <td class="tr-head back">Bs.D.{{$pedido->iva}}</td>
	        </tr>
	        <tr>
	            <td class="tr-head back" align="right"><b>Total</b></td>
	            <td class="tr-head back">Bs.D.{{$pedido->total}}</td>
	        </tr>
	    </table>
	    <span>* Producto/Servicio sujeto a impuesto</span>
	</div>
	<p></p>
	<div>
	    <table class="table-head table">
	        <tr>
	            <th align="left" class="tr-head back">Fecha Transacci&oacute;n</th>
	            <th align="left" class="tr-head back">M&eacute;todo Gateway</th>
	            <th align="left" class="tr-head back">ID transacci&oacute;n</th>
	            <th align="left" class="tr-head back">Total</th>
	        </tr>
	        <tr>
	            @if(isset($reporte))
	            <td class="tr-head">{{$reporte->fecha_transaccion}}</td>
	            <td class="tr-head">{{$reporte->metodo_transaccion}}</td>
	            <td class="tr-head">{{$reporte->transaccion_id}}</td>
	            <td class="tr-head">{{$reporte->monto_pagado}}</td>
	            @else
	            <td class="tr-head">Reporte Pago</td>
	            <td class="tr-head">Reporte Pago</td>
	            <td class="tr-head">Reporte Pago</td>
	            <td class="tr-head">Reporte Pago</td>
	            @endif
	        </tr>
	    </table>
	</div>
</body>
</html>