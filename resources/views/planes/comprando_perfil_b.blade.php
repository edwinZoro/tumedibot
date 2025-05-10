<!DOCTYPE html>
<html>
<head>
	<title>tumedibot</title>
</head>
<body>
	<style type="text/css">
		img{
			position: relative;
			left:0%;
			
		}
		.green{
			color: green;
			font-weight: 900;
		}
		.fa li{
			list-style-type: none;
		}
	</style>
	<img src={{asset('medibot_i.png')}} alt="tumedibot">
	<h3>Ticket Nº 10000001</h3>
	<p>Plan Fenix</p>
	<p>Usuario: {{$user->name}}</p>
	<p>Correo: {{$user->email}}</p><br>
	<h2>Pague <span class="green">25$</span> a cualquiera de las siguientes cuentas:</h2>
	<h3 class="my-0 font-weight-normal text-center text-light">Banco Mercantil</h3>
	<ul class="fa">
		<li><span class="green">Nombre:</span> Edwin Boada</li>
		<li><span class="green">Cédula:</span> 18.033.032</li>
		<li><span class="green">Correo:</span> edwinboada444@gmail.com</li>
	</ul>
	<h4 class="card-title pricing-card-title text-center"><small class="text-dark">Pago Móvil</small></h4>
	<ul class="list-unstyled mt-3 mb-4 text-center">

		<li><span>Tlf:</span> 0414-272-45-64</li>

	</ul>
	<h4 class="card-title pricing-card-title text-center"><small class="text-dark">Transferencia</small></h4>
	<ul class="list-unstyled mt-3 mb-4 text-center">
		<li><span>Nº de Cta:</span> 52345234342676565645</li>							
	</ul>


</body>
</html>